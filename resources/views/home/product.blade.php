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
    <!-- Start Top Header Bar -->
    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($product as $products)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                {{-- <span class="bage">Sale</span> --}}
                                <img class="img-responsive" src="product/{{ $products->image }}">
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="{{ url('product_details', $products->id) }}"><i
                                                    class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>{{ $products->title }}</h4>
                                <p class="price">${{ $products->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <style>
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
            z-index: 3;
            color: #fff !important;
            cursor: default;
            background-color: black !important;
            border-color: black !important;
        }
        *{color: black !important;}
    </style>
    <div class="text-center">
        <ul >
            <span>
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </ul>
    </div>
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
