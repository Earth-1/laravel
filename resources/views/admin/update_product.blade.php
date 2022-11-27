<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">

    @include('admin.css')
    <style type="text/css">

        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: #000;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
                @if (session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}

                </div>




                @endif

                <div class="div_center">

                    <h1 class="font_size">Update Product</h1>

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="div_design">
                    <label for="" >Product Title :</label>
                    <input class="text_color" type="text" name="title" id="" placeholder="Write a title" required value="{{$product->title}}">
                </div>
                    <div class="div_design">
                    <label for="">Product Description :</label>
                    <input class="text_color" type="text" name="description" id="" placeholder="Write a description" required value="{{$product->description}}">
                </div>
                    <div class="div_design">
                    <label for="">Product Price :</label>
                    <input class="text_color" type="number" name="price" id="" placeholder="Write a price" required value="{{$product->price}}">
                </div>
                <div class="div_design">
                    <label for="">Discount Price :</label>
                    <input class="text_color" type="number" name="dis_price" id="" placeholder="Write a discount price" value="{{$product->discount_price}}">
                </div>
                    <div class="div_design">
                    <label for="">Product Quantity :</label>
                    <input class="text_color" type="number" min="0" name="quantity" id="" placeholder="Write a quantity" required value="{{$product->quantity}}">
                </div>

                    <div class="div_design">
                    <label for="">Product Catagory :</label>
                    <select name="catagory" id="" class="text_color" required>
                        <option value="{{$product->catagory}}" selected>{{$product->catagory}}</option>

                        @foreach ($catagory as $catagory)



                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="div_design">
                    <label for="">Current Product Image :</label>
                    <img src="/product/{{$product->image}}" height="100" width="100" style="margin:auto">
                </div>




                <div class="div_design">
                    <label for="">Change Product Image :</label>
                    <input type="file" name="image" >
                </div>
                <div class="div_design">
                    <input type="submit" value="Update product" class="btn btn-primary">
                </div>
            </form>


                </div>

                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
