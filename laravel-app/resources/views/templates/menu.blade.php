<!-- Menu template -->
<nav class="navbar navbar-expand-lg ticky-sm-top" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/medium.png') }}" style="width: 30px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav1">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">เกี่ยวกับเว็บไซต์</a>
        </li>
        @if (Session::has('keyLoggedin'))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ข้อมูลระบบ
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link" href="/products">ข้อมูลสินค้า</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/users">ข้อมูลผู้ใช้</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            รายงานข้อมูล
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link" href="/chart_products">ข้อมูลสินค้าคงคลัง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/chart_users">ข้อมูลผู้ใช้</a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/contact">ติดต่อ</a>
        </li>
      </ul>

      <div class="d-flex">
        <ul class="navbar-nav">
          @if (Session::missing('keyLoggedin'))
          <li class="nav-item">
            <a class="nav-link" href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</a>
          </li>
          @endif

          @if (Session::has('keyLoggedin'))
          <li class="nav-item">
            <a class="nav-link"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Session::get('keyEmail') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user_logout"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</a>
          </li>
          @endif
        </ul>
      </div>

    </div>

  </div>
</nav>
<br />