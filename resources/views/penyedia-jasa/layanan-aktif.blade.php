@extends('penyedia-jasa.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav> --}}
    @include('penyedia-jasa.layout.emptyprovider')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <span>
                {{ session('success') }}
            </span>
        </div>
    @elseif (Session::has('fail'))
        <div class="alert alert-warning" role="alert">
            <span>
                {{ session('fail') }}
            </span>
        </div>
    @endif
    @providerstatus('nonaktif')
        <div class="alert alert-warning text-center" role="alert">
            Your data is being verified
        </div>
    @elseproviderstatus('aktif')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <div class="col">
                                <h6 class="card-title">Layanan Anda</h6>
                            </div>
                            <div class="col text-right">
                                <style>
                                    .btn-add-service {
                                        background-color: #00A36C;
                                        transition: all 0.5s ease 0s;
                                    }

                                    .btn-add-service:hover {
                                        margin-right: 15px;
                                    }
                                </style>
                                <a href="{{ route('provider.view.add') }}" class="text-white btn btn-add-service">
                                    <img class="img-btn" src="" alt="">
                                    Tambahkan Layanan
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            Detail informasi mengenai data layanan yang anda sediakan.
                        </p>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Layanan</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Jenis Layanan</th>
                                        <th>Ketersediaan Tempat</th>
                                        <th>Ketersediaan Air</th>
                                        <th>Harga</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan as $n => $data)
                                        <tr class="text-center">
                                            <td>{{ $n + 1 }}</td>
                                            <td class="text-left"> {{ $data->nama }} </td>
                                            <td> {{ ucfirst($data->kendaraan) }} </td>
                                            <td> {{ $data->jenis }} </td>
                                            <td>
                                                @if ($data->tempat == 1)
                                                    <span class="badge badge-success">
                                                        Harus Disediakan
                                                    </span>
                                                @elseif ($data->jenis == 'Cuci Ditempat')
                                                    <span class="badge badge-primary">
                                                        Datang ke tempat
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning">
                                                        Tidak disediakan
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->air == 1)
                                                    <span class="badge badge-success">
                                                        Harus Disediakan
                                                    </span>
                                                @elseif ($data->jenis == 'Cuci Ditempat')
                                                    <span class="badge badge-primary">
                                                        Datang ke tempat
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning">
                                                        Tidak disediakan
                                                    </span>
                                                @endif
                                            </td>
                                            <td> Rp{{ number_format($data->harga) }} </td>
                                            <td>
                                                <div class="dropdown mb-2">
                                                    <button class="btn p-0" type="button" id="dropdownMenuButton7"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7"
                                                        style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                                        <a class="dropdown-item d-flex align-items-center" data-toggle="modal"
                                                            data-target="#modalDeskripsi" href="#"><i data-feather="book"
                                                                class="icon-sm mr-2"></i> <span
                                                                class="">Deskripsi</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="{{ route('provider.view.update', ['update' => $data->id]) }}"><i
                                                                data-feather="edit-3" class="icon-sm mr-2"></i> <span
                                                                class="">Ubah</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="{{ route('provider.delete', ['delete' => $data->id]) }}"><i
                                                                data-feather="trash" class="icon-sm mr-2"></i> <span
                                                                class="">Delete</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="{{ route('provider.view.pengajuan.direct', ['pengajuan' => $data->id]) }}"><i
                                                                data-feather="trending-up" class="icon-sm mr-2"></i> <span
                                                                class="">Jadikan Langganan</a>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalDeskripsi" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content rounded-0 text-left">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Deskripsi
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $data->deskripsi }}
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
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
