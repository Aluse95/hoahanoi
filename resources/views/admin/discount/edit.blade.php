@extends('admin.layouts.app')

@section('title')
    Sửa mã giảm giá
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
      <h2 class="text-center">Sửa mã giảm giá</h2>
      <div class="form-group w-50 mb-3 mt-3">
        <label for="">Tên mã giảm giá</label>
        <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group my-3">
        <label for="">Mức giảm giá</label>
        <input type="number" name="sale_off" min="0" max="100" value="{{ $item->sale_off }}" class="input-item form-control mt-2" placeholder="Nhập mức giảm giá (%)" aria-describedby="helpId">
      </div>
      @error('sale_off')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group w-100 my-3">
        <label for="">Trạng thái</label>
        <input type="number" name="status" max="1" min="0" value="{{ $item->status }}" class="input-item form-control mt-2" placeholder="" aria-describedby="helpId">
      </div>
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.discount') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection


