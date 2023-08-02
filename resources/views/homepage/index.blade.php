@extends('homepage.layout.master')

@section('content')
    <!-- home banner area -->
    <div class="banner-area-inner">
        <div class="banner-inner-area banner-area1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <!-- banner text -->
                        <div class="banner-text-inner">
                            <div class="banner-shape-wrap">
                                <div class="banner-shape-inner">
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps1.png') }} " alt=""
                                        class='shape shape1 rotate3d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps2.png') }} " alt=""
                                        class='shape shape2 rotate2d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps3.png') }} " alt=""
                                        class='shape shape3 rotate-2d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps4.png') }} " alt=""
                                        class='shape shape4 rotate3d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps5.png') }} " alt=""
                                        class='shape shape5 rotate2d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps6.png') }} " alt=""
                                        class='shape shape6 rotate-2d'>
                                    <img src="{{ asset('assets_hmpg/img/banner/shaps7.png') }} " alt=""
                                        class='shape shape7 rotate3d'>
                                </div>
                            </div>

                            <h1>App for your cleaning service business</h1>
                            <p>Carenmore merupakan aplikasi mobile yang dibangun untuk memberikan kemudahan penyaluran
                                jasa bagi para
                                pemilik usaha layanan kebersihan kendaraan kepada client.</p>
                            <a href="{{ route('download.apk') }}" class="btn">Download Sekarang</a>
                            <a href="#more" class="btn">Selengkapnya</a>
                        </div>
                        <!-- banner text -->
                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-4 offse-xl-2">
                        <!-- banner image-->
                        <div class="banner-image">
                            {{-- use figma mockup --}}
                            <img id="img-mock rounded" src="{{ asset('assets_hmpg/img/mockup/new-mockup.png') }} "
                                alt="">
                        </div>
                        <!--End of banner image-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of home banner area -->

    <!-- feature area -->
    <section class="pb-110" id='features'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <h2>Layanan Aplikasi</h2>
                        <p>Layanan yang menjadi prioritas pada aplikasi mobile Carenmore.</p>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="feature-carousel owl-carousel">
                        <!-- single feature inner -->
                        <div class="single-feature-inner text-center">
                            <div class="feature-icon"><img src="{{ asset('assets_hmpg/img/icons/electric.png') }} "
                                    class="svg" alt=""></div>
                            <h5>Cuci Motor<br> Paket Kilat</h5>
                            <p>Layanan kebersihan motor dengan cepat namun tetap mengutamakan kebersihan.</p>
                        </div>
                        <!-- End of single feature inner -->

                        <!-- single feature inner -->
                        <div class="single-feature-inner text-center">
                            <div class="feature-icon"><img src="{{ asset('assets_hmpg/img/icons/motorcycle.png') }} "
                                    class="svg" alt="">
                            </div>
                            <h5>Cuci Motor Deepclean</h5>
                            <p>Layanan kebersihan motor dengan detail kebersihan lebih mendalam sehingga motor tampak
                                seperti baru.</p>
                        </div>
                        <!-- End of single feature inner -->

                        <!-- single feature inner -->
                        <div class="single-feature-inner text-center">
                            <div class="feature-icon"><img src="{{ asset('assets_hmpg/img/icons/electric-car.png') }} "
                                    class="svg" alt="">
                            </div>
                            <h5>Cuci Mobil<br>Paket Kilat</h5>
                            <p>Layanan kebersihan mobil dengan cepat namun tetap mengutamakan kebersihan.</p>
                        </div><!-- End of single feature inner -->

                        <!-- single feature inner -->
                        <div class="single-feature-inner text-center">
                            <div class="feature-icon"><img src="{{ asset('assets_hmpg/img/icons/car-service.png') }} "
                                    class="svg" alt="">
                            </div>
                            <h5>Cuci Mobil Deepclean</h5>
                            <p>Layanan kebersihan mobil dengan detail kebersihan lebih mendalam sehingga mobil tampak
                                seperti baru.</p>
                        </div>
                        <!-- End of single feature inner -->

                    </div>
                    <!--/.feature-carousel-->
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section><!-- End of feature area -->

    <!-- Counter up area -->
    <!--<section class="border-top pt-120 pb-80">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                 single counetr -->
    <!--                <div class="single-counter text-center">-->
    <!--                    <span class="counter">4789</span>-->
    <!--                    <p>Downloads</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                 single counetr -->
    <!--                <div class="single-counter text-center">-->
    <!--                    <span class="counter">6389</span>-->
    <!--                    <p>Liks</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                 single counetr -->
    <!--                <div class="single-counter text-center">-->
    <!--                    <span class="counter">900</span>-->
    <!--                    <p>5 Star Reating</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                 single counetr -->
    <!--                <div class="single-counter text-center">-->
    <!--                    <span class="counter">489</span>-->
    <!--                    <p>Cleaning Service Provider</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- single counetr -->
    <!-- single counetr -->
    <!-- single counetr -->
    <!-- single counetr -->
    <!-- /.col -->
    <!-- /.row -->
    <!-- /.container -->
    <!-- /.End of Counter up area -->

    <!-- interact user -->
    <section class="bg-2 pt-120 pb-120" id="more">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-7">
                    <!-- user interact image -->
                    <div class="user-interact-image">
                        <img src="{{ asset('assets_hmpg/img/icons/36216.jpg') }} "
                            style="aspect-ratio: 4/3; object-fit: fill;" alt="">
                    </div>
                    <!-- End of user interact image -->
                </div>
                <div class="col-lg-5 col-sm-5">
                    <!-- user ineract text -->
                    <div class="user-interact-inner">
                        <div class="interact-icon">
                            <img src="{{ asset('assets_hmpg/img/icons/teamwork.svg') }} " class="svg" alt="">
                        </div>
                        <h2>Rawat Kebersihan Motormu Tanpa Ribet</h2>
                        <p>
                            Bersihkan kendaraan bermotormu tanpa perlu ribet dan buang waktu. Carenmore ada untuk kalian
                            yang malas atau sibuk dengan kerjaan, tapi kendaraan harus terlihat bersih.
                        </p>
                        <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                    </div>
                    <!--End of user ineract text -->
                </div>
            </div>
        </div>
    </section>
    <!-- interact user -->

    <!-- interact user -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-5">
                    <!-- user ineract text -->
                    <div class="user-interact-inner">
                        <div class="interact-icon">
                            <img src="{{ asset('assets_hmpg/img/icons/solution1.svg') }} " class="svg"
                                alt="">
                        </div>
                        <h2>Rawat Kebersihan Mobil Dengan Praktis</h2>
                        <p>
                            Bersihkan kendaraan bermotormu tanpa perlu ribet dan buang waktu. Carenmore ada untuk kalian
                            yang malas atau sibuk
                            dengan kerjaan, tapi kendaraan harus terlihat bersih.
                        </p>
                        <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                    </div>
                    <!--End of user ineract text -->
                </div>
                <div class="col-lg-7 col-sm-7">
                    <!-- user interact image -->
                    <div class="user-interact-image type2">
                        <img src="{{ asset('assets_hmpg/img/icons/16688328_5750644.jpg') }} " alt="">
                    </div>
                    <!-- End of user interact image -->
                </div>
            </div>
        </div>
    </section>
    <!-- interact user -->

    <!-- app video -->
    <!--<section class="app-video">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12">-->
    <!--                <div class="theme-video-wrap">-->
    <!--                    <a href="https://www.youtube.com/watch?v=SZEflIVnhH8" class="video-btn" data-popup="video"><i-->
    <!--                            class="fa fa-play"></i></a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end of why bottle video -->
    <!-- why bottle video -->
    <!-- End of why bottol water -->

    <!-- app screen -->
    <section class="pt-120 pb-3" id='app'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <h2>Carenmore App Screens</h2>
                        <p>Tampilan mobile apps Carenmore yang disesuaikan dengan kebutuhan pengguna.</p>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
        </div>
        <div class="app-scrin-inner" style="padding-bottom: 50px;;">
            <div class="app-carousel-inner">
                <div class="app-carousel owl-carousel">
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/home-mock.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/banner/iPhone 14 Pro Max - 1.png') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/login-mock.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/register-mock.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/list-layanan-mock.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/detail-and-channel.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/detail-pesanan.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/link-to-tripay.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/after-payment.jpg') }} "
                            data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img class="img-screen" src="{{ asset('assets_hmpg/img/mockup/end-mock.jpg') }} " data-rjs="2"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of app screen -->

    <!-- app pricing plan -->
    <section class="pb-90 mt-3" id='pricing'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <h2>Biaya & Berlangganan</h2>
                        <p>Pilih layanan berlangganan dengan kami. Layanan kebersihan yang terjadwal dari kami sehingga
                            tidak perlu repot kapan harus membersihkan kendaraan anda.</p>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="price-nav-wrap">
                        <!-- price nav -->
                        <div class="price--nav-inner">
                            <nav>
                                <div class="nav info-tabs">
                                    <a class="price--nav-item active" id="nav-contact-tab" data-toggle="tab"
                                        href="#month">Monthly</a>
                                    <a class="price--nav-item" data-toggle="tab" href="#year">Weekly</a>
                                </div>
                            </nav>
                        </div>
                        <!-- End of price nav -->
                    </div>
                    <!-- nav tab content -->
                    <div class="tab-content price-content">
                        <div class="tab-pane fade active show" id="month" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket Standard</h4>
                                            <span>Rp75.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        5 kali cuci /bulan
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free 1x Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="#{{ route('download.apk') }}" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan active text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket Mid-Level</h4>
                                            <span>Rp99.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        5x cuci /bulan
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free 3x Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket End-Level</h4>
                                            <span>Rp125.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        5x cuci /bulan
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Full Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="year" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket Standard</h4>
                                            <span>Rp42.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        2 kali cuci /minggu
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free 1x Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan active text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket Mid-Level</h4>
                                            <span>Rp64.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        2x cuci /bulan
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Full Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <!--Single price plan -->
                                    <div class="single-price-plan text-center">
                                        <div class="single-price-top">
                                            <h4>Cuci Motor Paket End-Level</h4>
                                            <span>Rp78.000</span>
                                        </div>
                                        <div class="single-price-body">
                                            <div class="price-list">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        3x cuci /bulan
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Dijadwalkan oleh Carenmore
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free 2x Deepclean
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Free custom jadwal cuci
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        Voucher Carenmore 1x
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('download.apk') }}" class="btn">Get Started</a>
                                        </div>
                                    </div>
                                    <!--end of Single price plan -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of nav tab content -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of app pricing plan -->

    <!-- testimonial area -->
    <!-- <section class="pt-120 pb-110 bg-2">
                                                                                                                                                                <div class="container">
                                                                                                                                                                    <div class="row justify-content-center">
                                                                                                                                                                        <div class="col-md-8">
                                                                                                                                                                            <div class="testimonial-author-arousel text-center">
                                                                                                                                                                                <div class="testimonial-author-inner">
                                                                                                                                                                                    <div class="author-carousel owl-carousel">
                                                                                                                                                                                        <div class="single-author-imge">
                                                                                                                                                                                            <img src="assets/img/feature/author3.png" alt="">
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="single-author-imge">
                                                                                                                                                                                            <img src="assets/img/feature/author2.png" alt="">
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="single-author-imge">
                                                                                                                                                                                            <img src="assets/img/feature/author1.png" alt="">
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>

                                                                                                                                                                            <div class="testimonial-author-comment text-center">
                                                                                                                                                                                <div class="author-comment-carousel owl-carousel">
                                                                                                                                                                                    <div class="single-author-comment">
                                                                                                                                                                                        <h4>This is due to their excellent service, competitive<br> pricing and customer
                                                                                                                                                                                            support. It’s throughly<br> refresing to get such
                                                                                                                                                                                            a personal touch.</h4>
                                                                                                                                                                                        <p>Shirley Smith</p>
                                                                                                                                                                                    </div>

                                                                                                                                                                                    <div class="single-author-comment">
                                                                                                                                                                                        <h4>This is due to their excellent service, competitive<br> pricing and customer
                                                                                                                                                                                            support. It’s throughly<br> refresing to get such
                                                                                                                                                                                            a personal touch.</h4>
                                                                                                                                                                                        <p>Shirley Smith</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="single-author-comment">
                                                                                                                                                                                        <h4>This is due to their excellent service, competitive<br> pricing and customer
                                                                                                                                                                                            support. It’s throughly<br> refresing to get such
                                                                                                                                                                                            a personal touch.</h4>
                                                                                                                                                                                        <p>Shirley Smith</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </section> -->
    <!--End of testimonial area -->

    <!-- our partner -->
    <!-- <section class="pt-120 pb-120">
                                                                                                                                                                <div class="container">
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col">
                                                                                                                                                                            partner carosel inner
                                                                                                                                                                            <div class="partner-carousel-wrap">
                                                                                                                                                                                <div class="partner-carousel owl-carousel">
                                                                                                                                                                                    single partner
                                                                                                                                                                                    <div class="single-partner">
                                                                                                                                                                                        <img src="assets/img/partner2.png" alt="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                    End of single partner

                                                                                                                                                                                    single partner
                                                                                                                                                                                    <div class="single-partner">
                                                                                                                                                                                        <img src="assets/img/partner2.png" alt="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                    End of single partner

                                                                                                                                                                                    single partner
                                                                                                                                                                                    <div class="single-partner">
                                                                                                                                                                                        <img src="assets/img/partner2.png" alt="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                    End of single partner

                                                                                                                                                                                    single partner
                                                                                                                                                                                    <div class="single-partner">
                                                                                                                                                                                        <img src="assets/img/partner2.png" alt="">
                                                                                                                                                                                    </div>
                                                                                                                                                                                    End of single partner
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            End of  partner carosel inner
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </section> -->
    <!-- End of our partner -->

    <!-- start blog area -->
    <!-- <section class="border-top pt-115 pb-80" id='blog'>
                                                                                                                                                                <div class="container">
                                                                                                                                                                    <div class="row justify-content-center">
                                                                                                                                                                        <div class="col-lg-8 col-md-12">
                                                                                                                                                                            section title
                                                                                                                                                                            <div class="section-title text-center">
                                                                                                                                                                                <h2>Our News & Articles</h2>
                                                                                                                                                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit
                                                                                                                                                                                    lorem ipsum anim id est laborum perspiciatis unde.</p>
                                                                                                                                                                            </div>
                                                                                                                                                                            End of section title
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-lg-4 col-md-4">
                                                                                                                                                                            single blog inner
                                                                                                                                                                            <div class="single-blog-inner">
                                                                                                                                                                                blog image
                                                                                                                                                                                <div class="post-image">
                                                                                                                                                                                    <a href="blog-details.html">
                                                                                                                                                                                        <img src="assets/img/blog/blog1.png" alt="">
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <div class="post-date">
                                                                                                                                                                                        <p><span>30</span>Sep</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                /.End of  blog image

                                                                                                                                                                                post content
                                                                                                                                                                                <div class="post-content">
                                                                                                                                                                                    <div class="post-details">
                                                                                                                                                                                        <div class="post-info d-flex">
                                                                                                                                                                                            <a href="#"><span>By</span>Admin</a>
                                                                                                                                                                                            <a href="#"><span>1</span> Comment</a>
                                                                                                                                                                                        </div>

                                                                                                                                                                                        <div class="post-title">
                                                                                                                                                                                            <h3><a href="blog-details.html">Pre and Post Launch Mobile App Marketing Pitfalls to
                                                                                                                                                                                                    Avoid</a></h3>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <p>There are many variations of passages of available but majority have alteration in
                                                                                                                                                                                            some by inject humour or random
                                                                                                                                                                                            words.</p>
                                                                                                                                                                                        <a class='blog-btn' href="blog-details.html">Read More</a>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>/.End of post content
                                                                                                                                                                            </div>/.End of single blog inner
                                                                                                                                                                        </div>

                                                                                                                                                                        <div class="col-lg-4 col-md-4">
                                                                                                                                                                            single blog inner
                                                                                                                                                                            <div class="single-blog-inner">
                                                                                                                                                                                blog image
                                                                                                                                                                                <div class="post-image">
                                                                                                                                                                                    <a href="blog-details.html">
                                                                                                                                                                                        <img src="assets/img/blog/blog2.png" alt="">
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <div class="post-date">
                                                                                                                                                                                        <p><span>11</span>Sep</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                /.End of  blog image

                                                                                                                                                                                post content
                                                                                                                                                                                <div class="post-content">
                                                                                                                                                                                    <div class="post-details">
                                                                                                                                                                                        <div class="post-info d-flex">
                                                                                                                                                                                            <a href="#"><span>By</span>Admin</a>
                                                                                                                                                                                            <a href="#"><span>2</span> Comments</a>
                                                                                                                                                                                        </div>

                                                                                                                                                                                        <div class="post-title">
                                                                                                                                                                                            <h3><a href="blog-details.html">Nascetur Etiam tempus sit amet vestibulum quis
                                                                                                                                                                                                    variations.</a></h3>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <p>There are many variations of passages of available but majority have alteration in
                                                                                                                                                                                            some by inject
                                                                                                                                                                                            humour or random
                                                                                                                                                                                            words.</p>
                                                                                                                                                                                        <a class='blog-btn' href="blog-details.html">Read More</a>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>/.End of post content
                                                                                                                                                                            </div>/.End of single blog inner
                                                                                                                                                                        </div>

                                                                                                                                                                        <div class="col-lg-4 col-md-4">
                                                                                                                                                                            single blog inner
                                                                                                                                                                            <div class="single-blog-inner">
                                                                                                                                                                                blog image
                                                                                                                                                                                <div class="post-image">
                                                                                                                                                                                    <a href="blog-details.html">
                                                                                                                                                                                        <img src="assets/img/blog/blog3.png" alt="">
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <div class="post-date">
                                                                                                                                                                                        <p><span>20</span>Nov</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                /.End of  blog image

                                                                                                                                                                                post content
                                                                                                                                                                                <div class="post-content">
                                                                                                                                                                                    <div class="post-details">
                                                                                                                                                                                        <div class="post-info d-flex">
                                                                                                                                                                                            <a href="#"><span>By</span>Admin</a>
                                                                                                                                                                                            <a href="#"><span>5</span> Comments</a>
                                                                                                                                                                                        </div>

                                                                                                                                                                                        <div class="post-title">
                                                                                                                                                                                            <h3><a href="blog-details.html">It is a long established fact that and reader will
                                                                                                                                                                                                    be distracted.</a></h3>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <p>There are many variations of passages of available but majority have alteration in
                                                                                                                                                                                            some by inject
                                                                                                                                                                                            humour or random
                                                                                                                                                                                            words.</p>
                                                                                                                                                                                        <a class='blog-btn' href="blog-details.html">Read More</a>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>/.End of post content
                                                                                                                                                                            </div>/.End of single blog inner
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </section> -->
    <!-- end of blog artea -->

    <!-- download app -->
    <section class="border-top pt-110 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="download-app-inner text-center">
                        <h2 class="h1">
                            Download our App Today &<br>
                            Clean Movement Enjoy Faster.
                        </h2>
                        <h3></h3>
                        <a href="{{ route('download.apk') }}" class="btn">Download App</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of download a{t('') }} pp -->
@endsection
