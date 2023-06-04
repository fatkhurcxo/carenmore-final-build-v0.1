<?php

namespace App\Http\Controllers\Provider\post;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Provider\InputDataProvider;

class ProviderInputController extends Controller
{
    # Input detail provider
    public function detailProvider(Request $request, InputDataProvider $provider)
    {
        /* Insert data detail provider */
        $InputDataProvider = $provider->detailProvider($request);

        if($InputDataProvider)
        {
            return back()->with('status', 'Berhasil melakukan submit data.');
        }
    }

    public function addLayanan(Request $request, InputDataProvider $provider)
    {
        /* Insert data layanan */
        if(!$provider->addlayanan($request))
        {
            return back()->with('fail', 'Terjadi kesalahan saat menambahkan data layanan');
        }

        return redirect()->route('provider.layanan')->with('success', 'Berhasil menambahkan data layanan');
    }

    public function deleteLayanan(InputDataProvider $provider, $id)
    {
        if($provider->delete($id))
        {
            return back()->with('success', 'Data layanan berhasil dihapus');
        }

        return back()->with('fail', 'Terjadi kesalahan saat menghapus data.');
    }

    public function updateLayanan(Request $request, InputDataProvider $provider, $id)
    {
        if($provider->updateLayanan($request, $id))
        {
            return redirect()->route('provider.layanan')->with('success', 'Berhasil mengubah data layanan');
        }

        return back()->with('fail', 'Terjadi kesalahan saat melakukan ubah data');
    }

    public function pengajuanLayanan(Request $request, InputDataProvider $provider)
    {
        if($provider->pengajuanLayanan($request))
        {
            return redirect()->route('provider.view.pengajuan')->with('success', 'Berhasil mengajukan permohonan layanan berlangganan, mohon tunggu proses verifikasi layanan');
        }

        return back()->with('fail', 'Terjadi kesalahan saat melakukan pengajuan layanan berlangganan');
    }

    public function updateProvider(Request $request, InputDataProvider $provider)
    {
        if($provider->updateProvider($request))
        {
            return back()->with('success', 'Berhasil melakukan update data provider');
        }

        return back()->with('fail', 'Terjadi kesalahan saat melakukan update data provider');
    }

    public function changePassword(Request $request, InputDataProvider $provider)
    {
        if($provider->changePassword($request))
        {
            return back()->with('success', 'Berhasil mengubah password');
        }

        return back()->with('fail', 'Gagal melakukan perubahan password akun');
    }
}
