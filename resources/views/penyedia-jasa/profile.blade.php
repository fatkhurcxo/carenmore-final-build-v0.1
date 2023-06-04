@extends('penyedia-jasa.layout.master')
@section('content')
    @include('penyedia-jasa.layout.emptyprovider')
    @providerstatus('aktif')
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover">
                            <div class="gray-shade"></div>
                            <figure>
                                <img src="{{ asset('assets/images/carenmore.jpg') }}" class="img-fluid" alt="profile cover">
                            </figure>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    <img class="profile-pic" src="{{ asset('assets/images/Ojak Logo.png') }}" alt="profile"
                                        width="100" height="100">
                                    <span class="profile-name"> {{ $provider->provider ?? '' }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="header-links">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">Provider Information</h6>
                                {{-- <div class="dropdown">
                                <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            data-feather="edit-2" class="icon-sm mr-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            data-feather="git-branch" class="icon-sm mr-2"></i> <span
                                            class="">Update</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye"
                                            class="icon-sm mr-2"></i> <span class="">View all</span></a>
                                </div>
                            </div> --}}
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Nama Layanan</label>
                                <p class="text-muted"> {{ $provider->provider ?? '' }} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Pemilik Layanan</label>
                                <p class="text-muted"> {{ $provider->pemilik ?? '' }} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email</label>
                                <p class="text-muted"> {{ $provider->user->email ?? '' }} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Kontak</label>
                                <p class="text-muted"> {{ $provider->kontak ?? '' }} </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Status</label>
                                <p class="text-muted">
                                    @if ($provider->status ?? '' == 'aktif')
                                        <span class="badge badge-success">
                                            {{ $provider->status ?? '' }}
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            {{ $provider->status ?? '' }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Bergabung pada</label>
                                <p class="text-muted"> {{ $provider->created_at ?? '' }} </p>
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
                                                <h5>Ubah Informasi Layanan</h5>
                                                {{-- <p class="tx-11 text-muted">1 min ago</p> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="dropdown">
                                        <button class="btn p-0" type="button" id="dropdownMenuButton2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    data-feather="meh" class="icon-sm mr-2"></i> <span
                                                    class="">Unfollow</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    data-feather="corner-right-up" class="icon-sm mr-2"></i> <span
                                                    class="">Go to post</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    data-feather="share-2" class="icon-sm mr-2"></i> <span
                                                    class="">Share</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    data-feather="copy" class="icon-sm mr-2"></i> <span
                                                    class="">Copy link</span></a>
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('provider.post.profile') }}" method="POST"
                                        id="formUpdateProfile">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                                    Layanan <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="nama_layanan" type="text" class="form-control"
                                                        id="exampleInputUsername2" value="{{ $provider->provider ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Pemilik
                                                    Layanan <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="pemilik_layanan" type="text" class="form-control"
                                                        id="exampleInputEmail2" autocomplete="off"
                                                        value="{{ $provider->pemilik ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kontak <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kontak" type="text" class="form-control"
                                                        id="exampleInputMobile" value="{{ $provider->kontak ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputPassword2"
                                                    class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea name="deskripsi" class="form-control mb-4" id="" cols="30" rows="10">{{ $provider->deskripsi ?? '' }}
                                                </textarea>
                                                    <button type="submit"
                                                        class="btn float-right btn-primary mr-2">Submit</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                {{-- <div class="card-body">
                                <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus
                                    minima delectus nemo unde quae recusandae assumenda.</p>
                                <img class="img-fluid" src="{{ url('https://via.placeholder.com/513x432') }}"
                                    alt="">
                            </div> --}}
                                <div class="card-footer">
                                    {{-- <div class="d-flex post-actions">
                                    <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                        <i class="icon-md" data-feather="heart"></i>
                                        <p class="d-none d-md-block ml-2">Like</p>
                                    </a>
                                    <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                        <i class="icon-md" data-feather="message-square"></i>
                                        <p class="d-none d-md-block ml-2">Comment</p>
                                    </a>
                                    <a href="javascript:;" class="d-flex align-items-center text-muted">
                                        <i class="icon-md" data-feather="share"></i>
                                        <p class="d-none d-md-block ml-2">Share</p>
                                    </a>
                                </div> --}}
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
                                    <h6 class="card-title">Ubah Password</h6>
                                    <form action="{{ route('provider.post.password') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="exampleInputUsername2">New
                                                    Password <span class="text-danger">*</span></label>
                                                <div class="">
                                                    <input name="new_password" type="password" class="form-control"
                                                        id="exampleInputUsername2">
                                                </div>
                                                @error('new_password')
                                                    <p class="text-danger mt-2"> {{ $message }} </p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername2">Confirm New
                                                    Password <span class="text-danger">*</span></label>
                                                <div class="">
                                                    <input name="new_password_confirmation" type="password"
                                                        class="form-control" id="exampleInputUsername2">
                                                </div>
                                                @error('new_password_confirmation')
                                                    <p class="text-danger mt-2"> {{ $message }} </p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername2">Your Current
                                                    Password <span class="text-danger">*</span></label>
                                                <div class="">
                                                    <input name="current_password" type="password" class="form-control"
                                                        id="exampleInputUsername2">
                                                </div>
                                                @error('current_password')
                                                    <p class="text-danger mt-2">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary container pt-2 pb-2" type="submit">
                                                Change Password
                                            </button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <p>
                                        <span class="text-danger">Note </span>: Kami menyarankan untuk mengubah
                                        password anda setiap 1 - 3 bulan sekali demi keamanan akun.
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
    @endproviderstatus
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush
