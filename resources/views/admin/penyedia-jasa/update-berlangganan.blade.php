@extends('admin.layout.master')

@section('content')
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
            <h5 class="mb-1">Detail Layanan Berlangganan</h5>
            {{-- <p class="mb-3">Untuk mengajukan layanan berlangganan, pilih layanan anda yang telah kami verifikasi. Untuk
                ketentuan lebih jelas <a role="button" href="" data-toggle="modal"
                    data-target=".bd-example-modal-lg">klik
                    disini.</a>
            </p> --}}
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
                    <form class="cmxform" id="" method="POST"
                        action="@if ($route === 'admin.post.verify.berlangganan') {{ route($route, ['berlangganan' => $berlangganan->id]) }}
                            @elseif ($route === 'admin.post.update.berlangganan')
                            {{ route($route, ['detail' => $berlangganan->id]) }} @endif">
                        @csrf
                        <fieldset>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Nama Layanan Berlangganan</label>
                                        <input type="text" name="nama_layanan_berlangganan" class="form-control"
                                            placeholder="Nama untuk layanan berlangganan anda"
                                            value="{{ $berlangganan->nama ?? old('nama_layanan_berlangganan') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Pilih Layanan</label>
                                        <select class="form-control" name="layanan_dipilih" id="exampleFormControlSelect1">
                                            <option selected disabled> {{ $berlangganan->layanan->nama }} </option>
                                            {{-- @foreach ($layanan as $data)
                                                <option value="{{ $data->id }}" @selected(old('layanan_dipilih') == $data->id)
                                                    @php
                                                        $directs = $direct ?? null;
                                                    @endphp @selected($directs == $data->id)>
                                                    {{ $data->nama }}
                                                </option>
                                            @endforeach --}}
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
                                            value="{{ $berlangganan->jumlah ?? old('jumlah') }}">
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
                                                    value="{{ $berlangganan->deepfree ?? old('deepfree') }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Voucher</label>
                                                <input type="text" name="voucher" class="form-control"
                                                    placeholder="Jumlah voucher yang ditawarkan"
                                                    title="Jumlah voucher gratis pencucian yang diberikan saat pembelian layanan"
                                                    value="{{ $berlangganan->voucher ?? old('voucher') }}">
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
                                                            name="kustomisasi_jadwal" value="1"
                                                            @checked($berlangganan->auto == 1)>
                                                        Ya
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="kustomisasi_jadwal" value="0"
                                                            @checked($berlangganan->auto == 0)>
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
                                            value="{{ $berlangganan->harga ?? old('harga_berlangganan') }}">
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
                            <h5 class="mt-3">Proses Layanan Berlangganan</h5>
                            <hr>
                            <div class="">
                                <label>Layanan yang dijadikan berlangganan</label>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Layanan</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Ketersediaan Tempat</th>
                                                <th>Ketersediaan Air</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th> {{ $berlangganan->layanan->nama }} </th>
                                                <td> {{ $berlangganan->layanan->kendaraan }} </td>
                                                <td> {{ $berlangganan->layanan->jenis }} </td>
                                                <td>
                                                    @if ($berlangganan->layanan->tempat == 1)
                                                        <span class="badge badge-success">harus disediakan</span>
                                                    @elseif ($berlangganan->layanan->tempat == 0 && $berlangganan->layanan->jenis == 'Cuci Ditempat')
                                                        <span class="badge badge-primary">datang ke tempat</span>
                                                    @else
                                                        <span class="badge badge-warning">tidak disediakan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($berlangganan->layanan->air == 1)
                                                        <span class="badge badge-success">harus disediakan</span>
                                                    @elseif ($berlangganan->layanan->air == 0 && $berlangganan->layanan->jenis == 'Cuci Ditempat')
                                                        <span class="badge badge-primary">datang ke tempat</span>
                                                    @else
                                                        <span class="badge badge-warning">tidak disediakan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    Rp{{ number_format($berlangganan->layanan->harga) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row-cols-2 row mt-1">
                                <div class="col col-4">
                                    <div class="form-group">
                                        <label class="">Aktifkan Status Layanan</label>
                                        <select class="proses-status" name="status">
                                            <option value="aktif" @selected($berlangganan->status == 'aktif')>Aktif</option>
                                            <option value="nonaktif" @selected($berlangganan->status == 'nonaktif')>Nonaktif</option>
                                        </select>
                                    </div>
                                    {{-- ID LAYANAN BERLANGGANAN --}}
                                    {{-- <input type="hidden" name="id" value="{{ $berlangganan->id }}"> --}}
                                    <button class="btn btn-primary" type="submit">
                                        @if ($route === 'admin.post.verify.berlangganan')
                                            {{ 'Verify' }}
                                        @elseif ($route === 'admin.post.update.berlangganan')
                                            {{ 'Simpan' }}
                                        @endif
                                    </button>
                                    <a href="{{ route('admin.view.layanan') }}" class="btn btn-secondary"
                                        type="button">Kembali</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush
