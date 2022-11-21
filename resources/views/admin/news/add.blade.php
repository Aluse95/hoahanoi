@extends('admin.layouts.app')

@section('title')
    Tạo bài viết
@endsection

@section('meta')
<script type="text/javascript" src="{{ asset('../ckeditor/ckeditor.js') }}"></script>
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
      <h2 class="text-center">Tạo bài viết mới</h2>
      <div class="form-group mb-3">
        <label for="">Tên bài viết</label>
        <input type="text" name="name" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Nội dung</label>
        <textarea class="ckeditor" name="content"  rows="4"></textarea>
      </div>
      @error('content')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Link ảnh bài viết</label>
        <input type="text" name="image" id="" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('image')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Mô tả</label>
        <textarea class="ckeditor" name="description"  rows="4"></textarea>
      </div>
      @error('description')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.news') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
