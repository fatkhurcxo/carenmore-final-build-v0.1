@extends('homepage.layout.master-log')

@section('content')
    <!-- Register start -->
    <div class="login-page-main bg-white bg container shadow">
        <div class="container-login">
            <div class="row row-container">
                <div class="col-lg-6">
                    <!-- Title Start -->
                    <div class="row pr-3 pl-3 pt-3">
                        <div class="col">
                            <span class="back-login pr-1 pl-1">
                                <a href="{{ route('guest.home') }}"><i class="fa-solid fa-left-long"></i></a>
                            </span>
                        </div>
                        <div class="col d-sm-flex d-none" style="font-size: small;">
                            <span class="goto-register">Sudah punya akun?<span class="pl-2"><a
                                        href="{{ route('guest.login') }}">Masuk</a></span></span>
                        </div>
                    </div>
                    <!-- End Title -->
                    <div class="row p-5">
                        <div class="col">
                            <h2 style="font-weight: bolder;letter-spacing: 0.05em;">Daftar</h2>
                            <span style="font-size: small;">Mulai bisnis layanan anda untuk beralih ke
                                platform
                                online</span>
                            <!-- Start Form Register -->
                            <form action="{{ route('guest.CreateUser') }}" method="POST" class="pt-4">
                                @csrf
                                @unless (Session::has('regWithGoogle'))
                                    <div class="o-style-input mb-3">
                                        <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                            <i class="fa-solid fa-address-card" style="color: #a600ff;"></i>
                                        </label>
                                        <input id="input-field" class="o-input" type="text" name="nama_lengkap"
                                            placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1"
                                            autocomplete="off" required title="Nama lengkap harus terisi."
                                            value="{{ old('nama_lengkap') }}">
                                        <span class="valid-img">
                                            <!-- img valid here -->
                                        </span>
                                    </div>
                                    @error('nama_lengkap')
                                        <span>{{ $message }} </span>
                                    @enderror
                                    <div class="o-style-input mb-3">
                                        <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                            <i class="fa-solid fa-envelope" style="color: #a600ff;"></i>
                                        </label>
                                        <input id="input-field" name="email" type="email" class="o-input"
                                            placeholder="Email" aria-label="Email" aria-describedby="basic-addon1"
                                            autocomplete="off" required title="Email harus terisi.">
                                        <span class="valid-img">
                                            <!-- img valid here -->
                                        </span>
                                    </div>
                                    @error('email')
                                        <p class="text-danger" style="font-size: smaller; line-height: 110%;">Email telah
                                            terdaftar, mohon gunakan
                                            email lain atau masuk dengan menggunakan email terkait.</p>
                                    @enderror
                                @endunless
                                @if (Session::has('regWithGoogle'))
                                    <h6 class="text-warning">{{ session('regWithGoogle') }} </h6>
                                    <div class="google-email d-flex rounded mb-2">
                                        <div
                                            style="padding: 0px 15px; border-radius: 15px; background: rgb(240, 240, 240);">
                                            <img width="20px" height="20px"
                                                src="{{ asset('assets_hmpg/img/google.png') }}" alt="">
                                            <span style="font-size: smaller;"
                                                class="text-primary">{{ session('email') }}</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="nama_lengkap" value="{{ session('name') }}">
                                    <input type="hidden" name="email" value="{{ session('email') }}">
                                @endif
                                <div class="o-style-input">
                                    <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                        <i class="fa-solid fa-key" style="color: #a600ff;"></i>
                                    </label>
                                    <input id="input-field" name="password" type="password" class="o-input o-show-pass"
                                        placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                        required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Password harus terisi.">
                                    <span class="valid-pass">
                                        <!-- img valid here -->
                                    </span>
                                </div>
                                <div class="password-rule text-danger">
                                    <p style="line-height: 120%; font-size: small;"></p>
                                </div>
                                <div class="o-style-input mb-3">
                                    <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                        <img style="object-fit: contain;" src="{{ asset('assets_hmpg/img/key.png') }} "
                                            alt="">
                                    </label>
                                    <input id="input-field" name="password_confirmation" type="password"
                                        class="o-input o-show-pass" placeholder="Confirm Password"
                                        aria-label="Confirm Password" aria-describedby="basic-addon1" required
                                        title="Konfirmasi password harus terisi."
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    <span class="valid-pass">
                                        <!-- img valid here -->
                                    </span>
                                </div>
                                <div class="password-rule text-danger">
                                    <p style="line-height: 120%; font-size: small;"></p>
                                </div>
                                @error('usedEmail')
                                    <div class="usedEmail"">
                                        <p class="text-danger" style="line-height: 120%; font-size: small;font-weight: bold;">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-sm container btn-register"
                                            style="color: white; background-color: #984DFF;">Buat Akun</button>
                                    </div>
                                    @unless (Session::has('regWithGoogle'))
                                        <div class="pt-2 col-sm-1 text-center" style="font-size: small; color: #a600ff;">
                                            Atau</div>
                                        <div class="col-sm-6">
                                            <div class="row row-cols-2">
                                                <div class="col rounded-circle">
                                                    <a style="border: 0px; background-color: rgb(240, 240, 240);"
                                                        href="{{ route('guest.regWithGoogle') }}"
                                                        class="btn btn-sm container">Daftar
                                                        dengan<img class="pl-2" width="20px" height="20px"
                                                            src="{{ asset('assets_hmpg/img/google.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endunless
                                </div>
                            </form>
                            <!-- End Form Register -->
                            <div class="col d-sm-none d-block" style="font-size: small;">
                                <span class="goto-register">Sudah punya akun?<span class="pl-2"><a
                                            href="{{ route('guest.login') }}">Masuk</a></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none align-items-center d-lg-flex justify-content-center img-shape-login">
                    <!-- img from css -->
                    <h1 class="login-title">Carenmore</h1>
                    <div class="img-container">
                        <img src="{{ asset('assets_hmpg/img/disinfect.png') }} " alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register -->
@endsection
