<?php

namespace App\Http\Livewire\Provider;

use App\Models\KTP;
use App\Models\Alamat;
use Livewire\Component;
use App\Models\Provider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LwInputDataProvider extends Component
{
    use WithFileUploads;
    /* how to handle variables for very large models */
    # THE PROBLEM IS FIXED
    /*
    public $nama_provider, $nama_pemilik, $kontak, $alamat_jalan, $alamat_rtrw, $alamat_kecamatan, $alamat_kabupaten, $alamat_provinsi, $alamat_kodepos, $deskripsi_layanan, $upload_ktp, $upload_ktp_selfie, $termofservice;
    */

    public $data = [];

    public $rules = [
        /* The Rules of KTP Upload */
        'data.upload_ktp' => 'required|image|max:2048',
        'data.upload_ktp_selfie' => 'required|image|max:2048',
        /* The Rules of Term of Service */
        'data.tos' => 'required|boolean'
    ];

    public $messages = [
        /* Error message of ktp upload */
        'data.upload_ktp.required' => 'Anda belum melakukan upload file KTP',
        'data.upload_ktp.image' => 'File yang anda sertakan tidak sesuai, gunakan file dengan ekstensi gambar',
        'data.upload_ktp.max' => 'Ukuran file terlalu besar, gunakan file dengan ukuran tidak lebih dari 2MB',
        'data.upload_ktp_selfie' => 'Anda belum melakukan upload file selfie dengan KTP',
        'data.upload_ktp_selfie.image' => 'File yang anda sertakan tidak sesuai, gunakan file dengan ekstensi gambar',
        'data.upload_ktp_selfie.max' => 'Ukuran file terlalu besar, gunakan file dengan ukuran tidak lebih dari 2MB',
        /* Term of Service Required */
        'data.tos.required' => 'Untuk melanjutkan pendaftaran, anda harus menyetujui persyaratan dan ketentuan kami.'
    ];

    public $url;

    // public function mount($url)
    // {
    //     $this->url = $url;
    //     dd($this->url);
    // }

    public function render()
    {
        return view('livewire.provider.lw-input-data-provider');
    }

    public function storeProvider()
    {
        /* Validate the Selected File */
        // dd($this->data['upload_ktp']);
        $this->validate();

        /* Source Alamat Data */
        $alamat = [
            'jalan' => $this->data['alamat_jalan'],
            'rt/rw' => $this->data['alamat_rtrw'],
            'desa' => $this->data['alamat_desa'],
            'kecamatan' => $this->data['alamat_kecamatan'],
            'kabupaten' => $this->data['alamat_kabupaten'],
            'provinsi' => $this->data['alamat_provinsi'],
            'kodepos' => $this->data['alamat_kodepos']
        ];

        $addAlamat = Alamat::create($alamat);

        if(!$addAlamat)
        {
            Session::flash('alamatFail', 'Terjadi kesalahan saat melakukan input data alamat');
            goto end;
        }

        /* Null Coalescing Operator */
        $deskripsi = $this->data['deskripsi_layanan'] ?? '';

        /* Source Provider Data */
        $provider = [
            'user_id' => Auth::user()->id,
            'alamat_id' => $addAlamat->id,
            'provider' => $this->data['nama_provider'],
            'pemilik' => $this->data['nama_pemilik'],
            'kontak' => $this->data['kontak'],
            'status' => 'nonaktif',
            'deskripsi' => $deskripsi
        ];

        $addProvider = Provider::create($provider);

        if(!$addProvider)
        {
            session()->flash('providerFail', 'Terjadi kesalahan saat melakukan input data provider');
            goto end;
        }

        /* Store image upload */
        $ktpfile = [$this->data['upload_ktp'], $this->data['upload_ktp_selfie']];
        $n = 0;
        do {
            /* Generate uploaded file name */
            $imgname = 'ktp';
            $filename = $addProvider->provider . date('Ymd',  time());

            if($n === 1)
            {
                $imgname = 'selfie';
            }

            /* Fix filename */
            $fixname = $imgname . $filename . '.' . $ktpfile[$n]->getClientOriginalExtension();

            /* Store file */
            Storage::putFileAs('ktp', $ktpfile[$n], $fixname);
            /* Generate path */
            # To show image from Storage link ('ktp) => storage/app/ktp
            $path = Storage::url('ktp/' . $fixname);

            # Collect ktp path
            $paths[] = $path;
            $fileNames[] = $fixname;

            #  Increement
            $n += 1;
        } while($n < count($ktpfile));

        /* KTP path */
        [$pathKTP, $pathSelfie] = $paths;
        /* KTP name */
        [$ktpName, $ktpSelfieName] = $fileNames;

        /* Source ktp data */
        $ktp = [
            'provider_id' => $addProvider->id,
            'pathKTP' => $pathKTP,
            'fileNameKTP' => $ktpName,
            'pathSelfie' => $pathSelfie,
            'fileNameSelfie' => $ktpSelfieName
        ];

        $addktp = KTP::create($ktp);

        if(!$addktp)
        {
            Session::flash('ktpFail', 'Terjadi kesalahan saat melakukan upload file KTP');
            goto end;
        }

        $this->reset();
        /* DISINI HARUS DITAMBAHKAN EMIT COMPONENT LIST PENGAJUAN PROVIDER SIDE ADMIN */
        return Redirect::to('provider');

        end:
        return false;
        /*
        dd($provider);
        if(empty($this->data))
        {
            goto end;
        }
        dd($this->data);

        */
        // dd($this->nama_provider, $this->nama_pemilik, $this->kontak, $this->alamat_jalan, $this->alamat_rtrw, $this->alamat_kecamatan, $this->alamat_kabupaten, $this->alamat_provinsi, $this->alamat_kodepos, $this->deskripsi_layanan);
    }
}
