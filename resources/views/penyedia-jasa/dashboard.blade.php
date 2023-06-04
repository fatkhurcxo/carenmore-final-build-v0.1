@extends('penyedia-jasa.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- <img src="{{ url($ktp->pathKTP) }}" alt=""> --}}
    {{-- <span> Download file <a href="{{ route('provider.download', [$ktp->fileNameKTP]) }}">here</a> </span> --}}

    {{--  Data Provider Kosong --}}
    @emptyprovider
    <livewire:provider.lw-input-data-provider />
    @endemptyprovider
    {{-- Provider sedang dalam tinjauan --}}
    @providerstatus('nonaktif')
        @include('penyedia-jasa.provider-pending')
    @elseproviderstatus('aktif')
        {{-- <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Selamat Datang di Dashboard Carenmore</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex"
                    id="dashboardDate">
                    <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                    <input type="text" class="form-control">
                </div>
                <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                    <i class="btn-icon-prepend" data-feather="download"></i>
                    Import
                </button>
                <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div> --}}

        <div class="card mb-3">
            <div class="card-body">
                <div class="row row-cols-2">
                    <div class="col">
                        <h6 class="card-title">Transaksi hari ini</h6>
                    </div>
                    <div class="col text-right">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-icon" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Daftar seluruh transaksi yang terjadi hari ini.
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Reference
                                </th>
                                <th>
                                    Customer
                                </th>
                                <th>
                                    Layanan
                                </th>
                                <th>
                                    Status Pembayaran
                                </th>
                                <th>
                                    Status Pesanan
                                </th>
                                <th>
                                    Nominal
                                </th>
                                <th>
                                    Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    7
                                </td>
                                <td>
                                    Zenaida Frank
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                            role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $313,500
                                </td>
                                <td>
                                    March 22, 2013
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Layanan aktif</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye"
                                            class="icon-sm mr-2"></i> <span class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2"
                                            class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash"
                                            class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer"
                                            class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download"
                                            class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            @foreach ($layanan as $n => $data)
                                <a href="" data-toggle="modal" data-target="#detailLayanan"
                                    class="d-flex align-items-center border-bottom py-3">
                                    <div class="mr-3">
                                        <img src="@if ($data->kendaraan == 'mobil') {{ asset('assets/images/electric-car.png') }}
                                            @else
                                            {{ asset('assets/images/motorcycle.png') }} @endif"
                                            class="rounded-circle wd-35 img-fluid" alt="user" width="35" height="35">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-body mb-2"> {{ $data->nama }} </h6>
                                            {{-- <p class="text-muted tx-12"></p> --}}
                                            @if ($data->kendaraan == 'mobil')
                                                <span class="badge badge-primary">
                                                    {{ $data->kendaraan }}
                                                </span>
                                            @else
                                                <span class="badge text-white badge-info">
                                                    {{ $data->kendaraan }}
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-muted tx-13"> {{ $data->deskripsi }} </p>
                                    </div>
                                </a>
                                <!-- Modal -->
                                {{-- <div class="modal fade" id="detailLayanan" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 text-left">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Detail
                                                    Layanan
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Berikut merupakann detail layanan
                                                    anda
                                                </p>
                                                <div class="table-responsive mt-2">
                                                    <table class="table border-top">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    Nama Layanan
                                                                </th>
                                                                <td>
                                                                    : {{ $data->nama }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Jenis Kendaraan
                                                                </th>
                                                                <td>
                                                                    : {{ ucfirst($data->kendaraan) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Jenis Layanan
                                                                </th>
                                                                <td>
                                                                    : {{ ucfirst($data->jenis) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Ketersediaan Tempat
                                                                </th>
                                                                <td>:
                                                                    @if ($data->tempat == 1)
                                                                        <span class="badge badge-success">
                                                                            harus disediakan
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-warning">
                                                                            tidak disediakan
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Ketersediaan Air
                                                                </th>
                                                                <td>:
                                                                    @if ($data->air == 1)
                                                                        <span class="badge badge-success">
                                                                            harus disediakan
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-warning">
                                                                            tidak disediakan
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Harga
                                                                </th>
                                                                <td>
                                                                    : Rp{{ number_format($data->harga) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Deskripsi
                                                                </th>
                                                                <td>
                                                                    : {{ $data->deskripsi }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                            {{ $layanan->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Customer berlangganan</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye"
                                            class="icon-sm mr-2"></i> <span class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            data-feather="edit-2" class="icon-sm mr-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash"
                                            class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            data-feather="printer" class="icon-sm mr-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            data-feather="download" class="icon-sm mr-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">No.</th>
                                        <th class="pt-0">Nama Customer</th>
                                        <th class="pt-0">Nama Layanan</th>
                                        <th class="pt-0">Status</th>
                                        <th class="pt-0">Berlaku</th>
                                        <th class="pt-0">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>NobleUI jQuery</td>
                                        <td>01/01/2021</td>
                                        <td><span class="badge badge-danger">Released</span></td>
                                        <td>Leonardo Payne</td>
                                        <td><a href="" class="btn btn-primary">Tinjau</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    @endproviderstatus
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    {{-- JS for unverified provider --}}
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    {{-- JS for unverified provider --}}
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush
