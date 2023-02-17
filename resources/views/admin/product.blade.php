<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')

</head>

<body>
    @include('sweetalert::alert')
    @include('admin.slideber')
    @include('admin.header')
    @include('admin.script')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>เพิ่มสินค้า</h1>
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
                                            <h5 class="card-title">เพิ่มสินค้า</h5>
                                            <form action="{{ url('/add_product') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="title"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">รายละเอียดสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="description"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">ราคาสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="price"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="quantity"
                                                            required>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                                        <div class="col-sm-10">
                                                            <select name="catagory" class="form-select"
                                                                aria-label="Default select example" required>
                                                                <option value="" selected>เลือก</option>
                                                                @foreach ($catagory as $catagory)
                                                                    <option value="{{ $catagory->catagory_name }}">
                                                                        {{ $catagory->catagory_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label
                                                                class="col-sm-3 col-form-label">รูปภาพสินค้า</label><br><br>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control"
                                                                    name="image" required>
                                                            </div>
                                                            <br><br>
                                                            <div>
                                                                <input type="submit" value="อัปเดต"
                                                                    class="btn btn-outline-primary">
                                                            </div>
                                                        </div>
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
