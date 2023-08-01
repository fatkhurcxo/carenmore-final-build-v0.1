<!-- Main header -->
<header class="header">
    <!-- Start Header Navbar-->
    <div class="main-header">
        <div class="main-menu-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-6">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('assets_hmpg/img/carenmore.png') }} " data-rjs="2" alt="jironis">
                            </a>
                        </div>
                        <!-- End of Logo -->
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-4 col-6 menu-button">
                        <div class="menu--inner-area clearfix">
                            <div class="menu-wraper">
                                <nav>
                                    <!-- Header-menu -->
                                    <div class="header-menu dosis">
                                        <ul>
                                            <li class="active"><a href="#">Beranda</a>
                                                <ul>
                                                    {{-- <li class="active"><a href="index.html">Home 1</a></li> --}}
                                                    {{-- <li><a href="index2.html">Home 2</a></li> --}}
                                                </ul>
                                            </li>
                                            <!-- <li><a href="#features">Fitur</a></li> -->
                                            <li><a href="#features">Layanan</a></li>
                                            <!-- <li><a href="#app">App Screens</a></li> -->
                                            <li><a href="#pricing  ">Biaya</a></li>
                                            {{-- <li><a href="#">Docs</a>
                                                <ul>
                                                    <li><a href="blog.html">Blog Posts</a></li>
                                                    <li><a href="blog-details.html">single Post</a></li>
                                                </ul>
                                            </li> --}}
                                            <li>
                                                <a href="{{ route('guest.login') }}">Kerja Sama</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End of Header-menu -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5 d-md-block d-none">
                        <div class="urgent-call text-right">
                            <a href="#" class="btn">Get Carenmore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Navbar-->
</header>
<!-- End of Main header -->
