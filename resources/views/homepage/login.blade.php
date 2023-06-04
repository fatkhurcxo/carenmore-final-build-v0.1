@extends('homepage.layout.master-log')

@section('content')
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
                            <span class="goto-register">Belum punya akun?<span class="pl-2"><a
                                        href="{{ route('guest.register') }}">Daftar</a></span></span>
                        </div>
                    </div>
                    <!-- End Title -->
                    <div class="row p-5">
                        <div class="col">
                            <h2 style="font-weight: bolder;letter-spacing: 0.05em;">Masuk</h2>
                            <span style="font-size: small;">Mulai bisnis layanan anda untuk beralih ke
                                platform
                                online</span>
                            <!-- Start Form Register -->
                            <form action="{{ route('guest.authLogin') }}" method="POST" class="pt-4">
                                @csrf
                                <div class="o-style-input mb-3">
                                    <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                        <i class="fa-solid fa-envelope" style="color: #a600ff;"></i>
                                    </label>
                                    <input id="input-field" name="email" type="email" class="o-input"
                                        placeholder="Email" aria-label="Email" aria-describedby="basic-addon1"
                                        autocomplete="off" required title="Email harus terisi."
                                        @if (Session::has('email')) value="{{ session('email') }}" @endif>
                                    <span class="valid-img">
                                        <!-- img valid here -->
                                    </span>
                                </div>
                                <div class="o-style-input">
                                    <label class="o-label mr-2 mr-sm-0" id="basic-addon1">
                                        <i class="fa-solid fa-key" style="color: #a600ff;"></i>
                                    </label>
                                    <input id="input-field" name="password" type="password"
                                        class="o-input o-show-pass o-log-passfield" placeholder="Password"
                                        aria-label="Password" aria-describedby="basic-addon1" required
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password harus terisi."
                                        @if (Session::has('password')) value="{{ session('password') }}" @endif>
                                    <span class="valid-pass">
                                        <!-- img valid here -->
                                    </span>
                                </div>
                                @error('loginGagal')
                                    <div class="gagal-login"">
                                        <p class="text-danger" style="line-height: 120%; font-size: small;">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                                <div class="password-rule-login text-danger">
                                    <p style="line-height: 120%; font-size: small;"></p>
                                </div>
                                <div class="form-group row row-cols-2">
                                    <div class="col remember-me">
                                        <input type="checkbox" name="remember_me" id="remember_me" value="">
                                        <label style="font-size: smaller;" for="remember_me">Ingat saya?</label>
                                    </div>
                                    <div class="col text-right lupa-password">
                                        <a style="font-size: smaller;" href="">Lupa password</a>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-sm container"
                                            style="color: white; background-color: #984DFF;">Masuk</button>
                                    </div>
                                    <div class="pt-2 col-sm-1 text-center" style="font-size: small; color: #a600ff;">
                                        Atau</div>
                                    <div class="col-sm-6">
                                        <div class="row row-cols-2">
                                            <div class="col rounded-circle">
                                                <a style="border: 0px; background-color: rgb(240, 240, 240);"
                                                    href="{{ route('guest.logWithGoogle') }}"
                                                    class="btn btn-sm container">Masuk
                                                    dengan<img class="pl-2" width="20px" height="20px"
                                                        src="{{ asset('assets_hmpg/img/google.png') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form Register -->
                            <div class="col d-sm-none d-block" style="font-size: small;">
                                <span class="goto-register">Sudah punya akun?<span class="pl-2"><a
                                            href="#">Masuk</a></span></span>
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
@endsection
