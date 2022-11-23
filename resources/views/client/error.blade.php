@extends('client.layouts.app')

@section('title')
    Page not found
@endsection

@section('nav')
<div class="container">
  <ul class="nav-list d-flex justify-content-center list-unstyled text-uppercase m-0"> 
    <li class="nav-item"><a href="{{ route('home') }}" class="nav-item_link active">Trang chủ</a></li>
    @foreach ($cats as $item)
      <li class="nav-item"><a href="../danh-muc/{{$item->cat_alias}}" class="nav-item_link">{{ $item->name }}</a></li>
    @endforeach
  </ul>
</div>
@endsection

@section('nav-mobile')
<ul class="nav-mobile_list p-0 ml-3 list-unstyled">
  <li class="nav-mobile_item"><a href="{{ route('home') }}">Trang chủ</a></li>
  @foreach ($cats as $item)
        <li class="nav-mobile_item"><a href="../danh-muc/{{$item->cat_alias}}">{{ $item->name }}</a></li>
    @endforeach
</ul>
@endsection

@section('container')
    <div class="container my-5">
        <h2 class="text-center py-5">Đường dẫn không tồn tại, vui lòng quay lại <a href="./">Trang chủ !</a></h2>
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