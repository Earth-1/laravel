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
            <h1>การตั้งค่าบัญชี</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ข้อมูลลูกค้า</h5>
                                <div class="search-bar">
                                    <form action="{{ url('searchduser') }}" method="get">
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
                                            <th scope="col">อีเมลล์</th>
                                            <th scope="col">เบอร์โทรศัพท์</th>
                                            <th scope="col">ที่อยู่</th>
                                            <th scope="col">แก้ไข</th>
                                            <th scope="col">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td style="max-width: 200px !important;">{{ $user->address }}</td>
                                                <td>
                                                    <a class="btn btn-warning"
                                                        href="{{ url('update_user', $user->id) }}">แก้ไข</a>
                                                </td>
                                                <td><a class="btn btn-danger"
                                                        onclick="return confirm('คุณแน่ใจนะว่าจะลบ')"
                                                        href="{{ url('delete_user', $user->id) }}">ลบ</a>
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
            </div>
            <script>
                $('#confirmation').click(function() {
                    let id = $(this).attr('data-id');
                    Swal.fire({
                        title: '',
                        text: "ต้องการลบหรือไม่",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ตกลง',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                location.href = "delete_user/" + id
                            }, 700)
                            Swal.fire(
                                '',
                                'เรียบร้อย!',
                                'success'
                            )
                        }
                    })

                })
            </script>
        </section>
</body>

</html>
