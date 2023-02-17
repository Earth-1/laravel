<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    @include('sweetalert::alert')
    @include('admin.slideber')
    @include('admin.header')
    @include('admin.script')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>แสดงสินค้า</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">สินค้าทั้งหมด</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ชื่อ</th>
                                            <th scope="col">คำอธิบาย</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">ส่วนลด</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">ลบ</th>
                                            <th scope="col">แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $product)
                                            <tr>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->catagory }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td><img style="width: 150px; height:150px"
                                                        src="/product/{{ $product->image }}"></td>
                                                <td><a class="btn btn-warning"
                                                        href="{{ url('update_product', $product->id) }}">แก้ไข</a></td>
                                                <td><a class="btn btn-danger"
                                                        onclick="return confirm('คุณแน่ใจนะว่าจะลบ')"
                                                        href="{{ url('delete_product', $product->id) }}">ลบ</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->
        </section>
</body>

</html>
