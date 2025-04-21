<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SE-CAMP</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ url('public/assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ url('public/assets/sweetalert/sweetalert2.min.css')}}" rel="stylesheet">
  @yield('styles')
  <!-- yield เอาเนื้อหาจาก section นั้นมาใส่ -->
</head>

<body>
  <main>
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="{{ url('public/assets/img/logo-se.jpg') }}" width="48" />
          <span class="fs-4">CAMP-Final</span>
        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ url('/add')}}" class="nav-link">Add User</a></li>
        </ul>

      </header>
      <div class="text-center">
        <!--เอาข้อความไว้ตรงหลาง -->
        <h2>Software Development Training Camp</h2>
        <p>88823665 ค่ายฝึกพัฒนาซอฟต์แวร์</p>
        <p class="lead">ไฟล์ของ <รหัสนิสิต>
            <ชื่อ - นามสกุล>
        </p>
        <hr>
      </div>

      <div class="row">
        <div class="row mt-5">
          @yield('contents')
          <!--เอาคอนเทนต์มาใส่ -->
        </div>
      </div>

  </main>
  <script src="{{ url('public/assets/jquery/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ url('public/assets/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ url('public/assets/sweetalert/sweetalert2.all.min.js') }}"></script>
  @yield('javascripts')
  <!--เอาjava -->
</body>

</html>