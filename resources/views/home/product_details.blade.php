<html lang="en">

<head>

    <base href="/public">
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
    @include('home.header')
    @include('sweetalert::alert')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Product Detail</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active">Product Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="single-product">
        <div class="container">
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- me art lab slider -->
                                <div class="carousel-inner ">
                                    <div class="item active">
                                        <img src="product/{{ $product->image }}" alt=""
                                            data-zoom-image="product/{{ $product->image }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->title }}</h2>
                        <p class="product-price">${{ $product->price }}</p>
                        <p class="product-description mt-20">
                            {{ $product->description }}
                        </p>
                        <div class="product-quantity">
                            <span>จำนวนคงเหลือ:</span>
                            {{ $product->quantity }}
                        </div>
                        <form action="{{ url('add_cart', $product->id) }}" id="addproduct" method="POST">
                            @csrf
                            <div class="product-size">
                                <span>Size:</span>
                                <select name="size" class="form-control">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                            <div class="product-quantity">
                                <span>Quantity:</span>
                                <div class="product-quantity-slider">
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-btn"></span>
                                        <input type="number" min="1" value="1" name="quantity"
                                            class="form-control text-center" style="display: block;">
                                        <span class="input-group-addon bootstrap-touchspin-postfix"
                                            style="display: none;"></span>
                                    </div>
                                </div>
                            </div>
                            <a onclick="$('#addproduct').submit()" class="btn btn-main mt-20">เพิ่มสินค้า</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
