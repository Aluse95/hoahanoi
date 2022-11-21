@extends('admin.layouts.app')

@section('title')
    Sửa danh mục
@endsection

@section('content')

  <div class="content p-5">
    <form action="" method="post" class="content-add">
      @csrf
      @if (session('message'))
        <div class="alert-order alert alert-danger text-center mb-4 py-3">
          {{ session('message') }}
        </div>
      @endif
      <h2 class="text-center">Sửa danh mục</h2>
      <div class="form-group w-50 mb-3 mt-3">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-50 mb-3">
        <label for="">Đường dẫn danh mục</label>
        <input type="text" name="cat_alias" value="{{ $item->cat_alias }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('cat_alias')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.cat') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection


