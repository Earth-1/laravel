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
            <h1>คำสั่งซื้อที่ส่งแล้ว</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">คำสั่งซื้อที่ส่งแล้ว</h5>
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
                                            <th scope="col">PDF</th>
                                            <th scope="col">view</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $order)
                                            <tr>
                                                <td>{{ $order->user_id }}</td>
                                                <td>{{ $order->product_id }}</td>
                                                <td>{{ $order->delivery_status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('print_pdf', $order->id) }}"
                                                        class="btn btn-secondary">Print PDF</a>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary bg-primary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        view
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button"
                                                                        class="btn btn-close text-danger fs-3"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body w-75 ">
                                                                    <div class="row">
                                                                        <div class="col-3">ชื่อลูกค้า :</div>
                                                                        <div class="col-9">{{ $order->name }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">อีเมลล์ :</div>
                                                                        <div class="col-9">{{ $order->email }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">โทรศัพท์ :</div>
                                                                        <div class="col-9">{{ $order->phone }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">ที่อยู่ :</div>
                                                                        <div class="col-9">{{ $order->address }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">ชื่อสินค้า :</div>
                                                                        <div class="col-9">{{ $order->product_title }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">จำนวน :</div>
                                                                        <div class="col-9">{{ $order->quantity }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">ราคา :</div>
                                                                        <div class="col-9">{{ $order->price }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">สถานะ :</div>
                                                                        <div class="col-9">
                                                                            {{ $order->payment_status }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row my-3">
                                                                        <div class="col-3">รูปภาพ :</div>
                                                                        <div class="col-9 position-relative">
                                                                            <img width="100" class="img-responsive"
                                                                                src="product/{{ $order->image }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">ไซส์ :</div>
                                                                        <div class="col-9">{{ $order->size }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
