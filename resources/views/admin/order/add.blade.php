@extends('admin.layouts.app')

@section('title')
    Tạo đơn hàng mới
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
      <h2 class="text-center">Tạo đơn hàng mới</h2>
      <div class="form-group mb-3">
        <label for="">Tên khách hàng</label>
        <input type="text" name="name" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('name')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('address')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('phone')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Email khách hàng</label>
        <input type="text" name="email" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('email')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Sản phẩm</label>
        <textarea class="input-item form-control" name="product" rows="3"></textarea>
      </div>
      @error('product')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Tổng tiền</label>
        <input type="text" name="price" id="" class="input-item form-control" placeholder="" aria-describedby="helpId">
      </div>
      @error('price')
        <p class="red">{{ $message }}</p>
      @enderror
      <div class="form-group mb-3">
        <label for="">Ghi chú</label>
        <textarea class="input-item form-control" name="note" rows="3"></textarea>
      </div>
      @error('note')
        <p class="red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
      <a href="{{ route('admin.order') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
    </form>
  </div>

@endsection
