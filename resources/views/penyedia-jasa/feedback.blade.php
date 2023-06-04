@extends('penyedia-jasa.layout.master')
@section('content')
    @include('penyedia-jasa.layout.emptyprovider')
    @providerstatus('nonaktif')
        <div class="alert alert-warning text-center" role="alert">
            Your data is being verified
        </div>
    @elseproviderstatus('aktif')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Feedback</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Nama Layanan</th>
                                <th>Detail</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pelanggan-container d-flex">
                                        <div class="profile rounded-circle">
                                            <img class="img-fluid" src="{{ asset('assets/images/favicon.png') }}" alt=""
                                                width="30px" height="30px">
                                        </div>
                                        <div class="nama-pelanggan ml-2 d-flex align-items-center">
                                            <p>Fatkhur Rozak <span class="text-secondary" style="font-size: smaller;">9 May
                                                    2023, 08:00:45</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Paket Cuci Motor Kilat
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info">Detail Feedback</button>
                                </td>
                                <td>
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" style="padding:4px 8px;">
                                            <i data-feather="more-horizontal" style="height: 13px;"></i>
                                        </button>
                                        <div class="dropdown-menu pt-2 pb-2"
                                            style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; font-size: large;">
                                            <!-- Dropdown menu links -->
                                            <a href="" class="dropdown-item">Balas</a>
                                            <a href="" class="dropdown-item">Lihat informasi transaksi</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endproviderstatus
@endsection
