<?php

namespace App\Http\Controllers\Admin\post;

use App\Models\Alamat;
use App\Models\Layanan;
use App\Models\Customer;
use App\Models\Provider;
use App\Mail\ProviderVerify;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use App\Services\Admin\SendData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminSendController extends Controller
{
    public function postVerify(Request $request, SendData $get, Int $id)
    {
        $providers = $get->dataDetailPengajuan($id);
        $optionalMessage = $request->optionalMessage;

        $request->validate([
            'optionalMessage' => 'required'
        ],
        [
            'optionalMessage.required' => 'Anda harus memberikan pesan terhadap pengajuan provider.'
        ]
    );

        $updateStatus = Provider::whereId($id)->update([
            'status' => $request->status
        ]);

        if($updateStatus !== 1)
        {
            return back()->with('fail', 'Terjadi kesalahan saat melakukan perubahan status provider');
        }

        Mail::to($providers->user->email)->send(new ProviderVerify($providers, $optionalMessage));

        return redirect()->route('admin.view.base');

    }

    public function postUbahProvider(Request $request, Int $id)
    {
        $provider = Provider::find($id);

        $request->validate([
            'pemilik' => 'required',
            'status' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'jalan' => 'required',
            'rtrw' => 'required',
            'desa'  => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required'
        ]);

        $dataProvider = [
            'pemilik' => $request->pemilik,
            'status' => $request->status,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi
        ];

        $updateProvider = $provider->update($dataProvider);

        if($updateProvider == 0)
        {
            return back()->with('fail', 'Terjadi kesalahan saat mengubah data provider');
        }

        $dataAlamat = [
            'jalan' => $request->jalan,
            'rt/rw' => $request->rtrw,
            'desa'  => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos
        ];

        $updateAlamat = Alamat::whereId($provider->alamat_id)->update($dataAlamat);

        if($updateAlamat == 0)
        {
            return back()->with('fail', 'Terjadi kesalahan saat mengubah data alamat provider');
        }

        return back()->with('success', 'Berhasil melakukan perubahan data');
    }

    public function postDeleteProvider(Int $id)
    {
        $delete = Provider::find($id)->delete();

        if($delete->trashed())
        {
            return back()->with('success', 'Berhasil menghapus data');
        }

        return back()->with('fail', 'Terjadi kesalahan saat menghapus data');
    }

    public function postVerifyBerlangganan(Request $request, Int $id)
    {
        $verifyBerlangganan = Berlangganan::whereId($id)->update([
            'status' => $request->status
        ]);

        if($verifyBerlangganan == 1)
        {
            return redirect('admin')->with('success', 'Berhasil memverifikasi layanan berlangganan');
        }

        return back()->with('fail', 'Gagal melakukan verifikasi layanan berlangganan');
    }

    public function postUbahLayanan(Request $request, Int $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required'
        ]);

        $data =[
            'nama' => $request->nama_layanan,
            'kendaraan' => $request->jenis_kendaraan,
            'tempat' => $request->tempat,
            'air' => $request->air,
            'jenis' => $request->jenis_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi ?? ''
        ];

        $updateLayanan = Layanan::whereId($id)->update($data);

        if($updateLayanan == 1)
        {
            return redirect('admin/data-layanan')->with('success', 'Berhasil melakukan perubahan data layanan');
        }

        return back()->with('fail', 'Gagal melakukan perubahan data layanan');
    }

    public function postUbahBerlangganan(Request $request, Int $id)
    {
        $request->validate([
            'nama_layanan_berlangganan' => 'required',
            'jumlah' => 'required|numeric',
            'deepfree' => 'required|numeric',
            'voucher' => 'required|numeric',
            'harga_berlangganan' => 'required|numeric'
        ]);

        $data = [
            'nama' => $request->nama_layanan_berlangganan,
            'jumlah' => $request->jumlah,
            'auto' => $request->kustomisasi_jadwal,
            'deepfree' => $request->deepfree,
            'voucher' => $request->voucher,
            'harga' => $request->harga_berlangganan,
            'status' => $request->status
        ];

        $updateBerlangganan = Berlangganan::whereId($id)->update($data);

        if($updateBerlangganan == 1)
        {
            return redirect('admin/data-layanan')->with('success', 'Berhasil melakukan perubahan data berlangganan');
        }

        return back()->with('fail', 'Gagal melakukan perubahan data berlangganan');
    }

    public function deleteLayanan(Int $id)
    {
        $deleteLayanan = Layanan::find($id)->delete();

        if($deleteLayanan)
        {
            return back()->with('success', 'Berhasil menghapus data');
        }

        return back()->with('fail', 'Terjadi kesalahan saat menghapus data');
    }

    public function deleteBerlangganan(Int $id)
    {
        $delete = Berlangganan::find($id)->delete();

        if($delete)
        {
            return back()->with('success', 'Berhasil menghapus data');
        }

        return back()->with('fail', 'Terjadi kesalahan saat menghapus data');
    }

    public function postUbahCustomer(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'status' => 'required',
            'lokasi' => 'required'
        ]);

        $customer = Customer::find($id);

        $update = $customer->update([
            'nama' => $request->nama,
            'status' => $request->status,
        ]);

        if($update == 1)
        {
            Alamat::whereId($customer->alamat_id)->update(['kabupaten' => $request->lokasi]);

            return redirect('admin/data-customer')->with('success', 'Berhasil melakukan perubahan data customer');
        }

        return back()->with('fail', 'Gagal melakukan perubahan data customer');
    }

    public function deleteCustomer(Int $id)
    {
        $delete = Customer::whereId($id)->delete();

        if($delete)
        {
            return back()->with('success', 'Berhasil menghapus data customer');
        }

        return back()->with('fail', 'Gagal saat menghapus data customer');
    }
}
