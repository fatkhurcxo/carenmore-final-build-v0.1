<?php

namespace App\Services\Provider;

use App\Models\KTP;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Layanan;
use App\Models\Provider;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class InputDataProvider
 * @package App\Services
 */
class InputDataProvider
{
    # protected $providerRequest;
    private $status = 'nonaktif';

    public $jenisLayanan = 'Cuci Dirumah';

    /* public function __construct(Request $providerRequest)
    {
        $this->providerRequest = $providerRequest;
    } */

    public function getProviderID($keperluan = '')
    {
        $provider = Provider::firstWhere('user_id', Auth::id());

        if($keperluan == 'full')
        {
            return $provider;
        }

        return $provider->id;

    }

    # Input detail informasi provider
    public function detailProvider(Request $request)
    {
        #dd($request->input());
        $user_id = Auth::user()->id;

        # Insert data alamat
        $alamat = Alamat::create([
            'jalan' => $request->alamat_jalan,
            'rt/rw' => $request->alamat_rtrw,
            'kecamatan' => $request->alamat_kecamatan,
            'kabupaten' => $request->alamat_kabupaten,
            'provinsi' => $request->alamat_provinsi,
            'kodepos' => $request->alamat_kodepos
        ]);

        if(!$alamat->exists)
        {
            return back()->with('status', 'Terjadi kesalahan saat melakukan input data alamat.');
        }

        /* Insert data provider */
        $provider = Provider::create([
            'user_id' => $user_id,
            'alamat_id' => $alamat->id,
            'provider'  => $request->nama_provider,
            'pemilik' => $request->nama_pemilik,
            'kontak' => $request->kontak,
            'status' => $this->status,
            'deskripsi'  => $request->deskripsi_layanan
        ]);

        if(!$provider->exists)
        {
            return back()->with('status', 'Terjadi kesalahan saat melakukan input data provider.');
        }
        $provider  = Provider::firstWhere('user_id', $user_id);
        /* Move Uploaded File */
        $testKTP = [$request->file('upload_ktp'), $request->file('upload_ktp_selfie')];
        $n  = 0;
        do {
            # code...
            $imgName = 'ktp';
            $fileName = $provider->provider . date('Ymd', time());

            if($n == 1)
            {
                $imgName = 'selfie';
            }

            $fixName = $imgName . $fileName . '.' . $testKTP[$n]->getClientOriginalExtension();
            # Store file
            Storage::putFileAs('ktp', $testKTP[$n], $fixName);
            # Get file path
            $path = Storage::url('app/ktp/'.$fixName);

            $paths[] = $path;
            $fileNames[] = $fixName;
            #  Increement
            $n += 1;
        } while ($n <  (count($testKTP)));

        /* KTP path */
        [$pathKTP, $pathSelfie] = $paths;
        /* KTP name */
        [$ktpName, $ktpSelfieName] = $fileNames;

        $ktpStore = KTP::create([
            'provider_id' => 8,
            'pathKTP' => $pathKTP,
            'fileNameKTP' => $ktpName,
            'pathSelfie' => $pathSelfie,
            'fileNameSelfie' => $ktpSelfieName
        ]);

        if(!$ktpStore->exists)
        {
            return back()->with('status', 'Terjadi kesalahan saat melakukan upload file KTP.');
        }

        return true;
    }

    # Tambah Layanan
    public function addlayanan(Request $request)
    {
        # $jenisLayanan = $request->jenis_layanan ?? null;
        if($request->jenis_layanan  === $this->jenisLayanan)
        {
            $request->validate([
                'tempat' =>  'required',
                'air' => 'required'
            ],
        [
            'tempat.required' => 'Anda harus memilih persetujuan ketersediaan tempat',
            'air.required' => 'Anda harus memilih persetujuan ketersediaan air'
        ]);
        }

        $provider = Provider::firstWhere('user_id', Auth::id());

        $layanan = [
            'provider_id' => $provider->id,
            'nama' => $request->nama_layanan,
            'kendaraan' => $request->jenis_kendaraan,
            'tempat' => $request->tempat ?? null,
            'air' => $request->air ?? null,
            'jenis' => $request->jenis_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi ?? null
        ];

        $addLayanan = Layanan::create($layanan);

        if(!$addLayanan->exists)
        {
            return false;
        }

        return true;
    }

    # Delete
    public function delete($id)
    {
        $deleteLayanan = Layanan::find($id);

        if(empty($deleteLayanan))
        {
            return false;
        }

        $deleteLayanan->delete();

        return true;
    }

    # Update
    public function updateLayanan(Request $request, $id)
    {
        if($request->jenis_layanan  === $this->jenisLayanan)
        {
            $request->validate([
                'tempat' =>  'required',
                'air' => 'required'
            ],
        [
            'tempat.required' => 'Anda harus memilih persetujuan ketersediaan tempat',
            'air.required' => 'Anda harus memilih persetujuan ketersediaan air'
        ]);
        }

        $update = [
            'provider_id' => $this->getProviderID(),
            'nama' => $request->nama_layanan,
            'kendaraan' => $request->jenis_kendaraan,
            'tempat' => $request->tempat,
            'air' => $request->air,
            'jenis' => $request->jenis_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ];

        # The update function return number of affected row
        $updateLayanan = Layanan::whereId($id)->update($update);
        /* Verify if data has been updated */
        if($updateLayanan == 1)
        {
            return true;
        }

        return false;
    }

    public function pengajuanLayanan(Request $request)
    {
        $request->validate(
            [
                'kustomisasi_jadwal' => 'required'
            ],
            [

                'kustomisasi_jadwal.required' => 'Anda harus memilih akses kustomisasi jadwal pelanggan'
            ]
        );

        $pengajuan = [
            'layanan_id' => $request->layanan_dipilih,
            'provider_id' => $this->getProviderID(),
            'nama' => $request->nama_layanan_berlangganan,
            'jumlah' => $request->jumlah,
            'auto' => $request->kustomisasi_jadwal,
            'deepfree' => $request->deepfree,
            'voucher' => $request->voucher,
            'harga' => $request->harga_berlangganan,
            'status' => $this->status
        ];

        $addBerlangganan = Berlangganan::create($pengajuan);

        /* Check if data exists */
        if(!$addBerlangganan->exists)
        {
            return false;
        }

        return true;
    }

    public function updateProvider(Request $request)
    {
        $dataUpdate = [
            'provider' => $request->nama_layanan,
            'pemilik' => $request->pemilik_layanan,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi
        ];

        $updateProvider = Provider::whereId($this->getProviderID())->update($dataUpdate);

        if($updateProvider == 1)
        {
            return true;
        }

        return false;
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed',
            'current_password' => 'required'
        ],
        [
            'new_password.required' => "Anda harus mengisikan password terbaru",
            'new_password.confirmed' => "Konfirmasi password tidak sesuai, mohon periksa kembali",
            'current_password.required' => 'Anda harus mengisikan password saat ini'
        ]
        );

        $user = User::find(Auth::id());

        if(!Hash::check($request->current_password, $user->password))
        {
            return false;
        }

        $updatePassword = User::whereId(Auth::id())->update([
            'password' => Hash::make($request->new_password)
        ]);

        if($updatePassword !== 1)
        {
            return false;
        }

        return true;
    }
}
