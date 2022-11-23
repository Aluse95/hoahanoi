@extends('admin.layouts.app')

@section('title')
    Thêm danh mục
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
      <h2 class="text-center">Thêm danh mục</h2>
      <div class="form-group my-3">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" id="" class="input-item form-control mt-2" placeholder="Nhập tên danh mục" aria-describedby="helpId">
      </div>
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.cat') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
