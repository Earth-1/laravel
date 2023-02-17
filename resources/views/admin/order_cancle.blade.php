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
            <h1>คำสั่งซื้อที่ยกเลิก</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">คำสั่งซื้อที่ยกเลิก</h5>
                                <div class="search-bar">
                                    <form action="{{ url('search') }}" method="get">
                                        @csrf
                                        <input type="text" name="search" placeholder="ค้นหา"
                                            title="Enter search keyword">
                                        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                    </form>

                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">user_id</th>
                                            <th scope="col">product_id</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">วันที่</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $order)
                                            <tr>
                                                <td>{{ $order->user_id }}</td>
                                                <td>{{ $order->product_id }}</td>
                                                <td>{{ $order->delivery_status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="16">
                                                    ไม่มีข้อมูล
                                                </td>
                                            </tr>
                                        @endforelse
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
