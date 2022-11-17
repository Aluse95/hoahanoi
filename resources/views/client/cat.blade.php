@extends('client.layouts.app')

@section('title')
    {{$cat->name}}
@endsection

@section('container')
    @if (session('message'))
    <div class="alert-order alert alert-success text-center m-0 py-3">
        {{ session('message') }}
    </div>
    @endif
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-3 col-12">
                @include('client.sitebar')
            </div>
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="link-path ml-3"><a href="./">Trang chủ</a><span class="mx-2">>></span><a href="">{{$cat->name}}</a></div>
                </div>
                <div class="row pt-5">
                    @foreach($all_product as $article)
                        <div class="col-lg-3 col-md-4 col-6 px-md-2 px-3 mb-4">
                            <div class="card position-relative">
                                <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($article->old_price - $article->price)/$article->old_price)}}%</span></div>
                                <a href="{{$article->product_alias}}" class="wrap-img wrap-img_cat">
                                    <img src="{{ $article->image }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body text-center">
                                    <a href="{{$article->product_alias}}" class="card-title">{{$article->name}}</a>
                                    <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($article->old_price)}}<span class="vnd">đ</span></span>{{number_format($article->price)}}<span class="vnd">đ</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
@endsection