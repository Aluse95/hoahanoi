@extends('client.layouts.app')

@section('title')
    Tin tức
@endsection

@section('nav')
<div class="container">
  <ul class="nav-list d-flex justify-content-center list-unstyled text-uppercase m-0"> 
    <li class="nav-item"><a href="{{ route('home') }}" class="nav-item_link active">Trang chủ</a></li>
    @foreach ($cats as $item)
      <li class="nav-item"><a href="danh-muc/{{$item->cat_alias}}" class="nav-item_link">{{ $item->name }}</a></li>
    @endforeach
  </ul>
</div>
@endsection

@section('nav-mobile')
<ul class="nav-mobile_list p-0 ml-3 list-unstyled">
  <li class="nav-mobile_item"><a href="{{ route('home') }}">Trang chủ</a></li>
  @foreach ($cats as $item)
        <li class="nav-mobile_item"><a href="danh-muc/{{$item->cat_alias}}">{{ $item->name }}</a></li>
    @endforeach
</ul>
@endsection

@section('container')

<div class="container-data py-5">
    <div class="container wrap-data p-5">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="row align-items-center">
                    @foreach ($news as $item)
                        <div class="col-lg-3 col-12 mb-5">
                            <a href="bai-viet/{{$item->news_alias}}" class="news-img">
                                <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-9 col-12 mb-5">
                            <a href="bai-viet/{{$item->news_alias}}" class="news-title">{{$item->name}}</a>
                            <p class="desc-text news-text">{!!$item->content!!}</p>
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
                            <a href="bai-viet/{{$item->news_alias}}" class="data-link data-link_detail">{{ $item->content }}</a>
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
                            <a href="san-pham/{{$item->product_alias}}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>                       
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
    <script>
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
                    `<a href="san-pham/${value['product_alias']}" class="item-search p-3">
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