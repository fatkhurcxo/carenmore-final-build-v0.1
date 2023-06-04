<?php

namespace App\Providers;

use App\Models\KTP;
use App\Models\Provider;
use App\Services\Services\Provider\InputDataProvider;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ProviderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /* This is Custom Blade Directive Template by Ojak */

        /* Check Data Provider on Dashboard */

        Blade::if('emptyprovider', function () {
            $dataProvider = Provider::firstWhere('user_id', Auth::user()->id);
            if(empty($dataProvider))
            {
                return true;

            }

            return false;
        });

        /* Check Status Provider */
        Blade::if('providerstatus', function ($status) {
            $dataProvider = Provider::firstWhere('user_id', Auth::user()->id);

            if(empty($dataProvider))
            {
                return false;
            }else  if($status === 'nonaktif' && $dataProvider->status == $status)
            {
                return true;
            }else if($status === 'aktif' && $dataProvider->status == $status)
            {
                return true;
            }else
            {
                return false;
            }
        });
        /*
        Blade::directive('provider', function ($user_id) {
            $dataKosong = false;
            $providerData = Provider::firstWhere('user_id', $user_id);
            if (empty($providerData)) {
                # code...
                $dataKosong = true;
                return "<?php if($dataKosong) : ?>";
            }

            return false;
        }); */

        /* Provider Not Verified */

        /* Provider Already Set */
        /*Blade::directive('setprovider', function () {
            $status = false;
            $id = Auth::user()->id;
            $providerData = Provider::firstWhere('user_id', $id);

            if (empty($providerData) || isset($providerData->status) !== 'aktif') {
                # code...
                return false;
            }

            if(isset($providerData->status) == 'aktif'){
                $status = true;

                return "<?php } else if($status) { ?>";
            }

            return $status;
        }); */

        /* Closing Provider */

        /*Blade::directive('endprovider', function ($user_id) {
            $providerData = Provider::firstWhere('user_id', $user_id);
            if (empty($providerData)) {
                # code...
                return "<?php endif; ?>";
            }

            return false;
        }); */
    }
}
