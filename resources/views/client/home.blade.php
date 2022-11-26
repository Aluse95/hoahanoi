@extends('client.layouts.app')

@section('title')
  Trang chủ
@endsection

@section('nav')
<div class="container">
  <ul class="nav-list d-flex justify-content-center list-unstyled text-uppercase m-0"> 
    <li class="nav-item"><a href="{{ route('home') }}" class="active">Trang chủ</a></li>
    @foreach ($cats as $item)
      <li class="nav-item position-relative nav-border">
        <a href="{{route('danh-muc',['alias'=>$item->cat_alias])}}" class="nav-item_link">{{ $item->name }}</a>
      </li>
    @endforeach
  </ul>
</div>
@endsection

@section('nav-mobile')
<ul class="nav-mobile_list p-0 ml-3 list-unstyled">
  <li class="nav-mobile_item"><a href="{{ route('home') }}">Trang chủ</a></li>
  @foreach ($all_cats as $item)
        <li class="nav-mobile_item"><a href="{{route('danh-muc',['alias'=>$item->cat_alias])}}">{{ $item->name }}</a></li>
    @endforeach
</ul>
@endsection

@section('slide')
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <img class="w-100 h-100" src="{{ asset('client/assets/image/slide.jpg') }}" alt="">
      </div>
      <div class="swiper-slide">
        <img class="w-100 h-100" src="{{ asset('client/assets/image/slide.jpg') }}" alt="">
      </div>
      <div class="swiper-slide">
        <img class="w-100 h-100" src="{{ asset('client/assets/image/slide.jpg') }}" alt="">
      </div>
    </div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
@endsection

@section('container')
  <div class="container-intro">
    <div class="container px-3 pb-4">
      <h1 class="text-center pt-5 pb-4 title-intro">Hanoi Florist - Shop hoa tươi Hà Nội - Dịch vụ Điện hoa Hà Nội chuyên nghiệp, tận tâm</h1>
      <h1 class="text-center title-list m-0 mb-3">NHỮNG MẪU HOA SIÊU ƯU ĐÃI TUẦN NÀY</h1>
      <div class="row">
        @foreach($hoa_tuan_nay as $item)
          <div class="col-lg-3 col-sm-6 col-6 p-3">
            <div class="card position-relative">
              @if ($item->old_price)
                <div class="sale-off position-absolute d-flex">
                  <span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span>
                </div>
              @endif
              <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="wrap-img">
                  <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                  <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="card-title">{{$item->name}}</a>
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
  @foreach ($total as $key => $value)
  <div class="container-products pt-5">
    <div class="container px-3 pb-3">
      <div class="product-heading d-flex justify-content-between align-items-center mb-2">
        <h3 class="text-white heading-detail m-0">{{ $key }}</h3>
        @foreach ($cats as $cat)
          @if ($cat->name == $key)
            <a href="{{route('danh-muc',['alias'=>$cat->cat_alias])}}" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
          @endif
        @endforeach
      </div>
      <div class="row">
        @foreach($value as $item)
          <div class="col-lg-3 col-sm-4 col-6 p-3">
            <div class="card position-relative">
              @if ($item->old_price)
                <div class="sale-off position-absolute d-flex">
                  <span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span>
                </div>
              @endif
              <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="wrap-img">
                  <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                  <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="card-title">{{$item->name}}</a>
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
  @endforeach
  <div class="container-slide">
    <div class="container px-3 py-5">
      <div class="container-heading d-flex justify-content-between align-items-center mb-5">
        <h3 class="text-white heading-detail m-0">HOA CHIA BUỒN</h3>
        <a href="danh-muc/hoa-chia-buon" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="wrap-slide p-4">
        <div class="swiper2">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($hoa_chia_buon as $item)
              <div class="swiper-slide">
                <div class="card position-relative p-3">
                  <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="wrap-img slide-img">
                      <img src="{{ $item->image }}" class="card-img-top img-fluid" alt="...">
                  </a>
                  <div class="card-body text-center">
                      <a href="{{route('san-pham',['alias'=>$item->product_alias])}}" class="card-title">{{$item->name}}</a>
                      <p class="card-text text-center mt-3">{{number_format($item->price)}}<span class="vnd">đ</span></p>
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
  </div>
  <div class="container-news">
    <div class="container px-3 py-5 text-center">
      <h3 class="news-heading mt-3 mb-4">TIN TỨC - BÀI VIẾT</h3>
      <hr>
      <div class="row">
        @foreach ($news as $item)
        <div class="col-lg-3 col-md-6 col-12 p-4">
          <div class="card position-relative">
            {{-- <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div> --}}
            <a href="{{route('bai-viet',['alias'=>$item->news_alias])}}" class="wrap-img wrap-img_news">
              <img src="{{ $item->image }}" class="img-fluid w-100 h-100" alt="...">
            </a>
            <div class="card-body text-left">
              <a href="{{route('bai-viet',['alias'=>$item->news_alias])}}" class="card-title">{{ $item->name }}</a>
              <p class="text-news mt-3">{{ $item->content }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <a href="{{route('news')}}" class="btn btn-news my-3">Xem thêm</a>
    </div>
  </div>
  <div class="container-service">
    <hr>
    <div class="container px-3">
      <div class="row pt-3 pb-4">
        <div class="col-md-4 col-sm-4 col-12">
          <div class="row">
            <div class="col-3 pl-3">
              <img class="img-fluid w-100" src="client/assets/image/service1.png" alt="">
            </div>
            <div class="col-9 pr-5 pl-1">
              <h3 class="service-title mb-4">Shop hoa tươi Hà Nội giao hoa tận nhà</h3>
              <p class="service-detail">Hanoi Florist - Shop hoa tươi Hà Nội giao hoa tận nhà. Giao hoa tận tay người nhận chuyên nghiệp, tận tâm</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12">
          <div class="row">
            <div class="col-3 pl-3">
              <img class="img-fluid w-100" src="client/assets/image/service2.png" alt="">
            </div>
            <div class="col-9 pr-5 pl-1">
              <h3 class="service-title mb-4">Hanoi Florist - Shop hoa tươi Hà Nội</h3>
              <p class="service-detail">Hanoi Florist - Shop hoa tươi Hà Nội giao hoa tận nhà. Giao hoa tận tay người nhận chuyên nghiệp, tận tâm</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12">
          <div class="row">
            <div class="col-3 pl-3">
              <img class="img-fluid w-100" src="client/assets/image/service3.png" alt="">
            </div>
            <div class="col-9 pr-3 pl-1">
              <h3 class="service-title mb-4">Điện hoa Hà Nội</h3>
              <p class="service-detail">Điện hoa Hà Nội cung cấp dịch vụ hoa sinh nhật Hà Nội, hoa khai trương Hà Nội đẹp nhất</p>
              <p class="inbox-fanpage"><span class="inbox-title">Inbox trực tiếp tại Fanpage:</span> Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</p>
            </div>
          </div>
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

    const swiper = new Swiper('.swiper', {
      // Optional parameters
      loop: true,
      autoplay: {
        delay: 5000,
      },
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    const swiper2 = new Swiper('.swiper2', {
        // Optional parameters
        slidesPerView: 5,
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
            slidesPerView: 5,
            spaceBetween: 15
          }
        }
      });
  </script>

@endsection