<?php

namespace App\Http\Controllers\Admin\view;

use App\Models\Customer;
use App\Models\Provider;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\Admin\SendData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    protected string $route;

    public function viewDashboard(SendData $get)
    {
        $pengajuan = $get->dataPengajuan();
        $berlangganan = $get->dataPengajuanBerlangganan();
        $transactions = Transaksi::latest()->paginate(5);

        return view('admin.dashboard', ['pengajuan' => $pengajuan, 'berlangganan' => $berlangganan, 'transactions' => $transactions]);
    }

    public function viewTagihan()
    {
        $providers = Provider::latest()->paginate(10);
        return view('admin.main.tagihan', ['providers' => $providers]);
    }

    public function viewProvider(SendData $get)
    {
        $providers = $get->dataProvider();

        return view('admin.penyedia-jasa.provider', ['providers' => $providers]);
    }

    public function viewDetailProvider(SendData $get, Int $id)
    {
        $detail = Provider::find($id);

        return view('admin.penyedia-jasa.provider-detail', ['detail' => $detail]);
    }

    public function viewLayanan(SendData $get)
    {
        $layanan = $get->dataLayanan();
        $berlangganan = $get->dataBerlangganan();

        return view('admin.penyedia-jasa.layanan', ['layanan' => $layanan, 'berlangganan' => $berlangganan]);
    }

    public function viewDetailLayanan(SendData $get, Int $id)
    {
        $detail = $get->dataDetailLayanan($id);


        return view('admin.penyedia-jasa.update-layanan', ['detail' => $detail]);
    }

    public function viewBerlangganan(SendData $get, Int $id)
    {
        $detail = $get->dataDetailBerlangganan($id);

        if(Route::currentRouteName() == 'admin.view.detail.berlangganan')
        {
            $this->route = 'admin.post.verify.berlangganan';
        }

        return view('admin.penyedia-jasa.update-berlangganan',
            [
                'berlangganan' => $detail,
                'route' => $this->route
            ]);
    }

    public function viewDetailBerlangganan(SendData $get, Int $id)
    {
        $detail = $get->dataDetailBerlangganan($id);

        if(Route::currentRouteName() === 'admin.view.update.berlangganan')
        {
            $this->route = 'admin.post.update.berlangganan';
        }

        return view('admin.penyedia-jasa.update-berlangganan', [
            'berlangganan' => $detail,
            'route' => $this->route
        ]);
    }

    public function viewIncome()
    {
        return view('admin.penyedia-jasa.income');
    }

    public function viewCustomer()
    {
        $customers = Customer::latest()->get();

        return view('admin.customers.customer', ['customers' => $customers]);
    }

    public function viewDetailCustomer(Int $id)
    {
        $customer = Customer::find($id);

        return view('admin.customers.detail', ['detail' => $customer]);
    }

    public function viewTransaksi()
    {
        $transactions = Transaksi::latest()->get();
        return view('admin.customers.transaksi', ['transactions' => $transactions]);
    }

    public function viewFeedback()
    {
        return view('admin.customers.feedback');
    }

    public function viewDetailPengajuan(SendData $get, $id)
    {
        $detail = $get->dataDetailPengajuan($id);
        $ktp = $get->dataKTP($id);

        // $desa = eval('$detail->alamat->rt/rw');

        if(empty($detail) || empty($ktp))
        {
            return back()->with('fail', 'Data tidak ditemukan!');
        }
        return view('admin.main.proses-provider', ['detail' => $detail, 'ktp' => $ktp]);
    }

    public function download($img)
    {
        return Storage::download('public/' . $img);
    }


}
