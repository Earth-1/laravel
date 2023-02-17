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
            <h1>คำสั่งซื้อทั้งหมด</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">คำสั่งซื้อทั้งหมด</h5>
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
                                            <th scope="col">ชื่อ</th>
                                            {{-- <th scope="col">อีเมล์</th>
                                            <th scope="col">โทรศัพท์</th>
                                            <th scope="col">ที่อยู่</th> --}}
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">จำนวนสินค้า</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">สถานะการจ่ายเงิน</th>
                                            <th scope="col">สถานะการจัดส่ง</th>
                                            <th scope="col">วันที่</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">การจัดส่ง</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $order)
                                            <tr>
                                                <td>{{ $order->name }}</td>
                                                {{-- <td>{{ $order->email }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->address }}</td> --}}
                                                <td>{{ $order->product_title }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->payment_status }}</td>
                                                <td>{{ $order->delivery_status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td><img src="/product/{{ $order->image }}" class="imgcss"></td>
                                                <td>
                                                    @if ($order->delivery_status == 'กำลังตรวจสอบ')
                                                        <a href="{{ url('delivered', $order->id) }}"
                                                            class="btn btn-primary"
                                                            onclick="return confirm('คุณแน่ใจนะว่าจะส่งสินค้านี้')">ส่งสินค้า
                                                        </a>
                                                    @else
                                                        <p style="color: green;">ส่งสินค้าแล้ว</p>
                                                    @endif
                                                </td>

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
