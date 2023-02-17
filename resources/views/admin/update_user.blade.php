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
            <h1>แก้ไขข้อมูล</h1>
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
                                            <h5 class="card-title">แก้ไขข้อมูล</h5>
                                            <form action="{{ url('/update_user_confirm', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">ชื่อ</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name"
                                                            required value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">อีเมลล์</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email"
                                                            required value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">โทรศัพท์</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="phone"
                                                            required value="{{ $user->phone }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">ที่อยู่</label>
                                                    <div class="col-sm-10" >
                                                        <textarea class="form-control" style="height: 100px" name="address">{{ $user->address }}</textarea>
                                                    </div>
                                                    <div class="my-3">
                                                        <input type="submit" value="อัปเดต"
                                                            class="btn btn-outline-primary">
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
