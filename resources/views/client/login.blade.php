<!doctype html>
<html lang="en">
  <head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/assets/css/main.css') }}">
  </head>
  <body>
    
    <div class="container container-login d-flex">
      <div class="form-login m-auto ">
        @if (isset($message))
          <div class="container mt-4 mb-5"><x-alert type="danger" :content="$message"/></div>     
        @endif
        <h2 class="text-center mb-4">ĐĂNG NHẬP</h2>
        <form action="" method="post">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger text-center">Vui lòng kiểm tra lại dữ liệu!</div>
          @endif
          <div class="form-group mb-4">
            <label for="">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control input-login mt-2" placeholder="Nhập email..." aria-describedby="helpId">
            @error('email')
                <p class="red">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group mb-5">
            <label for="">Mật khẩu</label>
            <input type="text" name="password" value="" class="form-control input-login mt-2" placeholder="Nhập mật khẩu..." aria-describedby="helpId">
            @error('password')
              <p class="red">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="btn-login btn btn-primary pb-2">Đăng nhập</button>
          <a href="register" class="btn-login ml-2">Đăng ký tại đây</a>
        </form>
      </div>
    </div>  


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>