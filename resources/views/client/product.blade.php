@extends('client.layouts.app')

@section('title')
    {{$product->name}}
@endsection

@section('container')
    
    <div class="container-data py-5">
        <div class="container wrap-data p-5">
            @if ($errors->any())
                <div class="alert alert-danger text-center py-4">Vui lòng kiểm tra lại dữ liệu nhập!</div>
            @endif
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 px-3">
                            <img class="img-fluid w-100" src="{{$product->image}}" alt="">
                        </div>
                        <div class="col-lg-6 col-12 px-3">
                            <div class="row pb-4">
                                <div class="link-path ml-3"><a href="./">Trang chủ</a><span class="mx-2">></span><a href="./{{$cat->cat_alias}}">{{$cat->name}}</a><span class="mx-2">></span><a href="">{{$product->name}}</a></div>
                            </div>
                            <h1 class="text-dark">{{$product->name}}</h1>
                            <p class="card-text">{{ number_format($product->price)}}<span class="vnd">đ</span></p>
                            <p class="desc-text">{!!$product->content!!}</p>
                            <h4 class="mb-4 ">Hanoi Florist - Dich Vụ Điện Hoa Hà Nội Giao Hoa Tận Nơi</h4>
                            <h4 class="mb-4 ">Inbox trực tiếp tại Fanpage: <span class="pink-color">Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</span></h4>
                            <h4 class="mb-4 ">Zalo /Imess : Ms Huyền - 0902133725 Hotline: 0886291555</h4>
                            <h4 class="">141/236 Giáp Nhị - Hoàng Mai - Hà Nội</h4>
                            <h3 class="my-4">Tiêu chí của chúng tôi</h3>
                            <ul class="data-list p-3 m-0">
                                <li class="data-service">Chọn lọc kĩ lưỡng từng bông hoa tươi đẹp nhất!</li>
                                <li class="data-service">Cập nhật các xu hướng hoa cưới mới nhất!</li>
                                <li class="data-service">Mức giá cạnh tranh nhất!</li>
                                <li class="data-service">Giao hàng nhanh nhất trong nội thành Hà Nội</li>
                                <li class="data-service">Hoàn tiền 100% nếu bạn không hài lòng</li>
                            </ul>                           
                            <form action="cart/add" method="POST" class="d-flex align-items-center pt-4 pb-2">
                                @csrf                           
                                <div class="d-flex align-items-center">
                                    <button class="sub" type="button">-</button>
                                    <input class="number text-center" type="text" value="1" name="quantity">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button class="add" type="button">+</button>
                                </div>
                                <button type="submit" class="add-product ml-5 px-4 py-0 text-white border-0">Thêm vào giỏ hàng</button>
                            </form>
                            <hr>
                            <p class="desc-text">Từ khóa: <span class="pink-color">hoa chúc mừng sinh nhật người yêu</span></p>
                            <ul class="list-unstyled d-flex p-0 mb-5 social-icon_detail">
                                <li class="social-item mr-2 social-item_facebook">
                                <a href="" class="social-icon_link d-flex"><i class="m-auto fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li class="social-item mr-2 social-item_twitter">
                                <a href="" class="social-icon_link d-flex"><i class="m-auto ml-2 fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="social-item mr-2 social-item_email">
                                <a href="" class="social-icon_link d-flex"><i class="m-auto ml-2 fa-solid fa-envelope"></i></a>
                                </li>
                                <li class="social-item mr-2 social-item_pints">
                                <a href="" class="social-icon_link d-flex"><i class="m-auto ml-2 fa-brands fa-pinterest"></i></i></a>
                                </li>
                                <li class="social-item mr-2 social-item_facebook">
                                <a href="" class="social-icon_link d-flex"><i class="m-auto ml-2 fa-brands fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>                       
                    </div>
                    <hr class="mb-0">
                    <h3 class="title-desc text-dark d-inline-block pt-3">MÔ TẢ</h3>
                    <p class="desc-text">{!!$product->description!!}</p>
                    <div class="desc-list my-3">
                        <ul class="p-3 m-0">
                            @foreach ($desc as $item)
                                <li><a href="">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <h4 class="mb-5">Hanoi Florist - Dich Vụ Điện Hoa Hà Nội Giao Hoa Tận Nơi</h4>
                    <h4 class="mb-5">Inbox trực tiếp tại Fanpage: <span class="pink-color">Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</span></h4>
                    <h4 class="mb-5">Zalo /Imess : Ms Huyền - 0902133725 Hotline: 0886291555</h4>
                    <h4 class="">141/236 Giáp Nhị - Hoàng Mai - Hà Nội</h4>
                    <div class="desc-img text-center py-5">
                        <img class="img-fluid h-100" src="{{$product->image}}" alt="">
                        <p class="desc-text pb-4 m-0">{{$product->name}}</p>
                    </div>
                    <hr>
                    <h2>Sản phẩm tương tự</h2>
                    <div class="wrap-slide2">
                        <div class="swiper3">
                          <!-- Additional required wrapper -->
                          <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($product_like as $item)
                                <div class="swiper-slide">
                                    <div class="card position-relative">
                                    {{-- <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div> --}}
                                    <a href="{{$item->product_alias}}" class="wrap-img wrap-img_like">
                                        <img src="{{$item->image}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body text-center">
                                        <a href="{{$item->product_alias}}" class="card-title">{{$item->name}}</a>
                                        <p class="card-text card-text_price text-center mt-3">{{number_format($item->price)}}<span class="vnd">đ</span></p>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                          <!-- If we need navigation buttons -->
                          <div class="swiper-button-prev"></div>
                          <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 container-data_list">
                    @include('client.sitebar')
                    <h3 class="heading-detail m-0 py-4">Bài viết mới</h3>
                    <ul class="data-list data-list_detail list-unstyled p-0 m-0">
                        @foreach ($news as $item)
                            <li class="data-item d-flex align-items-center p-3">
                                <div class="wrap-data_img mr-3">
                                    <img class="img-fluid w-100 h-100" src="{{ $item->image }}" alt="">
                                </div>
                                <a href="{{ $item->news_alias }}" class="data-link data-link_detail">{{ $item->content }}</a>
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
        const swiper2 = new Swiper('.swiper3', {
            // Optional parameters
            slidesPerView: 4,
            spaceBetween: 15,
            slidesPerGroup: 2,
            loopFillGroupWithBlank: true,
            loop: true,
            autoplay: {
            delay: 5000,
            disableOnInteraction: false
            },
            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
            breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 15
            }
            }
        });

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