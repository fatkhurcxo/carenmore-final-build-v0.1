@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @include('admin.layout.session')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Penyedia Jasa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Income</li>
        </ol>
    </nav>
    <div class="form-group mt-3 d-flex align-items-center">
        <div class="rounded bg-primary text-white mr-2" style="padding: 5px">
            <i data-feather="search" style="width: 20px; height: 20px;"></i>
        </div>
        <input type="text" class="form-control" id="exampleInputPlaceholder"
            placeholder="Masukkan ID atau nama provider">
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Provider</h5>
            <div class="row row-cols-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title row row-cols-2">
                                <div class="col">
                                    <span>Pendapatan</span>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control o-select-style">
                                            <option class="o-option" selected>Day</option>
                                            <option class="o-option">Week</option>
                                            <option class="o-option">Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="income-number">
                                <div class="row row-cols-2">
                                    <div class="col pendapatan-info">
                                        <h2 style="font-family: 'Dongle', sans-serif;">
                                            Rp{{ number_format(3412000) }}
                                        </h2>
                                        <p class="mt-2">Meningkat sekitar <span
                                                style="background-color: rgb(234, 255, 234);color: green; padding: 4px 8px; border-radius: 4px;">+2%</span>
                                            dari sebelumnya.
                                        </p>
                                    </div>
                                    <div class="col pendapatan-info text-center">
                                        <span>Total Transaksi</span>
                                        <h2 style="font-family: 'Dongle', sans-serif;">4</h2>
                                        <span><a href="" class="transaksi-view">Lihat
                                                Transaksi</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title row row-cols-2">
                                <div class="col">
                                    <span>Rata-rata Pendapatan</span>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control o-select-style">
                                            <option class="o-option" selected>Week</option>
                                            <option class="o-option">Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="income-number">
                                <div class="row row-cols-2">
                                    <div class="col pendapatan-info">
                                        <h2 style="font-family: 'Dongle', sans-serif;">
                                            Rp{{ number_format(3412000) }}
                                        </h2>
                                        <p class="mt-2">Meningkat sekitar <span
                                                style="background-color: rgb(234, 255, 234);color: green; padding: 4px 8px; border-radius: 4px;">+2%</span>
                                            dari sebelumnya.
                                        </p>
                                    </div>
                                    <div class="col pendapatan-info text-center">
                                        <span>Rata-rata Total Transaksi</span>
                                        <h2 style="font-family: 'Dongle', sans-serif;">4</h2>
                                        <span>/ Minggu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="pl-4 pagination pagination-separated mt-3">
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
        </ul>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/chartjs.js') }}"></script>
@endpush
