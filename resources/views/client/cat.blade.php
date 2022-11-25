@extends('client.layouts.app')

@section('title')
    {{$cat->name}}
@endsection



@section('nav')
<div class="container">
    <ul class="nav-list d-flex justify-content-center list-unstyled text-uppercase m-0"> 
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-item_link active">Trang chủ</a></li>
        @foreach ($cats as $item)
            <li class="nav-item position-relative nav-border">
                <a href="{{$item->cat_alias}}" class="nav-item_link">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection

@section('nav-mobile')
<ul class="nav-mobile_list p-0 ml-3 list-unstyled">
    <li class="nav-mobile_item"><a href="{{ route('home') }}">Trang chủ</a></li>
    @foreach ($cats as $item)
        <li class="nav-mobile_item"><a href="{{$item->cat_alias}}">{{ $item->name }}</a></li>
    @endforeach
</ul>
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
                    <div class="link-path ml-3">
                        <a href="{{ route('home') }}">Trang chủ</a>
                        <span class="mx-1">></span><a href="">{{$cat->name}}</a>
                    </div>
                </div>
                <div class="row pt-5">
                    @foreach($all_product as $item)
                        <div class="col-lg-3 col-md-4 col-6 px-md-2 px-3 mb-4">
                            <div class="card position-relative">
                                @if ($item->old_price)
                                    <div class="sale-off position-absolute d-flex">
                                    <span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span>
                                    </div>
                                @endif
                                <a href="{{ route('san-pham', ['alias'=>$item->product_alias]) }}" class="wrap-img wrap-img_cat">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body text-center">
                                    <a href="{{ route('san-pham', ['alias'=>$item->product_alias]) }}" class="card-title">{{$item->name}}</a>
                                    <p class="card-text text-center mt-3">
                                        @if ($item->old_price)
                                        <span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span>
                                        @endif
                                        </span>{{number_format($item->price)}}<span class="vnd">đ</span>
                                      </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('js')
    <script type="text/javascript">
        function search_ajax(){
            $.ajax({
                url : "{{route('search')}}",
                type : "get",
                data : {
                name : $('#search_input').val(),
                },
                success : function (data){
                if(data) {
                    $.each(data, function(index, value) {
                    $('.data-search').append(
                    `<a href="../san-pham/${value['product_alias']}" class="item-search p-3">
                        <div class="d-flex align-items-center">
                        <div class="img-search">
                            <img class="img-fluid w-100 h-100" src="${value['image']}" alt="">
                        </div>
                        <div class="data-name ml-4">${value['name']}</div>
                        </div>
                        <div class="data-price">${value['price'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")} đ</div>
                    </a>`)
                    })
                } else {
                    $('.data-search').append('<p class="py-3 m-0 ml-4">Không tìm thấy sản phẩm!</p>')
                }
                // $('#search_input').focus(function() {
                //   $('.data-search').html('')
                // })
                $(document).click(function (e)
                {
                    var container = $('.data-search'); //Đối tượng cần ẩn
                    
                    if (!container.is(e.target) && container.has(e.target).length === 0) // Nếu click bên ngoài đối tượng container thì ẩn nó đi
                    {
                    $('.data-search').html('')
                    }
                });
                }
            });
        }
    </script>
@endsection