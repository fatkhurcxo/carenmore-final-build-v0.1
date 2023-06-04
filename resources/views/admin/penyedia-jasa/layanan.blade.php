@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @include('admin.layout.session')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-line-tab" data-toggle="tab" href="#layanan" role="tab"
                        aria-controls="home" aria-selected="true">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-line-tab" data-toggle="tab" href="#berlangganan" role="tab"
                        aria-controls="profile" aria-selected="false">Berlangganan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Updated <span class="badge badge-primary">6</span></a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="lineTabContent">
                <div class="tab-pane fade show active" id="layanan" role="tabpanel" aria-labelledby="home-line-tab">
                    {{-- LAYANAN --}}
                    {{-- Search Bar --}}
                    {{-- <div class="form-group mt-3 d-flex align-items-center">
                        <div class="rounded bg-primary text-white mr-2" style="padding: 5px">
                            <i data-feather="search" style="width: 20px; height: 20px;"></i>
                        </div>
                        <input type="text" class="form-control" id="exampleInputPlaceholder"
                            placeholder="Masukkan nama layanan, ID layanan, atau nama provider">
                    </div> --}}
                    <div class="card-body" style="background-color: rgb(251, 251, 251)">
                        {{-- <h5 class="card-title pb-2">Nama Provider</h5> --}}
                        <div class="row row-cols-lg-3">
                            @foreach ($layanan as $n => $data)
                                <div class="col mb-3">
                                    <div class="card card-layanan">
                                        <div class="card-body">
                                            <div class="d-flex card-title">
                                                <div class="flex-fill">
                                                    <span class="text-primary"> {{ $data->nama }} <span
                                                            class="text-secondary"
                                                            style="text-transform: capitalize; font-weight: 200;">(
                                                            {{ $data->kendaraan }}
                                                            )</span>
                                                    </span>
                                                </div>
                                                <div class="dropleft">
                                                    <a class="dropdown" type="button" data-toggle="dropdown"
                                                        id="layanan_opsi"><i data-feather="more-vertical"
                                                            style="color: #728ff7;"></i></a>
                                                    <div class="dropdown-menu o-drop-menu"
                                                        style="text-transform: capitalize;" aria-labelledby="layanan_opsi">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.view.detail.layanan', ['detail' => $data->id]) }}">Ubah</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.post.delete.layanan', ['delete' => $data->id]) }}">Hapus</a>
                                                        <a class="dropdown-item" href="">Peringatan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-2 row-cols-2">
                                                <div class="col">
                                                    <strong>Ketersediaan Tempat</strong>
                                                </div>
                                                <div class="col">
                                                    : @if ($data->tempat == 1)
                                                        <span class="badge badge-success">harus disediakan</span>
                                                    @elseif ($data->tempat == 0)
                                                        <span class="badge badge-warning">tidak disediakan</span>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <strong>Ketersediaan Air</strong>
                                                </div>
                                                <div class="col">
                                                    : @if ($data->air == 1)
                                                        <span class="badge badge-success">harus disediakan</span>
                                                    @elseif ($data->air == 0)
                                                        <span class="badge badge-warning">tidak disediakan</span>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <strong>Jenis Layanan</strong>
                                                </div>
                                                <div class="col">
                                                    <span>: {{ $data->jenis }} </span>
                                                </div>
                                                <div class="col">
                                                    <strong>Harga</strong>
                                                </div>
                                                <div class="col">
                                                    <span>: Rp{{ number_format($data->harga) }} </span>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h6>Deskripsi :</h6>
                                                <p>{{ $data->deskripsi }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- END LAYANAN --}}
                    {{ $layanan->links('vendor.pagination.bootstrap-5') }}
                    {{-- <ul class="pagination pagination-separated mt-3">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                Previous
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                Next
                            </a>
                        </li>
                    </ul> --}}
                </div>
                <div class="tab-pane fade" id="berlangganan" role="tabpanel" aria-labelledby="profile-line-tab">
                    {{-- BERLANGGANAN --}}
                    {{-- Search Bar --}}
                    {{-- <div class="form-group mt-3 d-flex align-items-center">
                        <div class="rounded bg-primary text-white mr-2" style="padding: 5px">
                            <i data-feather="search" style="width: 20px; height: 20px;"></i>
                        </div>
                        <input type="text" class="form-control" id="exampleInputPlaceholder"
                            placeholder="Masukkan nama layanan, ID layanan, atau nama provider">
                    </div> --}}
                    <div class="card-body" style="background-color: rgb(251, 251, 251)">
                        {{-- <h5 class="card-title pb-2">Nama Provider</h5> --}}
                        <div class="row row-cols-lg-3">
                            @foreach ($berlangganan as $n => $data)
                                <div class="col">
                                    <div class="card card-layanan">
                                        <div class="card-body">
                                            <div class="d-flex card-title">
                                                <div class="flex-fill">
                                                    <span class="text-primary"> {{ $data->nama }} <span
                                                            class="text-secondary"
                                                            style="text-transform: capitalize; font-weight: 200;">(
                                                            {{ $data->layanan->jenis }}
                                                            Berlangganan
                                                            )</span>
                                                    </span>
                                                </div>
                                                <div class="dropleft">
                                                    <a class="dropdown" type="button" data-toggle="dropdown"
                                                        id="layanan_opsi"><i data-feather="more-vertical"
                                                            style="color: #728ff7;"></i></a>
                                                    <div class="dropdown-menu o-drop-menu"
                                                        style="text-transform: capitalize;"
                                                        aria-labelledby="layanan_opsi">
                                                        <a class="dropdown-item"
                                                            href={{ route('admin.view.update.berlangganan', ['detail' => $data->id]) }}>Ubah</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.post.delete.berlangganan', ['delete' => $data->id]) }}">Hapus</a>
                                                        <a class="dropdown-item" href="">Peringatan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-2 row-cols-2">
                                                <div class="col">
                                                    <strong>Jumlah pencucian</strong>
                                                </div>
                                                <div class="col">
                                                    : <strong> {{ $data->jumlah }}x </strong>
                                                </div>
                                                <div class="col">
                                                    <strong>Custom Jadwal</strong>
                                                </div>
                                                <div class="col">
                                                    : @if ($data->auto == 1)
                                                        <span class="badge badge-success">didukung</span>
                                                    @elseif ($data->auto == 0)
                                                        <span class="badge badge-warning">tidak didukung</span>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <strong>Deepclean Free</strong>
                                                </div>
                                                <div class="col">
                                                    <span>: <strong>{{ $data->deepfree }}x</strong></span>
                                                </div>
                                                <div class="col">
                                                    <strong>Voucher</strong>
                                                </div>
                                                <div class="col">
                                                    <span>: <strong>{{ $data->voucher }}x</strong></span>
                                                </div>
                                                <div class="col">
                                                    <strong>Harga</strong>
                                                </div>
                                                <div class="col">
                                                    <span>: Rp{{ number_format($data->harga) }} </span>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h6>Layanan yang dirujuk :</h6>
                                                <p>
                                                    {{ $data->layanan->nama }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $berlangganan->links('vendor.pagination.bootstrap-5') }}
                    {{-- END BERLANGGANAN --}}
                    {{-- <ul class="pagination pagination-separated mt-3">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                Previous
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                Next
                            </a>
                        </li>
                    </ul> --}}
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-line-tab">
                    <div class="card-body" id="updated-layanan">
                        <h5 class="card-subtitle mb-2 text-primary">Nama Provider <span class="text-muted"
                                style="font-size: small;">(30 Detik yang
                                lalu)</span></h5>
                        <div class="d-flex">
                            <div class="flex-fill">
                                <p class="card-text">Mengubah layanan berlangganan dengan ID layanan : srvc0098745ca.</p>
                                <strong>Perubahan :</strong>
                                <div class="row w-50 row-cols-2">
                                    <div class="col">
                                        <span>Harga</span>
                                    </div>
                                    <div class="col">
                                        <span>: Rp23.000,00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="text-center mb-2">
                                    <i data-feather="edit" id="icon-notif-updated"></i>
                                </div>
                                <div>
                                    <a href="#" class="card-link" id="notif-action">Tinjau layanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="hapus-layanan">
                        <h5 class="card-subtitle mb-2" style="color: red;">Nama Provider <span class="text-muted"
                                style="font-size: small;">(3 Menit yang
                                lalu)</span></h5>
                        <div class="d-flex">
                            <div class="flex-fill">
                                <p class="card-text">Menghapus layanan berlangganan dengan ID layanan : srvc0098745ca.</p>
                            </div>
                            <div class="">
                                <div class="text-center mb-2">
                                    <i data-feather="info" id="icon-notif-deleted"></i>
                                </div>
                                <div>
                                    <a href="#" class="card-link" id="notif-action">Peringatkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="tambah-layanan">
                        <h5 class="card-subtitle mb-2" style="color: green;">Nama Provider <span class="text-muted"
                                style="font-size: small;">(8 Menit yang
                                lalu)</span></h5>
                        <div class="d-flex">
                            <div class="flex-fill">
                                <p class="card-text">Menambahkan layanan berlangganan dengan ID layanan : srvc0098745ca.
                                </p>
                            </div>
                            <div class="">
                                <div class="text-center mb-2">
                                    <i data-feather="check-circle" id="icon-notif-add"></i>
                                </div>
                                <div>
                                    <a href="#" class="card-link" id="notif-action">Tinjau layanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-line-tab">...</div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush
