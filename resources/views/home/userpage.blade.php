<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>BENNY SHOP</title>
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="home/images/favicon.png"> --}}
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="home/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="home/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="home/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="home/plugins/slick/slick.css">
    <link rel="stylesheet" href="home/plugins/slick/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="home/css/style.css">
    <script type="text/javascript" charset="UTF-8"
        src="https://maps.googleapis.com/maps-api-v3/api/js/51/7/intl/th_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8"
        src="https://maps.googleapis.com/maps-api-v3/api/js/51/7/intl/th_ALL/util.js"></script>
</head>

<body id="body">
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    @include('sweetalert::alert')
    @include('home.header')
    @include('home.category')
    @include('home.product')
    @include('home.footer')
    <!--Essential Scripts=====================================-->
    <!-- Main jQuery -->
    <script src="home/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="home/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="home/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="home/plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="home/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="home/plugins/syo-timer/build/jquery.syotimer.min.js"></script>
    <!-- slick Carousel -->
    <script src="home/plugins/slick/slick.min.js"></script>
    <script src="home/plugins/slick/slick-animation.min.js"></script>
    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="home/plugins/google-map/gmap.js"></script>
    <!-- Main Js File -->
    <script src="home/js/script.js"></script>
</body>

</html>
