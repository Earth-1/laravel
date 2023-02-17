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
      @include('home.header')
      @include('sweetalert::alert')

      @if (session()->has('message'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}
          </div>
      @endif

      <section class="page-header">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="content">
                          <h1 class="page-name">Cart</h1>
                          <ol class="breadcrumb">
                              <li><a href="{{ url('/') }}">Home</a></li>
                              <li class="active">cart</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <?php $totalprice = 0; ?>

      <div class="page-wrapper">
          <div class="cart shopping">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <div class="block">
                              <div class="product-list">
                                  <form method="post">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th class="">Item Name</th>
                                                  <th class="">Item Price</th>
                                                  <th class="">Price</th>
                                                  <th>Size</th>
                                                  <th class="">Actions</th>

                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($cart as $cart)
                                                  <tr class="">
                                                      <td class="">
                                                          <div class="product-info">
                                                              <img width="80" src="/product/{{ $cart->image }}"
                                                                  alt="">
                                                              <a href="#!">{{ $cart->product_title }}</a>
                                                          </div>
                                                      </td>
                                                      <td class="">{{ $cart->quantity }}</td>
                                                      <td class="">{{ $cart->price }} บาท</td>
                                                      <td>

                                                          {{ $cart->size }}
                                                      </td>
                                                      <td class="">
                                                          <a class="product-remove btn btn-danger"
                                                              data-id="{{ $cart->id }}" id="confirmation"><span
                                                                  style="color: #fff !important;"><i
                                                                      class="fa fa-times">X</i></span></a>

                                                      </td>
                                                  </tr>
                                                  <?php $totalprice = $totalprice + $cart->price; ?>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      <hr class="border-3">
                                      <br>
                                      <a onclick="return confirm('แน่ใจนะครับ')" href="{{ url('cash_order') }}"
                                          class="btn btn-main pull-right">จ่ายเงินปลายทาง</a>
                                      <a href="{{ url('paid', $totalprice) }}"
                                          class="btn btn-main pull-left">จ่ายเงิน</a>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>




      {{-- <div>
        <h1 style="font-size: 25px; padding-bottom: 15px">วิธีการชำระเงิน</h1>
        <a href="{{url('cash_order')}}" class="btn btn-danger" onclick="return confirm('คุณแน่ใจนะ')">จ่ายปลายทาง</a>
    <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">โอนเงิน</a>
    </div> --}}


      @include('home.footer')



      <!--Essential Scripts=====================================-->

      <!-- Main jQuery -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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



      <script>
          $('#confirmation').click(function() {
              let id = $(this).attr('data-id');
              Swal.fire({
                  title: '',
                  text: "ต้องการลบหรือไม่",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ตกลง',
                  cancelButtonText: 'ยกเลิก'
              }).then((result) => {
                  if (result.isConfirmed) {
                      setTimeout(() => {
                          location.href = "remove_cart/" + id
                      }, 700)
                      Swal.fire(
                          '',
                          'เรียบร้อย!',
                          'success'
                      )
                  }
              })

          })
      </script>

  </body>

  </html>
