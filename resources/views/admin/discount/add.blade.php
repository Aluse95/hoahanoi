@extends('admin.layouts.app')

@section('title')
    Thêm mã giảm giá
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
      <h2 class="text-center">Thêm mã giảm giá</h2>
      <div class="form-group my-3">
        <label for="">Tên mã giảm giá</label>
        <input type="text" name="name" id="" class="input-item form-control mt-2" placeholder="Nhập tên mã giảm giá" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group my-3">
        <label for="">Mức giảm giá</label>
        <input type="number" name="sale_off" min="0" max="100" class="input-item form-control mt-2" placeholder="Nhập mức giảm giá (%)" aria-describedby="helpId">
      </div>
      @error('sale_off')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.cat') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
