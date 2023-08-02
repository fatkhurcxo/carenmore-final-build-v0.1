@extends('admin.layout.master')
@section('content')
    {{-- <div role="alert" class="alert alert-warning text-center">
        Billing page coming soon
    </div> --}}
    <div class="card mb-3">
        <div class="card-body">
            <div class="row row-cols-2">
                <div class="col">
                    <h6 class="card-title">Daftar tagihan provider</h6>
                </div>
                <div class="col text-right">
                    <div class="dropdown">
                        {{-- <button class="btn btn-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <p class="card-description">
                Daftar tagihan provider atas seluruh transaksi yang berlangsung.
            </p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Nama Pemilik
                            </th>
                            <th>
                                Nama Layanan
                            </th>
                            <th>
                                Jumlah Layanan
                            </th>
                            <th>
                                Jumlah Transaksi
                            </th>
                            <th>
                                Total Tagihan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $index => $data)
                            <tr>
                                <td>
                                    {{ $index += 1 }}
                                </td>
                                <td>
                                    {{ $data->pemilik }}
                                </td>
                                <td>
                                    {{ $data->provider }}
                                </td>
                                <td>
                                    {{ $countLayanan = \App\Models\Layanan::where('id', $data->id)->get()->count() }}
                                </td>
                                <td>
                                    {{ $countTransaksi = \App\Models\Transaksi::where('id', $data->id)->get()->count() }}
                                </td>
                                <td>
                                    @php
                                        $tagihan = \App\Models\Transaksi::where('id', $data->id)
                                            ->get()
                                            ->count();
                                    @endphp
                                    {{ 'Rp' . number_format($tagihan * 1100) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $providers->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
