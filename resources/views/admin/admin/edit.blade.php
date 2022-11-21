@extends('admin.layouts.app')

@section('title')
  Sửa thông tin Admin
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
      <h2 class="text-center">Sửa thông tin Admin</h2>
      <div class="form-group mb-3">
        <label for="">Tên quản trị viên</label>
        <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Tên đăng nhập</label>
        <input type="text" name="username" value="{{ $item->username }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('address')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Ảnh đại diện</label>
        <input type="text" name="image" value="{{ $item->image }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('address')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.user') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
