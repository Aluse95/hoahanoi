@extends('admin.layouts.app')

@section('title')
  Thêm người dùng
@endsection

@section('content')

  <div class="content p-5">
    <form action="" method="post" class="content-add">
      @csrf
      @if (session('message'))
        <div class="alert alert-danger text-center mb-4 py-3">
          {{ session('message') }}
        </div>
      @endif
      <h2 class="text-center">Thêm người dùng mới</h2>
      <div class="form-group mb-3">
        <label for="">Tên khách hàng</label>
        <input type="text" name="name" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('address')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('phone')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Email khách hàng</label>
        <input type="text" name="email" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('email')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Mật khẩu</label>
        <textarea class="input-item form-control" name="password" rows="3"></textarea>
      </div>
      @error('password')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.user') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection