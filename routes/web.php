<?php

use App\Http\Controllers\Admin\post\AdminSendController;
use App\Http\Controllers\Admin\view\AdminController;
use App\Models\KTP;
use App\Models\Layanan;
use App\Models\Provider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\CleaningAdmin\StatusCheck;
use App\Http\Controllers\OAuth\OtentikasiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Provider\view\ProviderController;
use App\Http\Controllers\Provider\post\ProviderInputController;
use App\Http\Middleware\CleaningProvider\ProviderCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route for Guest */
Route::name('guest.')->prefix('guest')->middleware('guest')->group(function (){
    Route::get('/', function(){
        return view('homepage.index');
    })->name('home');
    /* Using Otentikasi Controller */
    Route::controller(OtentikasiController::class)->group(function (){
        /* Register */
        Route::get('/reg','regVIew')->name('register');
        Route::post('/reg','createUser')->name('CreateUser');
        /* Login */
        Route::get('/log','logView')->name('login');
        Route::post('/log','authLogin')->name('authLogin');
        /* Login With Google */
        Route::get('/log/oauth','regWithGoogle')->name('logWithGoogle');
        Route::get('/reg/oauth','regWithGoogle')->name('regWithGoogle');
    });
});

/* Logout */
Route::get('/logout', [OtentikasiController::class, 'logout'])->name('logout');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function (){
    /* Admin Page */

    /* ADMIN VIEW */
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'viewDashboard')->name('view.base');
        Route::get('tagihan', 'viewTagihan')->name('view.tagihan');
        Route::get('data-provider', 'viewProvider')->name('view.provider');
        Route::get('data-provider/{detail}', 'viewDetailProvider')->name('view.detail.provider');
        Route::get('data-layanan', 'viewLayanan')->name('view.layanan');
        Route::get('data-layanan/{detail}', 'viewDetailLayanan')->name('view.detail.layanan');
        Route::get('data-layanan/pengajuan/{berlangganan}', 'viewBerlangganan')->name('view.detail.berlangganan');
        Route::get('data-layanan/berlangganan/{detail}', 'viewDetailBerlangganan')->name('view.update.berlangganan');
        Route::get('data-customer', 'viewCustomer')->name('view.customer');
        Route::get('data-customer/{detail}', 'viewDetailCustomer')->name('view.detail.customer');
        Route::get('pengajuan/{detail}', 'viewDetailPengajuan')->name('view.detail.pengajuan');
        Route::get('donwload/{ktp}', 'download')->name('download.ktp');
        Route::get('transaksi', 'viewTransaksi')->name('view.transaksi');
        Route::get('feedback', 'viewFeedback')->name('view.feedback');
        Route::get('income', 'viewIncome')->name('view.income');
    });

    /* ADMIN POST */
    Route::controller(AdminSendController::class)->group(function () {
        Route::post('pengajuan/{detail}', 'postVerify')->name('post.verifiy');
        Route::post('data-provider/ubah/{ubah}', 'postUbahProvider')->name('post.provider');
        Route::get('data-provider/delete/{delete}', 'postDeleteProvider')->name('post.delete.provider');
        Route::post('data-layanan/{berlangganan}', 'postVerifyBerlangganan')->name('post.verify.berlangganan');
        Route::post('data-layanan/update/{detail}', 'postUbahLayanan')->name('post.update.layanan');
        Route::post('data-layanan/berlangganan/{detail}', 'postUbahBerlangganan')->name('post.update.berlangganan');
        Route::get('data-layanan/layanan/{delete}', 'deleteLayanan')->name('post.delete.layanan');
        Route::get('data-layanan/berlangganan/delete/{delete}', 'deleteBerlangganan')->name('post.delete.berlangganan');
        Route::post('data-customer/{detail}', 'postUbahCustomer')->name('post.update.customer');
        Route::get('data-customer/delete/{delete}', 'deleteCustomer')->name('post.delete.customer');
    });

    Route::get('profile', function () {
        return view('penyedia-jasa.profile');
    })->name('view.profile');
});

