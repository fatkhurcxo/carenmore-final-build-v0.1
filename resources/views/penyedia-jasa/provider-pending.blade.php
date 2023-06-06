<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading mb-2">Data Sent Successfully!</h4>
    {{-- <div class="alert alert-success mt-4" role="alert">
        <span>Berhasil melakukan pendaftaran layanan. Data anda akan kami tinjau, pastikan
            anda
            telah memasukkan data yang valid. Proses verifikasi akan berlangsung paling
            lambat 1x24
            jam.</span>
    </div> --}}
    <p>
        Kami sedang melakukann peninjauan pada data yang anda ajukan, proses verifikasi berlangsung kurang lebih 2 jam
        setelah submit data.
    </p>
    <hr>
    <div class="card border-0">
        <div class="card-body">
            <h5 class="card-title text-info">Detail Provider</h5>
            <h6 class="card-subtitle mb-2 text-primary-muted"></h6>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Nama Pemilik</th>
                        <th>Kontak</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $provider->provider }} </th>
                        <td>{{ $provider->pemilik }} </td>
                        <td>{{ $provider->kontak }} </td>
                        <td>
                            <a href="" data-toggle="modal" data-target=".bd-example-modal-sm">Lihat deskripsi</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="modal fade text-black bd-example-modal-sm" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deskripsi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                {{ $provider->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 mt-3">
        <div class="card-body">
            <h5 class="card-title text-info">Uploaded File</h5>
            <h6 class="card-subtitle mb-2 text-primary-muted"></h6>
            <div class="row row-cols-2">
                <div class="col text-center">
                    <img class="" src="">
                    <img class="" src="{{ url('storage/' . $ktp->fileNameKTP) }}" alt=""
                        style="object-fit: contain;" height="150">
                </div>
                <div class="col text-center">
                    <img class="" src="{{ url('storage/' . $ktp->fileNameSelfie) }}" alt=""
                        style="object-fit: contain;" height="150">
                </div>
            </div>
        </div>
    </div>
</div>
