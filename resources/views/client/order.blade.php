@extends('client.layouts.app')

@section('title')
    Giỏ hàng
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
        @if ($data->count() > 0)
            @if (session('message'))
                <div class="alert-order alert alert-success text-center m-0 py-3">
                    {{ session('message') }}
                </div>
            @endif
            <h2 class="text-center mb-5 mt-3">THÔNG TIN GIỎ HÀNG (<a href="{{route('logout')}}" class="mx-2">Đăng xuất</a>)</h2>
            <form action="{{route('cart.update')}}" method="POST">
                @csrf
                <table class="table table-bordered text-center table-order">
                    <tr>
                        <th class="product-sp">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    @foreach ($data as $item)          
                        <tr>
                            <td class="d-flex justify-content-start align-items-center">
                                <a href="cart/del/{{ $item->pivot->id }}"><i class="fa-solid fa-xmark mr-4 cancel-order"></i></a>
                                <div class="img-order mr-4">
                                    <img src="{{ $item->image }}" alt="" class="img-fluid w-100 h-100">
                                </div>
                                <div class="product-name">{{ $item->name }}</div> 
                            </td>
                            <td><div class="mt-4">{{ number_format($item->price) }}<span class="vnd ml-2">đ</span></div></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <button class="sub" type="button">-</button>
                                    <input type="hidden" name="product_{{$item->id}}" value="{{ $item->id }}">
                                    <input class="number text-center" type="text" name="flower[{{ $item->id }}]" value="{{ $item->pivot->quantity }}">
                                    <button class="add" type="button">+</button>
                                </div>
                            </td>
                            <td><div class="mt-4">{{ number_format($item->price * $item->pivot->quantity) }}<span class="vnd ml-2">đ</span></div></td>
                            <td class="d-none">{{ $total += $item->price * $item->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn-order btn btn-success pt-1 mt-3">Cập nhật</button>
                <a href="{{route('home')}}" class="btn-order btn btn-primary ml-3 pt-1 mt-3">Quay lại</a>
                <div class="btn float-right btn-total">Tổng tiền</div>
            </form>
            <div class="text-right mb-5">
                <a href="{{route('payment')}}" class="btn-order btn btn-info mr-3 mb-2 pt-1">Thanh toán tại đây</a>
                <div class="total-price px-4 mr-5">{{ number_format($total) }}<span class="vnd ml-2">đ</span></div>
            </div>
        @else
            <div class="w-25 mx-auto">
                <img class="img-fluid w-100 h-100 d-block" src="client/assets/image/hinh-anh-buon-31.jpg" alt="">
            </div>
            <h2 class="text-center my-5 text-danger">Đơn hàng trống, vui lòng thêm sản phẩm</h2>
        @endif
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

        const subs = document.querySelectorAll('.sub');
        const adds = document.querySelectorAll('.add');
        const numbers = document.querySelectorAll('.number')

        subs.forEach(function(sub, i) {
            const number = numbers[i]
            sub.onclick = function() {
                if(number.value > 0) {
                    number.value--;
                }
            }
        })
        adds.forEach(function(add, i) {
            const number = numbers[i]
            add.onclick = function() {
                number.value++;
            }
        })
    </script>
@endsection
@section('js')
    <script>

    </script>
@endsection