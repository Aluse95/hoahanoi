@extends('admin.layouts.app')

@section('title')
  Sửa thông tin người dùng
@endsection

@section('content')

  <div class="content h-100 p-5">
    <form action="" method="post" class="content-add">
      @csrf
      @if (session('message'))
        <div class="alert alert-danger text-center mb-4 py-3">
          {{ session('message') }}
        </div>
      @endif
      <h2 class="text-center">Sửa thông tin người dùng</h2>
      <div class="form-group mb-3">
        <label for="">Tên người dùng</label>
        <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Email</label>
        <input type="text" name="email" value="{{ $item->email }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('email')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Level</label>
        <input type="number" name="level" max="1" min="0" value="{{ $item->level }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.user') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
