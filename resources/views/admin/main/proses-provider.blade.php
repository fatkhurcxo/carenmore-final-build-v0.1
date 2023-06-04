@extends('admin.layout.master')
@section('content')
    <div class="profile-page tx-13">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">Provider Information</h6>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Nama Layanan</label>
                            <p class="text-muted"> {{ $detail->provider }} </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Pemilik Layanan</label>
                            <p class="text-muted"> {{ $detail->pemilik }} </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email</label>
                            <p class="text-muted"> {{ $detail->user->email }} </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Kontak</label>
                            <p class="text-muted"> {{ $detail->kontak }} </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Status</label>
                            <p class="text-muted">
                                @if ($detail->status === 'aktif')
                                    <span class="badge badge-success">
                                        status
                                    </span>
                                @elseif ($detail->status === 'nonaktif')
                                    <span class="badge badge-warning">
                                        status
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Diajukan pada</label>
                            <p class="text-muted"> {{ $detail->updated_at }} </p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;"
                                class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                <i data-feather="github" data-toggle="tooltip" title="github.com/nobleui"></i>
                            </a>
                            <a href="javascript:;"
                                class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                <i data-feather="twitter" data-toggle="tooltip" title="twitter.com/nobleui"></i>
                            </a>
                            <a href="javascript:;"
                                class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                <i data-feather="instagram" data-toggle="tooltip" title="instagram.com/nobleui"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                            </div>
                        @endif
                        <div class="card rounded">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        {{-- <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt=""> --}}
                                        <div class="ml-2">
                                            <h6>ADDRESS INFORMATION</h6>
                                            {{-- <p class="tx-11 text-muted">1 min ago</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row text-left">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat
                                        Lengkap</label>
                                    <div class="col-sm-9">
                                        <textarea name="deskripsi" class="form-control mb-4" id="" cols="30" rows="10"
                                            style="line-height: 1.5em;">{{ $detail->alamat->jalan . ', ' . $detail->alamat->desa . ', ' . $detail->alamat->kecamatan . ', ' . $detail->alamat->kabupaten . ', ' . $detail->alamat->provinsi . ', ' . $detail->alamat->kodepos }}</textarea>
                                    </div>
                                </div>
                                <div class="">
                                    <h6> {{ strtoupper('Dokumen Upload') }} </h6>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dokumen KTP<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9 border d-flex justify-content-center">
                                        <img class="img-fluid" style="object-fit: contain;"
                                            src="{{ url('ktp/' . $ktp->fileNameKTP) }}" alt="" height="250">
                                    </div>
                                    <div class="col col-3">

                                    </div>
                                    <div class="col col-9 mt-3 p-0">
                                        <a href="{{ route('admin.download.ktp', ['ktp' => $ktp->fileNameKTP]) }}"><span
                                                class="badge badge-primary">Download File</span></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dokumen Selfie<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9 border d-flex justify-content-center">
                                        <img class="img-fluid" style="object-fit: contain;"
                                            src="{{ url('ktp/' . $ktp->fileNameSelfie) }}" alt="" height="250">
                                    </div>
                                    <div class="col col-3">

                                    </div>
                                    <div class="col col-9 mt-3 p-0">
                                        <a href="{{ route('admin.download.ktp', ['ktp' => $ktp->fileNameSelfie]) }}"><span
                                                class="badge badge-primary">Download File</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3 right-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <h6 class="card-title">Proses Pengajuan</h6>
                                <form action="{{ route('admin.post.verifiy', ['detail' => $detail->id]) }}"
                                    method="POST">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="proses-status w-100" name="status">
                                                <option value="aktif" @selected($detail->status == 'aktif')>Aktif</option>
                                                <option value="nonaktif" @selected($detail->status == 'nonaktif')>Nonaktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Provider Email</label>
                                            <input id="email" class="form-control" name="email" type="email"
                                                value="{{ $detail->user->email }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Opsional Message</label>
                                            <textarea name="optionalMessage" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                            @error('optionalMessage')
                                                <p class="text-danger mt-2"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary container pt-2 pb-2" type="submit">
                                            Verify
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <p>
                                    <span class="text-danger">Note </span>: Pastikan anda mengisi Optional Message atau
                                    pesan tambahan kepada pemohon jika terdapat ketidaksesuaian data.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <h6 class="card-title">suggestions for you</h6>
                                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>
                                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>
                                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>
                                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>
                                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center hover-pointer">
                                        <img class="img-xs rounded-circle"
                                            src="{{ url('https://via.placeholder.com/37x37') }}" alt="">
                                        <div class="ml-2">
                                            <p>Mike Popescu</p>
                                            <p class="tx-11 text-muted">12 Mutual Friends</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                            title="Connect"></i></button>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- right wrapper end -->
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush
