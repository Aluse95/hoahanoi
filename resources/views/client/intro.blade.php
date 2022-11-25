@extends('client.layouts.app')

@section('title')
    Giới thiệu
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
@endsection

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-12">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-fluid w-100" src="client/assets/image/intro.jpg" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h3>Hoa tươi chính là thứ làm lên linh hồn của mọi sự kiện, mọi đám cưới dù truyền thống hay hiện đại.</h3>
                        <p class="desc-text">
                            Với sức mạnh truyền tải thông điệp và ý nghĩa, cùng với vẻ đẹp rực rỡ đến từ màu sắc và mùi hương, hoa
                            tươi luôn là thứ không thể thiếu trong mọi dịp lễ quan trọng cho đến những khoảnh khắc bình yên thường
                            ngày. Vậy nhưng, có một sự thật vô cùng đau lòng rằng những bông hoa đẹp và đắt đỏ kia lại nhanh chóng
                            bị vứt bỏ ngay sau khi sự kiện kết thúc.
                        </p>
                    </div>
                </div>
                <p class="desc-text mb-5">
                    Với sự rung cảm cao về hoa tươi, đồng thời cũng là nỗi niềm “thương hoa tiếc ngọc”, Điện Hoa Hà Nội đã ra đời 
                    với sứ mệnh cung cấp các sản phẩm hoa tươi cao cấp, hoa nghệ thuật phục vụ các nhu cầu của cá nhân và doanh 
                    nghiệp về hoa và đặc biệt là điện hoa.<br>
                    Bằng việc biến lợi nhuận trở thành giá trị cho mọi khách hàng, cùng tâm hồn yêu cái đẹp và mong muốn được 
                    “ kể” tâm tư của mình qua từng bông hoa, chúng tôi đã nhanh chóng trở thành thương hiệu hoa tươi được ưa 
                    thích tại Hà Nội hiện nay.  Đội ngũ của chúng tôi luôn không ngừng cố gắng truyền tải vẻ đẹp và thông điệp 
                    vô cùng ý nghĩa của hoa tươi tới cộng đồng.<br>Nâng niu từng bông hoa, tỉ mỉ chọn cách phối màu, hết lòng tư 
                    vấn và cẩn thận giao hoa đến tận tay khách hàng,
                    Điện Hoa Hà Nội luôn khiến khách hàng hài lòng từ chất lượng sản phẩm và tác phong phục vụ chuyên nghiệp 
                    tận tâm. Nhưng trên tất cả những điều này, đây chính là sự trân trọng của chúng tôi dành cho những bông 
                    hoa này.
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-12 container-data_list">
                <h3 class="heading-detail m-0 py-4">Bài viết mới</h3>
                <ul class="data-list data-list_detail list-unstyled p-0 m-0">
                    @foreach ($news as $item)
                        <li class="data-item d-flex align-items-center p-3">
                            <div class="wrap-data_img mr-3">
                                <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                            </div>
                            <a href="bai-viet/{{ $item->news_alias }}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>
                    @endforeach
                </ul>
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