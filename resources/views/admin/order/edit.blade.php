@extends('admin.layouts.app')

@section('title')
  Cập nhật đơn hàng
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
    <h2 class="text-center">Cập nhật đơn hàng</h2>
    <div class="form-group mb-3">
      <label for="">Tên khách hàng</label>
      <input type="text" name="name" value="{{ $item->name }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('name')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Địa chỉ</label>
      <input type="text" name="address" value="{{ $item->address }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('address')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Số điện thoại</label>
      <input type="text" name="phone" value="{{ $item->phone }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('phone')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Email khách hàng</label>
      <input type="text" name="email" value="{{ $item->email }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('email')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Sản phẩm</label>
      <textarea class="input-item form-control" name="product" rows="3">{{ $item->product }}</textarea>
    </div>
    @error('product')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Tổng tiền</label>
      <input type="text" name="price" value="{{ $item->price }}" class="input-item form-control" placeholder="" aria-describedby="helpId">
    </div>
    @error('price')
      <p class="red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
      <label for="">Ghi chú</label>
      <textarea class="input-item form-control" name="note" rows="3">{{ $item->note }}</textarea>
    </div>
    @error('note')
      <p class="red">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-success btn-control mt-3">Lưu</button>
    <a href="{{ route('admin.order') }}" class="btn btn-control btn-primary ml-2 mt-3">Quay lại</a>
  </form>
</div>


@endsection


