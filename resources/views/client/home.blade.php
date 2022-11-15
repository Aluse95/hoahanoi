@extends('client.layouts.app')

@section('title')
  Trang chủ
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
              <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div>
              <a href="{{ $item->product_alias }}" class="wrap-img">
                <img src={{ $item->image }} class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                <a href="{{ $item->product_alias }}" class="card-title">{{ $item->name }}</a>
                <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span></span>{{number_format($item->price)}}<span class="vnd">đ</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container-products pt-5">
    <div class="container px-3 pb-3">
      <div class="product-heading d-flex justify-content-between align-items-center mb-2">
        <h3 class="text-white heading-detail m-0">BÓ HOA ĐẸP</h3>
        <a href="bo-hoa-dep" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="row">
        @foreach($bo_hoa_dep as $item)
          <div class="col-lg-3 col-sm-4 col-6 p-3">
            <div class="card position-relative">
              <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div>
              <div class="wrap-img">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </div>
              <div class="card-body text-center">
                <a href="{{ $item->product_alias }}" class="card-title">{{ $item->name }}</a>
                <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span></span>{{number_format($item->price)}}<span class="vnd">đ</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container-products pt-5">
    <div class="container px-3 pb-3">
      <div class="product-heading d-flex justify-content-between align-items-center mb-2">
        <h3 class="text-white heading-detail m-0">GIỎ HOA ĐẸP</h3>
        <a href="gio-hoa-dep" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="row">
        @foreach($gio_hoa_dep as $item)
          <div class="col-lg-3 col-sm-4 col-6 p-3">
            <div class="card position-relative">
              <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div>
              <div class="wrap-img">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </div>
              <div class="card-body text-center">
                <a href="{{ $item->product_alias }}" class="card-title">{{ $item->name }}</a>
                <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span></span>{{number_format($item->price)}}<span class="vnd">đ</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container-products pt-5">
    <div class="container px-3 pb-3">
      <div class="product-heading d-flex justify-content-between align-items-center mb-2">
        <h3 class="text-white heading-detail m-0">HOA SÁP</h3>
        <a href="hoa-sap" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="row">
        @foreach($hoa_sap as $item)
          <div class="col-lg-3 col-sm-4 col-6 p-3">
            <div class="card position-relative">
              <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div>
              <div class="wrap-img">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </div>
              <div class="card-body text-center">
                <a href="{{ $item->product_alias }}" class="card-title">{{ $item->name }}</a>
                <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span></span>{{number_format($item->price)}}<span class="vnd">đ</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container-products pt-5">
    <div class="container px-3 pb-3">
      <div class="product-heading d-flex justify-content-between align-items-center mb-2">
        <h3 class="text-white heading-detail m-0">HOA CHÚC MỪNG KHAI TRƯƠNG</h3>
        <a href="hoa-chuc-mung-khai-truong" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="row">
        @foreach($hoa_khai_truong as $item)
          <div class="col-lg-3 col-sm-4 col-6 p-3">
            <div class="card position-relative">
              <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div>
              <div class="wrap-img">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
              </div>
              <div class="card-body text-center">
                <a href="{{ $item->product_alias }}" class="card-title">{{ $item->name }}</a>
                <p class="card-text text-center mt-3"><span class="old-price mr-3">{{number_format($item->old_price)}}<span class="vnd">đ</span></span>{{number_format($item->price)}}<span class="vnd">đ</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container-slide">
    <div class="container px-3 py-5">
      <div class="container-heading d-flex justify-content-between align-items-center mb-5">
        <h3 class="text-white heading-detail m-0">HOA CHIA BUỒN</h3>
        <a href="hoa-chia-buon" class="view-all">Xem tất cả <i class="fa-solid fa-angle-right ml-2"></i></a>
      </div>
      <div class="wrap-slide p-4">
        <div class="swiper2">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($hoa_chia_buon as $item)
              <div class="swiper-slide">
                <div class="card position-relative p-3">
                  {{-- <div class="sale-off position-absolute d-flex"><span class="m-auto">{{round(100*($item->old_price - $item->price)/$item->old_price)}}%</span></div> --}}
                  <div class="wrap-img slide-img">
                    <img src="{{ $item->image }}" class="card-img-top img-fluid" alt="...">
                  </div>
                  <div class="card-body text-center">
                    <a href="" class="card-title">{{ $item->name }}</a>
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
            <div class="wrap-img wrap-img_news">
              <img src="{{ $item->image }}" class="img-fluid w-100 h-100" alt="...">
            </div>
            <div class="card-body text-left">
              <a href="" class="card-title">{{ $item->name }}</a>
              <p class="text-news mt-3">{{ $item->content }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <a href="tin-tuc" class="btn btn-news my-3">Xem thêm</a>
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