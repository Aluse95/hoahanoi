@extends('client.layouts.app')

@section('title')
    Tin tức
@endsection

@section('container')

<div class="container-data py-5">
    <div class="container wrap-data p-5">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="row">
                    @foreach ($news as $item)
                    <div class="d-flex align-items-center mb-5">
                        <div class="col-lg-3 col-12">
                            <a href="{{$item->news_alias}}" class="news-img">
                                <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-9 col-12">
                            <a href="{{$item->news_alias}}" class="news-title">{{$item->name}}</a>
                            <p class="desc-text news-text">{!!$item->content!!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 container-data_list">
                <h3 class="heading-detail m-0 py-4">Bài viết liên quan</h3>              
                <ul class="data-list data-list_detail list-unstyled px-2 m-0">
                    @foreach ($news as $item)
                        <li class="data-item d-flex align-items-center p-3">
                            <div class="wrap-data_img mr-3">
                                <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                            </div>
                            <a href="{{$item->news_alias}}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>                       
                    @endforeach
                </ul>
                <h3 class="heading-detail m-0 py-4">Sản phẩm mới</h3>              
                <ul class="data-list data-list_detail list-unstyled px-2 m-0">
                    @foreach ($new_product as $item)
                        <li class="data-item d-flex align-items-center p-3">
                            <div class="wrap-data_img mr-3">
                                <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                            </div>
                            <a href="{{$item->product_alias}}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>                       
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection