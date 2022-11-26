<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/10af5283a9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">
    @yield('meta')
  </head>
  <body>
    <div class="contain-fluid">
      <div class="header d-flex justify-content-between align-items-center">
        <div class="icon-menu ml-4 mb-0 d-md-none">
          <img class="img-fluid w-100" src="{{asset('client/assets/image/menu.png')}}">
        </div>
        <a href="{{ route('admin.home') }}" class="ml-4 pb-1 font-weight-bold header">
          <i class="fa-solid fa-house mr-3"></i>Bảng điều khiển
        </a>
        <div class="d-flex align-items-center mr-4">
          <div class="mb-1">{{Auth::user()->name}}</div>
          <div class="user-img mx-3">
            <img class="img-fluid w-100 h-100" src="{{Auth::user()->image}}" alt="">
          </div>
          <a href="{{route('logout')}}" class="user-logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
      <div class="overlay"></div>
      <div class="nav-mobile py-5">
        <div class="nav-close">
          <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="p-4">
          <img class="img-fluid w-100 p-2" src="{{asset('client/assets/image/order.jpg')}}" alt="">
        </div>
        <ul class="nav-list p-0 ml-3 list-unstyled">
          <li class="nav-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="nav-item"><a href="{{ route('admin.product') }}">Sản phẩm</a></li>
          <li class="nav-item"><a href="{{ route('admin.cat') }}">Danh mục</a></li>
          <li class="nav-item"><a href="{{ route('admin.order') }}">Đơn hàng</a></li>
          <li class="nav-item"><a href="{{ route('admin.discount') }}">Mã giảm giá</a></li>
          <li class="nav-item"><a href="{{ route('admin.news') }}">Bài viết</a></li>
          <li class="nav-item"><a href="{{ route('admin.user') }}">Người dùng</a></li>
        </ul>
      </div>
      <div class="d-flex">
        <div class="dashboard col-lg-2 col-md-3">
          <ul class="list-unstyled m-0 pt-4">
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-solid fa-tag mr-3"></i>Sản phẩm</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.cat')}}"><i class="fa-sharp fa-solid fa-list-ul mr-3"></i>Danh mục</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.order')}}"><i class="fa-solid fa-clipboard-check mr-3"></i>Đơn hàng</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.discount')}}"><i class="fa-solid fa-tag mr-3"></i>Mã giảm giá</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.news')}}"><i class="fa-regular fa-newspaper mr-3"></i>Bài viết</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.user')}}"><i class="fa-solid fa-user-group mr-3"></i>Người dùng</a></li>
          </ul>
        </div>
        <div class="wrap-content col-lg-10 col-md-9 p-5">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </body>
</html>
@yield('js')

<script>
  $('.icon-menu').click(function() {
    $('.nav-mobile').css("transform","translateX(0)")
    $('.overlay').show()
  })
  $('.overlay').click(function() {
    $('.overlay').hide()
    $('.nav-mobile').css("transform","translateX(-100%)")
  })
  $('.nav-close').click(function() {
    $('.overlay').hide()
    $('.nav-mobile').css("transform","translateX(-100%)")
  })
</script>