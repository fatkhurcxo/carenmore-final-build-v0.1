<?php

namespace App\Http\Controllers\Provider\view;

use App\Models\KTP;
use App\Models\Layanan;
use App\Models\Provider;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{
    public $route;

    public function getProviderID($keperluan = '')
    {
        $provider = Provider::firstWhere('user_id', Auth::id());

        if(empty($provider))
        {
            return false;
        }

        if($keperluan == 'full')
        {
            return $provider;
        }

        return $provider->id;

    }
    public function getDataLayanan()
    {
        $layanan = Layanan::where('provider_id', $this->getProviderID())->latest()->get();

        if(empty($layanan))
        {
            return false;
        }

        return $layanan;
    }

    public function getDataPengajuan()
    {
        /* Data pengajuan */
        $specify = [
            'provider_id' => $this->getProviderID(),
            'status' => 'nonaktif'
        ];

        $pengajuan = Berlangganan::where($specify)->latest()->get();

        return $pengajuan;
    }

    public function viewDashboard(Request $request)
    {
        $provider = Provider::firstWhere('user_id', Auth::user()->id);
        if($provider)
        {
            $ktp = KTP::firstWhere('provider_id', $provider->id);
            $layanan = Layanan::where('provider_id', $this->getProviderID())->latest()->paginate(3);
            return view('penyedia-jasa.dashboard', compact(['provider', 'ktp', 'layanan']));
        }

        return view('penyedia-jasa.dashboard');
    }

    public function download($imgName)
    {
        return Storage::download('ktp/' . $imgName);
    }

    public function viewTambahLayanan()
    {
        if(Route::currentRouteName() == 'provider.view.add')
        {
            $this->route = 'provider.post.layanan';
        }
        return view('penyedia-jasa.tambah-layanan', ['route' => $this->route]);
    }

    public function viewUbahLayanan($id)
    {
        $layanan = Layanan::find($id);

        if(empty($layanan))
        {
            return back()->with('fail', 'Data tidak ditemukan');
        }

        if(Route::currentRouteName() == 'provider.view.update')
        {
            $this->route = 'provider.post.update';
        }
        return view('penyedia-jasa.tambah-layanan',
            [
                'layanan' => $layanan,
                'route' => $this->route
            ]);
    }

    public function viewPengajuan()
    {

        return view('penyedia-jasa.pengajuan-berlangganan',
            [
                'layanan' => $this->getDataLayanan(),
                'pengajuan' => $this->getDataPengajuan()
            ]);
    }

    public function viewDirectPengajuan($id)
    {
        $direct = Layanan::find($id);
        $upgraded = Berlangganan::firstWhere('layanan_id', $id);

        if(!empty($upgraded))
        {
            return back()->with('fail', 'Layanan yang anda pilih telah menjadi layanan berlangganan, mohon pilih layanan lain.');
        }

        return view('penyedia-jasa.pengajuan-berlangganan',
            [
                'layanan' => $this->getDataLayanan(),
                'pengajuan' => $this->getDataPengajuan(),
                'direct' => $direct->id
            ]);
    }

    public function viewProfile()
    {
        $provider = $this->getProviderID('full');
        return view('penyedia-jasa.profile', ['provider' => $provider]);
    }
}
