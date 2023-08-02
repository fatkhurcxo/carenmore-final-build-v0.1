@extends('penyedia-jasa.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @include('penyedia-jasa.layout.emptyprovider')
    @providerstatus('nonaktif')
        <div class="alert alert-warning text-center" role="alert">
            Your data is being verified
        </div>
    @elseproviderstatus('aktif')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Transaksi</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Referensi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Nominal</th>
                                        <th>Berlangganan</th>
                                        <th>Tanggal Pemesanan</th>
                                        {{-- <th>Opsi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $n => $data)
                                        <tr>
                                            <td>
                                                {{ $n += 1 }}
                                            </td>
                                            <td>
                                                {{ $data->reference }}
                                            </td>
                                            <td>
                                                {{ $data->customer->nama }}
                                            </td>
                                            <td>
                                                {{ $data->layanan->nama }}
                                            </td>
                                            <td>
                                                {{ 'Rp' . number_format($data->nominal) }}
                                            </td>
                                            <td>
                                                @if ($data->berlangganan == 1)
                                                    <span class="badge badge-success">
                                                        ya
                                                    </span>
                                                @elseif($data->berlangganan !== 1)
                                                    <span class="badge badge-warning">
                                                        tidak
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <!--<td class="text-center">-->
                                            <!--    <button class="btn btn-sm btn-outline-info">Detail</button>-->
                                            <!--    <button class="btn btn-sm btn-outline-danger"><i data-feather="printer"-->
                                            <!--            style="width: 13px; height: 13px;"></i>-->
                                            <!--        Cetak</button>-->
                                            <!--</td>-->
                                            {{-- <td>
                                            <button class="btn btn-primary btn-sm">
                                                Detail
                                            </button>
                                        </td> --}}
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
