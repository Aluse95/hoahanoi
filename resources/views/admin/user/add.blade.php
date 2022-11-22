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
        <label for="">Họ và tên</label>
        <input type="text" name="name" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Email</label>
        <input type="text" name="email" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('email')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Level</label>
        <input type="number" name="level" max="1" min="0" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group mb-3">
        <label for="">Mật khẩu</label>
        <input type="text" name="password" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('password')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.user') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
