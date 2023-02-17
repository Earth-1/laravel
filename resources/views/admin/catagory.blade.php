<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.slideber')
    @include('admin.header')
    @include('admin.script')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>เพิ่มประเภทสินค้า</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">เพิ่มประเภทสินค้า</h5>
                                <form action="{{ url('/add_catagory') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-8">
                                            <input type="text" name="catagory" required>
                                            <input type="submit" value="เพิ่ม" name="submit"
                                                class="btn btn-outline-primary">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ชื่อประเภทสินค้า</th>
                                                <th scope="col">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                                <tr>

                                                    <td>{{ $data->catagory_name }}</td>
                                                    <td><a class="btn btn-danger"
                                                            onclick="return confirm('คุณแน่ใจนะว่าจะลบ')"
                                                            href="{{ url('delete_catagory', $data->id) }}">ลบ</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->
        </section>

</body>

</html>
