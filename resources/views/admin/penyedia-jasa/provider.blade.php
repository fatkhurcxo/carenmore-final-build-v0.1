@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Penyedia Jasa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Provider</li>
        </ol>
    </nav> --}}
    @include('admin.layout.session')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Provider</h6>
                    <p class="card-description">Data seluruh provider yang terdaftar pada sistem <a
                            href="">Carenmore</a></p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Pemilik Layanan</th>
                                    <th>Wilayah</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $n => $data)
                                    <tr>
                                        <td> {{ $n += 1 }} </td>
                                        <td> {{ $data->provider }} </td>
                                        <td> {{ $data->pemilik }} </td>
                                        <td> {{ $data->alamat->kecamatan }} </td>
                                        <td> {{ $data->kontak }} </td>
                                        <td>
                                            @if ($data->status === 'aktif')
                                                <span class="badge badge-success">
                                                    aktif
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown mb-2">
                                                <button class="btn p-0 btn-outline-primary" type="button"
                                                    id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7"
                                                    style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('admin.view.detail.provider', ['detail' => $data->id]) }}"><i
                                                            data-feather="book" class="icon-sm mr-2"></i> <span
                                                            class="">Detail</span></a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('admin.post.delete.provider', ['delete' => $data->id]) }}"><i
                                                            data-feather="trash" class="icon-sm mr-2"></i> <span
                                                            class="">Delete</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href=""><i
                                                            data-feather="trending-up" class="icon-sm mr-2"></i> <span
                                                            class="">Peringatkan</a>
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
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
