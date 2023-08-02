@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Transaksi</h6>
            <p class="card-description">Data seluruh transaksi yang terdaftar pada sistem <a href="">Carenmore</a></p>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Reference</th>
                            <th>Nominal</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $data)
                            <tr>
                                <td>{{ $index += 1 }}</td>
                                <td>
                                    {{ $data->reference }}
                                </td>
                                <td>
                                    {{ 'Rp' . number_format($data->nominal) }}
                                </td>
                                <td>
                                    {{ $data->layanan->nama }}
                                </td>
                                <td>
                                    @if ($data->status == 'proses')
                                        <span class="badge badge-warning"> {{ $data->status }} </span>
                                    @elseif ($data->status == 'selesai')
                                        <span class="badge badge-success"> {{ $data->status }} </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