Route::name('provider.')->prefix('provider')->middleware(['auth', 'adminignore'])->group(function (){
    Route::get('/verify', function () {
        return view('penyedia-jasa.provider-step');
    });
    /* VIEW PROVIDER */
    Route::controller(ProviderController::class)->group(function () {
        Route::get('/', 'viewDashboard')->name('new');
        Route::get('profile', 'viewProfile')->name('view.profile');
        Route::get('layanan/tambah', 'viewTambahLayanan')->name('view.add');
        Route::get('layanan/ubah/{update}', 'viewUbahLayanan')->name('view.update');
        Route::get('layanan/pengajuan', 'viewPengajuan')->name('view.pengajuan');
        Route::get('layanan/pengajuan/{pengajuan}', 'viewDirectPengajuan')->name('view.pengajuan.direct');
    });
    /* POST PROVIDER */
    Route::controller(ProviderInputController::class)->group(function () {
        Route::post('/', 'detailProvider')->name('post.detail');
        Route::post('layanan/tambah', 'addLayanan')->name('post.layanan');
        Route::get('layanan/{delete}', 'deleteLayanan')->name('delete');
        Route::post('layanan/ubah/{update}', 'updateLayanan')->name('post.update');
        Route::post('layanan/pengajuan', 'pengajuanLayanan')->name('post.pengajuan');
        Route::post('profile', 'updateProvider')->name('post.profile');
        Route::post('profile/password', 'changePassword')->name('post.password');
    })->middleware(ProviderCheck::class);
    /* ----------- */
    Route::get('/layanan', function(){
        $layanan = Layanan::latest()->get();
        $provider = Provider::firstWhere('user_id', Auth::id());
        return view('penyedia-jasa.layanan-aktif', compact('layanan', 'provider'));
    })->name('layanan');
    Route::get('/income', function (){
        return view('penyedia-jasa.income');
    });
    Route::get('/transaksi', function () {
        return view('penyedia-jasa.transaksi');
    });
    Route::get('/feedback', function () {
        return view('penyedia-jasa.feedback');
    });
    Route::get('download/{imgname}', [ProviderController::class, 'download'])->name('download');
});

/* Google Auth Callback */
Route::get('/authg/callback', [OtentikasiController::class, 'regWithGoogleHandle']);

/* EMAIL VERIFICATION */
Route::get('/reg/verify', function () {
    return view('homepage.email-verify');
})->name('verification.verify');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::group(['prefix' => 'penyedia-jasa'], function(){
    Route::get('provider', function(){ return view('admin.penyedia-jasa.provider'); });
    Route::get('layanan', function(){ return view('admin.penyedia-jasa.layanan'); });
    Route::get('income', function(){ return view('admin.penyedia-jasa.income'); });
});

Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('admin.pages.email.inbox'); });
    Route::get('read', function () { return view('admin.pages.email.read'); });
    Route::get('compose', function () { return view('admin.pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('admin.pages.apps.chat'); });
    Route::get('calendar', function () { return view('admin.pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('admin.pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('admin.pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('admin.pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('admin.pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('admin.pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('admin.pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('admin.pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('admin.pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('admin.pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('admin.pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('admin.pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('admin.pages.ui-components.modal'); });
    Route::get('navs', function () { return view('admin.pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('admin.pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('admin.pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('admin.pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('admin.pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('admin.pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('admin.pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('admin.pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('admin.pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('admin.pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('admin.pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('admin.pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('admin.pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('admin.pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('admin.pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('admin.pages.forms.editors'); });
    Route::get('wizard', function () { return view('admin.pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('admin.pages.charts.apex'); });
    Route::get('chartjs', function () { return view('admin.pages.charts.chartjs'); });
    Route::get('flot', function () { return view('admin.pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('admin.pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('admin.pages.charts.peity'); });
    Route::get('sparkline', function () { return view('admin.pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('admin.pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('admin.pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('admin.pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('admin.pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('admin.pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('admin.pages.general.blank-page'); });
    Route::get('faq', function () { return view('admin.pages.general.faq'); });
    Route::get('invoice', function () { return view('admin.pages.general.invoice'); });
    Route::get('profile', function () { return view('admin.pages.general.profile'); });
    Route::get('pricing', function () { return view('admin.pages.general.pricing'); });
    Route::get('timeline', function () { return view('admin.pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('admin.pages.auth.login'); });
    Route::get('register', function () { return view('admin.pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('admin.pages.error.404'); });
    Route::get('500', function () { return view('admin.pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
// Route::any('/{page?}',function(){
    //     return View::make('admin.pages.error.404');
    // })->where('page','.*');
