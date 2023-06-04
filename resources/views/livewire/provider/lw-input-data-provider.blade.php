<div class="row">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Selamat Datang di Carenmore</h4> --}}
                <p class="card-description">Untuk menjadi partner layanan kebersihan kami, kami perlu memverifikasi
                    informasi detail tentang usahan dan layanan kebersihan anda. Mohon lengkapi form berikut.</p>
                <div id="form-provider-verify">
                    <h4>Detail Penyedia Layanan</h4>
                    @if (Session::has('alamatFail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('alamatFail') }}
                        </div>
                    @elseif (Session::has('providerFail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('providerFail') }}
                        </div>
                    @elseif (Session::has('ktpFail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('ktpFail') }}
                        </div>
                    @endif
                    <p class="mb-4">Lengkapi data anda sebagai penyedia layanan jasa kebersihan kendaraan.
                        Pastikan anda
                        memberikan informasi data yang valid, agar nantinya dapat kami verifikasi.</p>
                    <style>
                        .form-control:focus {
                            box-shadow: #6065f4c2 0px 3px 8px;
                        }
                    </style>
                    <form wire:submit.prevent="storeProvider" action="" method="POST"
                        enctype="multipart/form-data" class="cmxform pb-3" id="detailProviderForm">
                        @csrf
                        <fieldset>
                            <div class="row row-cols-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama Layanan <span class="text-danger">*</span></label>
                                        <input wire:model.defer="data.nama_provider" type="text" name="nama_provider"
                                            class="form-control" placeholder="Nama bisnis anda">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama Pemilik Layanan <span
                                                class="text-danger">*</span></label>
                                        <input wire:model.defer="data.nama_pemilik" type="text" name="nama_pemilik"
                                            class="form-control" placeholder="Nama pemilik bisnis">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nomor Aktif <span class="text-danger">*</span></label>
                                        <input wire:model.defer="data.kontak" type="text" name="kontak"
                                            class="form-control" placeholder="Nomor aktif untuk bisnis">
                                        @error('data.kontak')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="Alamat">
                                <div class="form-group">
                                    <label class="border-bottom container-fluid p-0">Alamat</label>
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Jalan <span class="text-danger">*</span></label>
                                                <input wire:model.defer="data.alamat_jalan" type="text"
                                                    name="alamat_jalan" class="form-control"
                                                    placeholder="e.g : Jl. H. Mawardi">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="">RT/RW <span
                                                                class="text-danger">*</span></label>
                                                        <input wire:model.defer="data.alamat_rtrw" type="text"
                                                            name="alamat_rtrw" class="form-control"
                                                            placeholder="e.g : 03/01">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="">Desa/Kelurahan <span
                                                                class="text-danger">*</span></label>
                                                        <input wire:model.defer="data.alamat_desa" type="text"
                                                            name="alamat_desa" class="form-control"
                                                            placeholder="e.g : Jerukgamping">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Kecamatan <span
                                                        class="text-danger">*</span></label>
                                                <input wire:model.defer="data.alamat_kecamatan" type="text"
                                                    name="alamat_kecamatan" class="form-control"
                                                    placeholder="e.g : Krian">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Kabupaten <span
                                                        class="text-danger">*</span></label>
                                                <input wire:model.defer="data.alamat_kabupaten" type="text"
                                                    name="alamat_kabupaten" class="form-control"
                                                    placeholder="e.g : Sidoarjo">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Provinsi <span
                                                        class="text-danger">*</span></label>
                                                <input wire:model.defer="data.alamat_provinsi" type="text"
                                                    name="alamat_provinsi" class="form-control"
                                                    placeholder="e.g : Jawa Timur">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Kode Pos <span
                                                        class="text-danger">*</span></label>
                                                <input wire:model.defer="data.alamat_kodepos" type="text"
                                                    name="alamat_kodepos" class="form-control"
                                                    placeholder="e.g : 61262">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="deskripsi">
                                <div class="form-group">
                                    <label for="">Deskripsi <span class="text-muted"
                                            style="font-size: smaller;">( opsional
                                            )</span> </label>
                                    <textarea wire:model.defer="data.deskripsi_layanan" class="form-control" name="deskripsi_layanan" id=""
                                        cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <hr>
                            <h4>Upload File</h4>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <div wire:ignore class="form-group pt-3 pl-3 pr-3">
                                        <label for="dropfile1">Foto KTP <span class="text-danger">*</span></label>
                                        <input wire:model.defer="data.upload_ktp" type="file" id="dropfile1"
                                            name="upload_ktp" class="border" />
                                        <p class="mt-2">
                                            <strong class="text-danger">Note :</strong>
                                            Pastikan teks pada gambar KTP terlihat jelas.
                                        </p>
                                    </div>
                                    @error('data.upload_ktp')
                                        <div class="alert alert-icon-danger ml-3 mr-3 rounded-0 text-center p-2"
                                            role="alert" style="margin-top: -10px;">
                                            <i data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div wire:ignore class="form-group pt-3 pl-3 pr-3">
                                        <label for="dropfile1">Foto Selfie dengan KTP <span
                                                class="text-danger">*</span></label>
                                        <input wire:model.defer="data.upload_ktp_selfie" type="file"
                                            id="dropfile2" name="upload_ktp_selfie" class="border" />
                                        <p class="mt-2">
                                            <strong class="text-danger">Note :</strong>
                                            Unggah foto selfie dengan KTP, posisikan sejajar dengan dagu.
                                        </p>
                                    </div>
                                    @error('data.upload_ktp_selfie')
                                        <div class="alert alert-icon-danger ml-3 mr-3 rounded-0 text-center p-2"
                                            role="alert" style="margin-top: -10px;">
                                            <i data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Data
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Tanggal Pengajuan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Detail Layanan
                                        </td>
                                        <td>
                                            <a href="#" class="badge badge-success">Berhasil diupload</a>
                                        </td>
                                        <td>
                                            June 21, 2010
                                        </td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Dokumen Identitas <span class="text-secondary" style="font-size: small;">( KTP
                                                )</span>
                                        </td>
                                        <td>
                                            <a href="#" class="badge badge-success">Berhasil diupload</a>
                                        </td>
                                        <td>
                                            June 21, 2010
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}
                            <h4 class="card-title text-muted mt-3">Terms of Service</h4>
                            <div wire:ignore class="form-check ml-1">
                                <label class="form-check-label">
                                    <input wire:model.defer="data.tos" type="checkbox" name="termofservice"
                                        class="form-check-input">
                                    I have read and agree to the Terms of Service Agreement.
                                </label>
                            </div>
                            @error('data.tos')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="alert alert-warning mt-3" role="alert">
                                <span>Mohon pastikan kembali bahwa data yang anda masukkan sudah benar dan pastikan anda
                                    telah
                                    membaca <span><a class="alert-link" data-target="#tos" data-toggle="modal"
                                            href="">Persyaratan
                                            dan Ketentuan
                                        </a></span>kami.</span>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </fieldset>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="tos" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Website Terms and Conditions of Use
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4>1. Terms</h4>
                                    <p>
                                        By accessing this Website, accessible from Website.com, you are agreeing to be
                                        bound by these Website Terms and Conditions of Use and agree that you are
                                        responsible for the agreement with any applicable local laws. If you disagree
                                        with any of these terms, you are prohibited from accessing this site. The
                                        materials contained in this Website are protected by copyright and trade mark
                                        law.
                                    </p>
                                    <br>
                                    <h4>2. Use License</h4>
                                    <p>
                                        Permission is granted to temporarily download one copy of the materials on
                                        Company Name's Website for personal, non-commercial transitory viewing only.
                                        This is the grant of a license, not a transfer of title, and under this license
                                        you may not:

                                        modify or copy the materials;
                                        use the materials for any commercial purpose or for any public display;
                                        attempt to reverse engineer any software contained on Company Name's Website;
                                        remove any copyright or other proprietary notations from the materials; or
                                        transferring the materials to another person or "mirror" the materials on any
                                        other server.
                                        This will let Company Name to terminate upon violations of any of these
                                        restrictions. Upon termination, your viewing right will also be terminated and
                                        you should destroy any downloaded materials in your possession whether it is
                                        printed or electronic format.
                                    </p>
                                    <h4>3. Disclaimer</h4>
                                    <p>
                                        All the materials on Company Name's Website are provided “as is”. Company Name
                                        makes no warranties, may it be expressed or implied, therefore negates all other
                                        warranties. Furthermore, Company Name does not make any representations
                                        concerning the accuracy or reliability of the use of the materials on its
                                        Website or otherwise relating to such materials or any sites linked to this
                                        Website.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
