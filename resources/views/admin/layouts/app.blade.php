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
        <div class="ml-4 pb-1 font-weight-bold">
          <i class="fa-solid fa-house mr-3"></i>Bảng điều khiển
        </div>
        <div class="d-flex align-items-center mr-4">
          <div class="mb-1">Mạnh Tưởng</div>
          <div class="user-img mx-3">
            <img class="img-fluid w-100 h-100" src="../client/assets/image/news1.jpg" alt="">
          </div>
          <a href="" class="user-logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>

      <div class="d-flex">
        <div class="dashboard col-lg-2 col-md-3">
          <ul class="list-unstyled m-0 pt-4">
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-solid fa-tag mr-3"></i>Sản phẩm</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.cat')}}"><i class="fa-sharp fa-solid fa-list-ul mr-3"></i>Danh mục</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-solid fa-clipboard-check mr-3"></i>Đơn hàng</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-regular fa-newspaper mr-3"></i>Bài viết</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-solid fa-user-group mr-3"></i>Khách hàng</a></li>
            <li class="dashboard-item"><a class="dashboard-link d-block" href="{{route('admin.product')}}"><i class="fa-solid fa-user-gear mr-3"></i>Quản trị viên</a></li>
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