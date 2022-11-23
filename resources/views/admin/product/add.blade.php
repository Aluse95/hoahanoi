@extends('admin.layouts.app')

@section('title')
    Thêm sản phẩm 
@endsection
@section('meta')
<script type="text/javascript" src="{{ asset('../ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

  <div class="content h-100">
    <form action="" method="post" class="content-add">
      @csrf
      <h2 class="text-center">Thêm sản phẩm</h2>
      <label for="">Chọn danh mục</label>
      <select class="input-item form-control w-50 mb-3" name="cat_id">
        @foreach ($data as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      @error('cat_id')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Giá sản phẩm</label>
        <input type="text" name="price" id="" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('price')
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
        <label for="">Link ảnh sản phẩm</label>
        <input type="text" name="image" id="" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('image')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Mô tả</label>
        <textarea class="input-item form-control" name="description" rows="4"></textarea>
      </div>
      @error('description')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.product') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
