<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>BENNY SHOP</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">

      .center{
        margin: auto;
        width: 70%;
        text-align: center;
        padding: 30px;
      }

      table,th,td{
        border: 1px solid black;
      }
      .th_deg{
        font-size: 30px;
        padding: 5px;
      }
      .img_deg{
        height: 200px;
        width: 200px;
      }
      .tt_de{
        font-size: 20px;
        padding: 40px;
      }

    </style>

   </head>

   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         @if (session()->has('message'))

         <div class="alert alert-success">

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

             {{session()->get('message')}}

         </div>
         @endif
         <!-- end header section -->
         <!-- slider section -->
         {{-- @include('home.slider') --}}
         <!-- end slider section -->


      <div class="center">
        <table>




            <tr>

                <th class="th_deg">Product Title</th>
                <th class="th_deg">product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>

            </tr>

            <tr>
                <?php $totalprice = 0; ?>

                @foreach ($cart as $cart)

                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td><img src="/product/{{$cart->image}}" class="img_deg"></td>
                <td><a href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger" onclick="return confirm('???????????????????????????????????????????????????')">Remove Product</a></td>

            </tr>
            <?php $totalprice = $totalprice + $cart->price ?>
            @endforeach
        </table>
        <div>

            <h1 class="tt_de">Total Price : {{$totalprice}}</h1>

        </div>

        <div>
          <h1 style="font-size: 25px; padding-bottom: 15px">Proceed to Opder</h1>
          <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on delivery</a>
          <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using card</a>
        </div>

      </div>
      <!-- why section -->
      {{-- @include('home.why') --}}
      <!-- end why section -->

      <!-- arrival section -->
      {{-- @include('home.new_arrival') --}}
      <!-- end arrival section -->

      <!-- product section -->
      {{-- @include('home.product') --}}
      <!-- end product section -->

      <!-- subscribe section -->
      {{-- @include('home.subscribe') --}}
      <!-- end subscribe section -->
      <!-- client section -->
      {{-- @include('home.client') --}}
      <!-- end client section -->
      <!-- footer start -->
      {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">?? 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
