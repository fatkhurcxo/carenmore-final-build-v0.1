<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Document Title -->
    <title>Carenmore</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon_hmpg.png') }}">

    <!-- CSS Files -->
    <!--==== Google Fonts ====-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!--==== Bootstrap css file ====-->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/css/bootstrap.min.css') }} ">

    <!--==== Font-Awesome css file ====-->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/css/font-awesome.min.css') }} ">

    <!-- Owl Carusel css file -->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/plugins/owl-carousel/owl.carousel.min.css') }} ">

    <!-- ====video poppu css==== -->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/plugins/Magnific-Popup/magnific-popup.css') }} ">

    <!--==== Style css file ====-->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/css/style.css') }} ">

    <!--==== Responsive css file ====-->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/css/responsive.css') }} ">

    <!--==== Custom css file ====-->
    <link rel="stylesheet" href="{{ asset('assets_hmpg/css/custom.css') }} ">
</head>

<body class="bg-white login-body bg-light">
    <!-- Preloader -->
    <div class="preLoader">
        <div class="preload-inner">
            <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>
        </div>
    </div>
    <!-- End Of Preloader -->

    @yield('content')

    <!-- JS Files -->
    <!-- ==== JQuery 3.3.1 js file==== -->
    <script src="{{ asset('assets_hmpg/js/jquery-3.3.1.min.js') }} "></script>

    <!-- ==== Bootstrap js file==== -->
    <script src="{{ asset('assets_hmpg/js/bootstrap.bundle.min.js') }} "></script>

    <!-- ==== JQuery Waypoint js file==== -->
    <script src="{{ asset('assets_hmpg/plugins/waypoints/jquery.waypoints.min.js') }} "></script>

    <!-- ==== Parsley js file==== -->
    <script src="{{ asset('assets_hmpg/plugins/parsley/parsley.min.js') }} "></script>

    <!-- ==== parallax js==== -->
    <script src="{{ asset('assets_hmpg/plugins/parallax/parallax.js') }} "></script>

    <!-- ==== Owl Carousel js file==== -->
    <script src="{{ asset('assets_hmpg/plugins/owl-carousel/owl.carousel.min.js') }} "></script>

    <!-- ==== Menu  js file==== -->
    <script src="{{ asset('assets_hmpg/js/menu.min.js') }} "></script>

    <!-- ===video popup=== -->
    <script src="{{ asset('assets_hmpg/plugins/Magnific-Popup/jquery.magnific-popup.min.js') }} "></script>

    <!-- ====Counter js file=== -->
    <script src="{{ asset('assets_hmpg/plugins/waypoints/jquery.counterup.min.js') }} "></script>

    <!-- ==== Script js file==== -->
    <script src="{{ asset('assets_hmpg/js/scripts.js') }} "></script>

    <!-- ==== Custom js file==== -->
    <script src="{{ asset('assets_hmpg/js/custom.js') }} "></script>

    <!-- Font Awesome Fatkhur -->
    <script src="https://kit.fontawesome.com/285251c835.js" crossorigin="anonymous"></script>
</body>

</html>
