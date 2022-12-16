<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')
    <style >

        .h1css{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }
        .tablecss{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
            
        }
        .thcss{

        }
        .imgcss{
            height: 150px;
            width: 150px;
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

                <h1 class="h1css">All Orders</h1>

                <table class="tablecss"> 
                    <tr class="thcss">

                        <th style="padding: 10px">Name</th>
                        <th style="padding: 10px">Email</th>
                        <th style="padding: 10px">Address</th>
                        <th style="padding: 10px">Phone</th>
                        <th style="padding: 10px">Product name</th>
                        <th style="padding: 10px">Quantity</th>
                        <th style="padding: 10px">Price</th>
                        <th style="padding: 10px">Payment Status</th>
                        <th style="padding: 10px">Delivery Status</th>
                        <th style="padding: 10px">Image</th>
                        <th style="padding: 10px">Delivery</th>
                        <th style="padding: 10px">Print PDF</th>

                    </tr>
                    @foreach ($order as $order)
                        
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img src="/product/{{$order->image}}" class="imgcss"></td>
                        <td>

                            @if($order->delivery_status=='processing')

                            <a 

                            href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('คุณแน่ใจนะว่าจะส่งสินค้านี้')">Delivered

                            </a>

                            @else

                            <p style="color: green;">Delivered</p>

                            @endif

                        </td>
                        <td>

                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>

                        </td>
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
