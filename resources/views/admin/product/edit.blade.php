@extends('admin.layouts.app')

@section('title')
    Sửa sản phẩm 
@endsection
@section('meta')
<script type="text/javascript" src="{{ asset('../ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

  <div class="content p-5">
    <form action="" method="post" class="content-add">
      @csrf
      <h2 class="text-center">Sửa sản phẩm</h2>
      <div class="form-group w-50 mb-3">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-50 mb-3">
        <label for="">Đường dẫn sản phẩm</label>
        <input type="text" name="product_alias" value="{{ $item->product_alias }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('product_alias')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-50 mb-3">
        <label for="">Giá sản phẩm</label>
        <input type="text" name="price" value="{{ $item->price }}" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('price')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-50 mb-3">
        <label for="">Giá cũ sản phẩm</label>
        <input type="text" name="old_price" value="{{ $item->old_price }}" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('old_price')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-75 mb-3">
        <label for="">Nội dung</label>
        <textarea class="ckeditor" name="content" rows="4">{{ $item->content }}</textarea>
      </div>
      @error('content')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-75 mb-3">
        <label for="">Link ảnh sản phẩm</label>
        <input type="text" name="image" value="{{ $item->image }}" class="input-item form-control " placeholder="" aria-describedby="helpId">
      </div>
      @error('image')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-75 mb-3">
        <label for="">Mô tả</label>
        <textarea class="input-item form-control" name="description" rows="4">{{ $item->description }}</textarea>
      </div>
      @error('description')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.product') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection


