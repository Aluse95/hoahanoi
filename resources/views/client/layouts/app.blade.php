<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    {{-- Required meta tags --}}
    @yield('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/10af5283a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    {{-- Bootstrap CSS  --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/responsive.css') }}">
  </head>
  <body>
    <div class="app">
      {{-- Header content --}}
      <div class="header-top">
        <div class="container">
          <div class="row py-2">
            <div class="col-lg-6 col-md-12 col-sm-12 text-white pl-0 d-flex">
              <p class="m-0 header-text h-100">Điện hoa Hà Nội - Dịch vụ Hoa Tươi chuyên nghiệp và uy tín</p>
            </div>
            <div class="col-lg-6 pr-0">
              <ul class="d-flex list-unstyled justify-content-end align-items-center m-0 h-100">
                <li><a href="{{ route('intro') }}" class="header-top_item px-3">Giới thiệu</a></li>
                <li class="item-border"><a href="{{ route('contact') }}" class="header-top_item px-3">Liên hệ</a></li>
                <li class="item-border"><a href="{{ route('news') }}" class="header-top_item px-3">Tin tức</a></li>
                <li class="item-border"><a href="{{ route('cart') }}" class="header-top_item px-3">Giỏ hàng</a></li>
                <div class="social-icon">
                  <a href="https://www.facebook.com/hanoiflorist.238"><i class="social-icon_head text-white ml-2 fa-brands fa-facebook-f"></i></a>
                  <a href="https://www.instagram.com/ciel.flower.shop"><i class="social-icon_head text-white ml-2 fa-brands fa-instagram insta"></i></a>
                  <a href="https://twitter.com/HoaYeuThuongVN"><i class="social-icon_head text-white ml-2 fa-brands fa-twitter"></i></a>
                  <a href="mailto:huyenduong.dh111@gmail.com"><i class="social-icon_head text-white ml-2 fa-solid fa-envelope"></i></a>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header-main d-flex align-items-center justify-content-center">
        <div class="icon-menu ml-4 mb-0 d-lg-none">
          <img class="img-fluid w-100" src="{{asset('client/assets/image/menu.png')}}">
        </div>
        <div class="container px-0">
          <div class="row align-items-center py-3 m-0">
            <div class="col-lg-3 col-12 pr-2 pl-0">
              <a class="d-flex justify-content-center logo-img" href="{{ route('home') }}">
                <img class="img-fluid h-100" src="{{asset('client/assets/image/logo.jpg')}}" alt="">
              </a>
            </div>
            <div class="header-main_search col-lg-6 d-flex align-items-center position-relative">
              <input class="search_input pl-3" id="search_input" type="text" placeholder="Tìm kiếm sản phẩm...">
              <div onclick="search_ajax()" class="btn-search text-white border-0"><i class="fa-solid fa-magnifying-glass mt-3"></i></div>
              <div class="data-search"></div>
            </div>
            <div class="header-main_contact col-lg-3 pr-0">
              <img class="img-fluid float-right" src="{{asset('client/assets/image/order.jpg')}}" alt="">
            </div>
            {{-- Nav-mobile --}}
            <div class="nav-overlay"></div>
            <div class="nav-mobile py-5">
              <label for="input-check" class="nav-mobile_close">
                <i class="fa-solid fa-xmark"></i>
              </label>
              <div class="p-4">
                <img class="img-fluid w-100 p-2" src="{{asset('client/assets/image/order.jpg')}}" alt="">
              </div>
              {{-- <div class="d-flex align-items-center p-4 pb-5">
                <input class="search_input pl-3" type="text" placeholder="Tìm kiếm sản phẩm...">
                <div class="btn-search text-white border-0"><i class="fa-solid fa-magnifying-glass mt-3"></i></div>
              </div> --}}
              @yield('nav-mobile')
            </div>
          </div>
        </div>
        <a href="cart" class="icon-cart mr-4 d-lg-none">
          <img class="img-fluid w-100 float-right" src="{{asset('client/assets/image/icon-cart.png')}}" alt="">
        </a>
      </div>
      <div class="header-nav">
        @yield('nav')
      </div>
      <div class="header-bottom"></div>
    
      @yield('slide')
  
      @yield('container')
    
      <div class="container-bg"></div>
      </div> 
      <div class="footer">
        <div class="container px-3 py-5">
          <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="footer-logo mb-5">
                  <img class="img-fluid h-100" src="{{asset('client/assets/image/logo.jpg')}}" alt="">
                </div>
                <h3 class="footer-title mb-4">Hanoi Florist - Shop hoa tươi Online tại Hà Nội</h3>
                <p class="footer-text">Tự hào là một trong những Shop hoa tươi cung cấp các dịch vụ hoa tươi chuyên nghiệp và uy tín nhất, chúng tôi mong muốn nhận được nhiều hơn nữa sự tin tưởng và ủng hộ của khách hàng.</p>
                <ul class="list-unstyled d-flex p-0 mb-4 ">
                  <li class="social-item mr-2 social-facebook">
                    <a href="https://www.facebook.com/hanoiflorist.238" class="footer-social_icon d-flex"><i class="m-auto text-white fa-brands fa-facebook-f"></i></a>
                  </li>
                  <li class="social-item mr-2 social-email">
                    <a href="mailto:huyenduong.dh111@gmail.com" class="footer-social_icon d-flex"><i class="m-auto text-white ml-2 fa-solid fa-envelope"></i></a>
                  </li>
                  <li class="social-item mr-2 social-call">
                    <a href="tel:+84886291555" class="footer-social_icon d-flex"><i class="m-auto text-white fa-sharp fa-solid fa-phone"></i></a>
                  </li>
                  <li class="social-item mr-2 social-youtube">
                    <a href="https://www.youtube.com/watch?v=HKwru9159Fg" class="footer-social_icon d-flex"><i class="m-auto text-white fa-brands fa-youtube"></i></a>
                  </li>
                </ul>
                <p class="footer-text mb-2">Mọi ý kiến đóng góp xin gửi về hòm thư:</p>
                <p class="footer-text pink-color m-0">huyenduong.dh111@gmail.com</p>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="footer-logo mb-5">
                  <img class="img-fluid h-100" src="{{asset('client/assets/image/order.jpg')}}" alt="">
                </div>
                <p class="footer-text">Chẳng phải đợi lâu, bạn chỉ cần điện đặt hàng và hoa sẽ được giao tận nơi trong nội thành Hà Nội trong chưa đầy 1h.</p>
                <ul class="footer-list pl-4 m-0">
                  <li class="footer-item"><b>Địa chỉ:</b> Số 141/150 Giáp Nhị, Hoàng Mai, Hà Nội</li>
                  <li class="footer-item"><b>Hotline:</b> 0886 291 555 / 0902 133 725 ( Zalo Ms Huyền)</li>
                  <li class="footer-item"><b>Fanpage:</b><a href="" class="pink-color"> Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</a></li>
                  <li class="footer-item"><b>Email:</b> hoahanoi.flowershop@gmail.com</li>
                </ul>
              </div>
              <div class="col-md-4 col-sm-12">
                <h3 class="footer-title mb-5">Bản đồ đường đi tới Shop</h3>
                <div class="pt-5">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.774423196687!2d105.85977381488287!3d21.001677586013002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac08d2b3e177%3A0x77014243f3a2c51c!2zNDAxIFAuIEtpbSBOZ8awdSwgVsSpbmggVHV5LCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1663143321331!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copy-right">
        <div class="container px-3">
          <div class="row py-4 justify-content-between">
            <p class="m-0">© Bản quyền thuộc về Điện Hoa Hà Nội | Thiết kế website bởi GiuseArt.com</p>
            <p class="m-0">Hotline kỹ thuật: 0972.939.830</p>
          </div>
        </div>
      </div>
    
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </body>
</html>

@yield('js')

<script type="text/javascript">

  $('.icon-menu').click(function() {
    $('.nav-mobile').css("transform","translateX(0)")
    $('.nav-overlay').show()
  })
  $('.nav-overlay').click(function() {
    $('.nav-overlay').hide()
    $('.nav-mobile').css("transform","translateX(-100%)")
  })
  $('.nav-mobile_close').click(function() {
    $('.nav-overlay').hide()
    $('.nav-mobile').css("transform","translateX(-100%)")
  })

  const icons = document.querySelectorAll('.show-data');
  const contents = document.querySelectorAll('.item-detail');
  icons.forEach((icon, index) => {
    const content = contents[index];
    icon.onclick = function() {
      icon.classList.toggle('rotate')
      content.classList.toggle('show')
    }
  });

</script>

