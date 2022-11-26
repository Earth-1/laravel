<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')
    <style type="text/css">

    .center{
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size{
        text-align: center;
        padding-top: 20px;
        font-size: 40px;
    }
    .image_size{
        width: 150px;
        height: 150px;
    }
    .th_color{
        background: seagreen;
    }
    .th_de{
        padding: 30px;
    }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.slideber')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_de">Product title</th>
                        <th class="th_de">Description</th>
                        <th class="th_de">Quantity</th>
                        <th class="th_de">Catagory</th>
                        <th class="th_de">Price</th>
                        <th class="th_de">Discount Price</th>
                        <th class="th_de">Product Image</th>
                    </tr>

                    @foreach ($product as $product)



                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td><img class="image_size" src="/product/{{$product->image}}" ></td>
                    </tr>
                    @endforeach
                </table>

                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>