@extends('client.layouts.app')

@section('title')
    Liên hệ với chúng tôi
@endsection

@section('nav')
<div class="container">
    <ul class="nav-list d-flex justify-content-center list-unstyled text-uppercase m-0"> 
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-item_link active">Trang chủ</a></li>
        @foreach ($cats as $item)
            <li class="nav-item position-relative nav-border">
                <a href="danh-muc/{{$item->cat_alias}}" class="nav-item_link">{{ $item->name }}</a>
            </li>
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
    <div class="container">
        <h1 class="my-5 text-center">Liên hệ với chúng tôi</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h4 class="mb-5">Hanoi Florist - Dich Vụ Điện Hoa Hà Nội Giao Hoa Tận Nơi</h4>
                <h4 class="mb-5">Inbox trực tiếp tại Fanpage: <span class="pink-color">Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</span></h4>
                <h4 class="mb-5">Zalo /Imess : Ms Huyền - 0902133725 Hotline: 0886291555</h4>
                <h4 class="mb-5">141/236 Giáp Nhị - Hoàng Mai - Hà Nội</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <img class="img-fluid w-75 d-block mx-auto" src="client/assets/image/order.jpg" alt="">
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