@extends('admin.layouts.app')

@section('title')
  Chỉnh sửa bài viết
@endsection

@section('meta')
<script type="text/javascript" src="{{ asset('../ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

<div class="content h-100 p-5">
  <form action="" method="post" class="content-add">
    @csrf
    @if (session('message'))
      <div class="alert-order alert alert-danger text-center mb-4 py-3">
        {{ session('message') }}
      </div>
    @endif
    <h2 class="text-center">Chỉnh sửa bài viết</h2>
    <div class="form-group mb-3">
      <label for="">Tên bài viết</label>
      <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('name')
      <p class="red">{{ $message }}</p>
    @enderror<div class="form-group mb-3">
      <label for="">Đường dẫn bài viết</label>
      <input type="text" name="news_alias" value="{{ $item->news_alias }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('news_alias')
      <p class="red">{{ $message }}</p>
    @enderror

    <div class="form-group mb-3">
      <label for="">Nội dung</label>
      <textarea class="ckeditor" name="content"  rows="4">{{ $item->content }}</textarea>
    </div>
    @error('content')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Link ảnh bài viết</label>
      <input type="text" name="image" value="{{ $item->image }}" class="input-item form-control " placeholder="" aria-describedby="helpId">
    </div>
    @error('image')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Mô tả</label>
      <textarea class="ckeditor" name="description"  rows="4">{{ $item->description }}</textarea>
    </div>
    @error('description')
      <p class="red">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
    <a href="{{ route('admin.news') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
  </form>
</div>


@endsection


