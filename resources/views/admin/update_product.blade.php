<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    @include('sweetalert::alert')
</head>

<body>
    @include('admin.slideber')
    @include('admin.header')
    @include('admin.script')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>อัปเดตสินค้า</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">อัปเดตสินค้า</h5>
                                            <form action="{{ url('/update_product_confirm', $product->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="inputText"
                                                        class="col-sm-3 col-form-label">ขื่อสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="title"
                                                            required value="{{ $product->title }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputEmail"
                                                        class="col-sm-3 col-form-label">รายละเอียดสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="description"
                                                            required value="{{ $product->description }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">ราคาสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="price"
                                                            required value="{{ $product->price }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="quantity"
                                                            required value="{{ $product->quantity }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputText"
                                                        class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <select name="catagory" id="" class="text_color"
                                                            required>
                                                            <option value="{{ $product->catagory }}" selected>
                                                                {{ $product->catagory }}</option>

                                                            @foreach ($catagory as $catagory)
                                                                <option value="{{ $catagory->catagory_name }}">
                                                                    {{ $catagory->catagory_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputText"
                                                        class="col-sm-3 col-form-label">รูปภาพสินค้า</label>
                                                    <div class="col-sm-10">

                                                        <input type="file" name="image">
                                                    </div>
                                                    <div class="my-3">
                                                        <input type="submit" value="อัปเดต"
                                                            class="btn btn-outline-primary">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
