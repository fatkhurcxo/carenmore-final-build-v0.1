@extends('penyedia-jasa.layout.master')

@section('content')
    <style>
        .income-info {
            transition: all 0.5s ease 0s;
        }

        .income-info:hover {}
    </style>
    @include('penyedia-jasa.layout.emptyprovider')
    @providerstatus('nonaktif')
        <div class="alert alert-warning text-center" role="alert">
            Your data is being verified
        </div>
    @elseproviderstatus('aktif')
        <div class="row row-cols-3">
            <div class="col">
                <div class="card income-info" style="background-color: #c0ecd4;">
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <div class="col">
                                <h5 class="card-title">Total Balance</h5>
                            </div>
                            <div class="col text-right">
                                <a href="" class="btn btn-success" style="font-size: smaller;">Tarik Saldo</a>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">Total pendapatan saat ini</h6>
                        <!--<h3>Rp680.000</h3>-->
                        <p>
                            <span class="badge badge-warning">
                                balance feature will be available soon
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card income-info" style="background-color: #d8f4f4;">
                    <div class="card-body">
                        <h5 class="card-title">Total Income</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total pendapatan keseluruhan</h6>
                        <p>
                        <h3>
                            Rp{{ number_format($income) }}
                        </h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card income-info" style="background-color: #ffecbc;">
                    <div class="card-body">
                        <h5 class="card-title">total withdrawal</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total saldo yang telah ditarik</h6>
                        <p>
                            <span class="badge badge-warning">
                                withdrawal feature will be available soon
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- END CARD --}}
        {{-- TABLE --}}
        <div class="row mt-4">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">withdrawal history</h6>
                        <p class="card-description">Detail informasi penarikan terhadap saldo yang tersedia.</p>
                        <div class="table-responsive pt-1">
                            <!--WITHDRAWAL HISTORY-->
                            <!--<table class="table table-bordered">-->
                            <!--    <thead>-->
                            <!--        <tr>-->
                            <!--            <th>-->
                            <!--                No.-->
                            <!--            </th>-->
                            <!--            <th>-->
                            <!--                No. Referensi-->
                            <!--            </th>-->
                            <!--            <th>-->
                            <!--                Rekening Tujuan-->
                            <!--            </th>-->
                            <!--            <th>-->
                            <!--                Atas Nama-->
                            <!--            </th>-->
                            <!--            <th>-->
                            <!--                Jumlah Dana-->
                            <!--            </th>-->
                            <!--            <th>-->
                            <!--                Dibuat-->
                            <!--            </th>-->
                            <!--        </tr>-->
                            <!--    </thead>-->
                            <!--    <tbody>-->
                            <!--        <style>-->
                            <!--            .hover-on-row:hover {-->
                            <!--                cursor: pointer;-->
                            <!--                background-color: rgb(243, 243, 243);-->
                            <!--            }-->
                            <!--        </style>-->
                            <!--        <tr class="hover-on-row">-->
                            <!--            <td>-->
                            <!--                1-->
                            <!--            </td>-->
                            <!--            <td>-->
                            <!--                WDCR009877-->
                            <!--            </td>-->
                            <!--            <td>-->
                            <!--                <span class="text-info">0057889688748</span>-->
                            <!--            </td>-->
                            <!--            <td>-->
                            <!--                AGUNG HAPSA-->
                            <!--            </td>-->
                            <!--            <td>-->
                            <!--                Rp150.000,00-->
                            <!--            </td>-->
                            <!--            <td>-->
                            <!--                4 Mei 2023, 07:43:54-->
                            <!--            </td>-->
                            <!--        </tr>-->
                            <!--    </tbody>-->
                            <!--</table>-->
                            <div class="alert alert-warning" role=="alert">
                                Withdrawal history will be available immediately
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endproviderstatus
@endsection
