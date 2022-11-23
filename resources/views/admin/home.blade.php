@extends('admin.layouts.app')

@section('title')
    Bảng điều khiển
@endsection

@section('content')
    <div class="content h-100 p-5">
        <h1 class="heading text-center">Chào mừng bạn đến trang quản trị</h1>
        <div class="home-intro d-flex justify-content-center">
            <a href="{{ route('admin.product') }}" class="d-block home-item">
                <div class="wrap-img mb-3">
                    <img class="img-fluid w-100 h-100" src="assets/image/product.png" alt="">
                </div>
                <p>Sản phẩm</p>
            </a>
            <a href="{{ route('admin.cat') }}" class="d-block home-item">
                <div class="wrap-img mb-3">
                    <img class="img-fluid w-100 h-100" src="assets/image/item.png" alt="">
                </div>
                <p>Danh mục</p>
            </a>
            <a href="{{ route('admin.order') }}" class="d-block home-item">
                <div class="wrap-img mb-3">
                    <img class="img-fluid w-100 h-100" src="assets/image/order.png" alt="">
                </div>
                <p>Đơn hàng</p>
            </a>
            <a href="{{ route('admin.news') }}" class="d-block home-item">
                <div class="wrap-img mb-3">
                    <img class="img-fluid w-100 h-100" src="assets/image/news.png" alt="">
                </div>
                <p class="ml-2">Bài viết</p>
            </a>
        </div>
    </div>


@endsection