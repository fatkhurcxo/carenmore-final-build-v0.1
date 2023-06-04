@extends('penyedia-jasa.layout.master')

@section('content')
    @include('penyedia-jasa.layout.emptyprovider')
    @providerstatus('nonaktif')
        <div class="alert alert-warning text-center" role="alert">
            Your data is being verified
        </div>
    @elseproviderstatus('aktif')
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (Session::has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="mb-1">Ajukan Layanan Berlangganan</h5>
                <p class="mb-3">Untuk mengajukan layanan berlangganan, pilih layanan anda yang telah kami verifikasi. Untuk
                    ketentuan lebih jelas <a role="button" href="" data-toggle="modal"
                        data-target=".bd-example-modal-lg">klik
                        disini.</a>
                </p>
                {{-- Modal --}}
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content rounded-0 p-3">
                            <div class="alert alert-info" role="alert">
                                <h5>Persyaratan</h5>
                            </div>
                            <p class="mb-3">
                                Layanan berlangganan diambil dari layanan anda yang telah kami verifikasi. Anda perlu menyiapkan
                                detail informasi tentang bundling/paket layanan berlangganan. Berikut merupakan daftar bundling
                                yang wajib anda sertakan.
                            </p>
                            <div class="alert alert-warning" role="alert">
                                <strong>Jumlah pencucian</strong> yakni jumlah pencucian yang anda tawarkan di setiap bulan
                                layanan layanan berlangganan anda.
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <strong>Jadwal pencucian</strong> merupakan jadwal pencucian kendaraan pelanggan yang diatur
                                sedemikian
                                sesuai dengan jumlah pencucian pada layanan berlangganan.
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <strong>Deepclean free</strong> yakni jumlah gratis pencucian layanan jenis deepclean yang
                                diberikan kepada pelanggan. Jumlah deepclean free tidak mempengaruhi total jumlah pencucian
                                layanan berlangganan.
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <strong>Voucher Carenmore</strong> merupakan jumlah voucher yang diberikan ke pelanggan untuk
                                dapat ditukar dengan pencucian kendaraan sebanyak 1x reguler.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form class="cmxform" id="berlaggananForm" method="POST"
                            action="{{ route('provider.post.pengajuan') }}">
                            @csrf
                            <fieldset>
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Nama Layanan Berlangganan</label>
                                            <input type="text" name="nama_layanan_berlangganan" class="form-control"
                                                placeholder="Nama untuk layanan berlangganan anda"
                                                value="{{ old('nama_layanan_berlangganan') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Pilih Layanan</label>
                                            <select class="form-control" name="layanan_dipilih" id="exampleFormControlSelect1">
                                                <option selected disabled>Pilih layanan anda</option>
                                                @foreach ($layanan as $data)
                                                    <option value="{{ $data->id }}" @selected(old('layanan_dipilih') == $data->id)
                                                        @php
                                                            $directs = $direct ?? null;
                                                        @endphp @selected($directs == $data->id)>
                                                        {{ $data->nama }}
                                                    </option>
                                                @endforeach
                                                {{-- old method is {{ old('layanan_dipilih') == $data->id ? 'selected' : '' }} --}}
                                                {{-- new method is @selected(old('layanan_dipilih') == $data->id) --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Jumlah</label>
                                            <input type="text" name="jumlah" class="form-control"
                                                placeholder="Jumlah pencucian dalam sebulan"
                                                title="Jumlah pencucian yang ditawarkan dalam satu bulan"
                                                value="{{ old('jumlah') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Deepclean Free</label>
                                                    <input type="text" name="deepfree" class="form-control"
                                                        placeholder="Jumlah cuci Deepclean"
                                                        title="Jumlah gratis cuci Deepclean yang ditawarkan dalam sebulan"
                                                        value="{{ old('deepfree') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Voucher</label>
                                                    <input type="text" name="voucher" class="form-control"
                                                        placeholder="Jumlah voucher yang ditawarkan"
                                                        title="Jumlah voucher gratis pencucian yang diberikan saat pembelian layanan"
                                                        value="{{ old('voucher') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="border-bottom container pl-0">Customisasi Jadwal Otomatis</label>
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="kustomisasi_jadwal" value="1">
                                                            Ya
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="kustomisasi_jadwal" value="0">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('kustomisasi_jadwal')
                                                <div class="alert alert-danger pt-2 pb-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <a tabindex="0" class="text-warning" role="button" data-toggle="popover"
                                                data-trigger="focus" data-placement="bottom"
                                                data-content="Pilih 'Ya' jika anda mengizinkan pelanggan untuk mengatur jadwal pencucian">
                                                <i data-feather="alert-circle" style="width: 20px; height: 20px;"></i>
                                                Informasi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Harga</label>
                                            <input id="harga" class="form-control" name="harga_berlangganan"
                                                type="text" placeholder="Hanya gunakan angka tanpa titik(.) atau koma(,)"
                                                value="{{ old('harga_berlangganan') }}">
                                        </div>
                                    </div>
                                    <style>
                                        .form-check {
                                            transition: all 0.5s ease 0s;
                                        }

                                        .form-check:hover {
                                            transform: scale(1.075);
                                        }
                                    </style>
                                </div>
                                <button class="btn btn-primary" type="submit">Ajukan</button>
                                <a class="btn btn-secondary" type="button">Kembali</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- TABLE --}}
        <div class="row mt-4">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Pengajuan layanan berlangganan</h6>
                        <p class="card-description">Detail informasi layanan yang diajukan menjadi berlangganan.</p>
                        <div class="table-responsive pt-1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Nama Layanan Berlangganan
                                        </th>
                                        <th>
                                            Layanan yang diajukan
                                        </th>
                                        <th>
                                            Harga
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Diajukan
                                        </th>
                                        <th>
                                            Opsi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <style>
                                        .hover-on-row:hover {
                                            cursor: pointer;
                                            background-color: rgb(243, 243, 243);
                                        }
                                    </style>
                                    @foreach ($pengajuan as $n => $data)
                                        <tr class="hover-on-row">
                                            <td>
                                                {{ $n + 1 }}
                                            </td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                <span class="text-info">
                                                    {{ $data->layanan->nama }}
                                                </span>
                                            </td>
                                            <td>
                                                Rp{{ number_format($data->harga) }}
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    sedang ditinjau
                                                </span>
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#modalDetail"
                                                    class="btn btn-info btn-sm text-white">Detail</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content rounded-0 text-left">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Detail
                                                                    Pengajuan
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Berikut merupakann detail pengajuan layanan berlangganan
                                                                    anda
                                                                </p>
                                                                <div class="table-responsive mt-2">
                                                                    <table class="table border-top">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>
                                                                                    Nama Layanan Berlangganan
                                                                                </th>
                                                                                <td>
                                                                                    {{ $data->nama }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Jenis Kendaraan
                                                                                </th>
                                                                                <td>
                                                                                    {{ ucfirst($data->layanan->kendaraan) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Jenis Layanan
                                                                                </th>
                                                                                <td>
                                                                                    {{ ucfirst($data->layanan->jenis) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Layanan yang Diajukan
                                                                                </th>
                                                                                <td>
                                                                                    {{ $data->layanan->nama }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Total Pencucian
                                                                                </th>
                                                                                <td>
                                                                                    <strong>
                                                                                        {{ $data->jumlah . 'x' }}
                                                                                    </strong>
                                                                                    Pencucian
                                                                                    Kendaraan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Kustomisasi Jadwal
                                                                                </th>
                                                                                <td>
                                                                                    @if ($data->auto == 0)
                                                                                        <span class="badge badge-warning">
                                                                                            tidak didukung
                                                                                        </span>
                                                                                    @else
                                                                                        <span class="badge badge-success">
                                                                                            didukung
                                                                                        </span>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Deepclean yang Diberikan
                                                                                </th>
                                                                                <td>
                                                                                    <strong>
                                                                                        {{ $data->deepfree . 'x' }}
                                                                                    </strong>
                                                                                    Deepclean
                                                                                    dari
                                                                                    {{ $data->jumlah . 'x' }}
                                                                                    Pencucian
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Voucher yang Diberikan
                                                                                </th>
                                                                                <td>
                                                                                    @if ($data->voucher == 0)
                                                                                        <span class="badge badge-danger">
                                                                                            tidak ada
                                                                                        </span>
                                                                                    @else
                                                                                        <strong>
                                                                                            {{ $data->voucher . 'x' }}
                                                                                        </strong> Voucher
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <strong class="text-danger">Note :</strong>
                                                                    Setelah pengajuan anda disetujui, saat beroperasi anda harus
                                                                    menerapkan layanan sesuai dengan ketentuan tersebut.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endproviderstatus
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush
