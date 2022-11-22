@extends('client.layouts.app')

@section('title')
    {{$news->name}}
@endsection

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('container')

<div class="container-data py-5">
    <div class="container wrap-data p-5">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="link-path mb-4"><a href="{{route('home')}}">Trang chủ</a><span class="mx-2">></span><a href="./">Tin tức</a><span class="mx-2">></span><a href="">{{$news->name}}</a></div>
                <h1 class="text-dark">{{$news->name}}</h1>
                <p class="desc-text">{!!$news->content!!}</p>
                <div class="news-detail_img w-75 mx-auto my-5">
                    <img class="img-fluid w-100 h-100" src="{{ $news->image }}" alt="">
                </div>
                <h2>Đặt hoa chúc mừng khai trương cửa hàng tại Hanoi Florist</h2>
                <p class="desc-text">{!!$news->description!!}</p>
                <h4 class="mb-5">Hanoi Florist - Dich Vụ Điện Hoa Hà Nội Giao Hoa Tận Nơi</h4>
                <h4 class="mb-5">Inbox trực tiếp tại Fanpage: <span class="pink-color">Điện hoa Hà Nội - Shop hoa tươi Hanoi Florist</span></h4>
                <h4 class="mb-5">Zalo /Imess : Ms Huyền - 0902133725 Hotline: 0886291555</h4>
                <h4 class="">141/236 Giáp Nhị - Hoàng Mai - Hà Nội</h4>
                <hr>
                {{-- Comment --}}
                <h2 class="comment-heading mb-4 mt-3">Phản hồi về bài viết</h2>

                @foreach ($all_cmt as $item)
                    @if ($item->news_id == $news->id)
                        <div class="comment" id="comment_{{$item->id}}">
                            <h3 class="mb-3">{{ $item->user->name }}</h3>
                            <div class="comment-detail">{{ $item->content }}</div>
                            <div class="comment-action d-flex mt-2 ml-3">
                                <p onclick="like({{ $item->id }})" class="comment-like mr-3 mb-2" id="comment-like_{{ $item->id }}">Thích</p>
                                <p onclick="reply({{ $item->id }})" class="comment-rep mb-2" >Trả lời</p>
                                {{-- <p onclick="del({{ $item->id }})" class="comment-del mb-2 ml-3" >Xóa</p> --}}
                            </div>
                            @if(Auth::check())
                                <div class="rep-content mb-3" id="rep-content_{{ $item->id }}">
                                    <h3 class="mb-3 ml-5">{{ Auth::user()->name }}</h3>
                                    <input class="input-rep w-75 py-3 px-4 ml-5" type="text" name="input-rep" id="input-rep_{{ $item->id }}">
                                    <button class="btn btn-rep p-0"  onclick="reply_ajax({{ $item->id }})">Gửi</button>
                                </div>
                            @endif
                            <div id="new-reply_{{$item->id}}"></div>
                            {{-- Reply Comment --}}
                            @foreach ($all_rep as $rep)
                                @if ($rep->comment_id == $item->id)
                                    <div class="mb-3 ml-5">
                                        <h3 class="mb-3">{{ $rep->user->name }}</h3>
                                        <div class="comment-detail">{{ $rep->content }}</div>
                                    </div>
                                    <div class="comment-action d-flex mt-2 ml-5">
                                        <p onclick="rep_like({{ $rep->id }})" class="comment-like mr-3 mb-2" id="rep-like_{{ $rep->id }}">Thích</p>
                                        <p onclick="rep_rep({{ $rep->id }})" class="comment-rep mb-2" >Trả lời</p>
                                    </div>
                                    @if(Auth::check())
                                    <div class="rep-rep mb-3" id="rep-rep_{{ $rep->id }}">
                                        <h3 class="mb-3 ml-5">{{ Auth::user()->name }}</h3>
                                        <input class="input-rep w-75 py-3 px-4 ml-5" type="text" name="input-rep" id="input-rep_{{ $rep->id }}">
                                        <button class="btn btn-rep p-0"  onclick="reply_ajax({{ $rep->id }})">Gửi</button>
                                    </div>
                                    <div id="new-reply_{{$rep->id}}"></div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach

                <div class="new-comment mt-4" id="new-comment"></div>
                @if (Auth::check())                 
                    <div class="comment-wrap p-5 mt-5">
                        <h2 class="mb-4">Bình luận về bài viết</h2>
                        <div class="form-group">
                        <textarea class="form-control comment-content px-4 py-3" name="comment-content" id="comment-content" rows="4"></textarea>
                        </div>
                        <div class="btn btn-primary btn-comment mt-3 p-0" onclick="comment_ajax()">Phản hồi</div>
                    </div>
                @else 
                    <a href="{{route('login')}}" class="btn btn-order btn-warning">Đăng nhập để bình luận</a>
                @endif
            </div>
            <div class="col-lg-3 container-data_list">
                <h3 class="heading-detail m-0 py-4">Bài viết liên quan</h3>              
                <ul class="data-list data-list_detail list-unstyled p-0 m-0">
                    @foreach ($all_news as $item)
                        <li class="data-item d-flex align-items-center p-3">
                            <div class="wrap-data_img mr-3">
                                <img class="img-fluid h-100" src="{{ $item->image }}" alt="">
                            </div>
                            <a href="{{ $item->news_alias }}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>                       
                    @endforeach
                </ul>
                <h3 class="heading-detail m-0 py-4">Sản phẩm mới</h3>              
                <ul class="data-list data-list_detail list-unstyled p-0 m-0">
                    @foreach ($all_product as $item)
                        <li class="data-item d-flex align-items-center p-3">
                            <div class="wrap-data_img mr-3">
                                <img class="img-fluid h-100" src="{{ $item->image }}" alt="">
                            </div>
                            <a href="{{ $item->product_alias }}" class="data-link data-link_detail">{{ $item->content }}</a>
                        </li>                       
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function comment_ajax(){
            
            $.ajax({
                url : "comment/add",
                type : "post",
                data : {
                    content : $('#comment-content').val(),
                    news_id : {{ $news->id}}
                },
                success : function (data){
                    $('#new-comment').append(
                    `<div class="comment" id="comment_${data['id']}">
                        <h3 class="mb-3">{{ Auth::check() ? Auth::user()->name : '' }}</h3>
                        <div class="comment-detail">${data['content']}</div>
                        <div class="comment-action d-flex mt-2 ml-3">
                            <p onclick="like(${data['id']})" class="comment-like mr-3 mb-2" id="comment-like_${data['id']}">Thích</p>
                            <p onclick="reply(${data['id']})" class="comment-rep mb-2" >Trả lời</p>
                            </div>
                            <div class="rep-content mb-3" id="rep-content_${data['id']}">
                                <h3 class="mb-3 ml-5">{{ Auth::check() ? Auth::user()->name : '' }}</h3>
                                <input class="input-rep w-75 py-3 px-4 ml-5" type="text" name="input-rep" id="input-rep_${data['id']}">
                                <button class="btn btn-rep p-0 ml-2"  onclick="reply_ajax(${data['id']})">Gửi</button>
                            </div>
                            @if(Auth::check())
                            @endif
                            <div id="new-reply_${data['id']}">
                        </div>
                    </div>`)

                    $('#comment-content').val('')
                }
            });
        }

        function reply_ajax(id){
            
            $.ajax({
                url : "comment/reply",
                type : "post",
                data : {
                    content : $('#input-rep_'+ id).val(),
                    comment_id : id
                },
                success : function (data){
                    
                    $('#new-reply_'+ id).append(
                    `<div class="mb-3 ml-5">
                        <h3 class="mb-3">{{ Auth::check() ? Auth::user()->name : '' }}</h3>
                        <div class="comment-detail">${data['content']}</div>
                    </div>
                    <div class="comment-action d-flex mt-2 ml-5">
                        <p onclick="rep_like(${data['id']})" class="comment-like mr-3 mb-2" id="rep-like_${data['id']}">Thích</p>
                        <p onclick="rep_rep(${data['id']})" class="comment-rep mb-2" >Trả lời</p>
                    </div>
                    @if(Auth::check())
                        <div class="rep-rep mb-3" id="rep-rep_${data['id']}">
                            <h3 class="mb-3 ml-5">{{ Auth::check() ? Auth::user()->name : '' }}</h3>
                            <input class="input-rep w-75 py-3 px-4 ml-5" type="text" name="input-rep" id="input-rep_${data['id']}">
                            <button class="btn btn-rep p-0 ml-2"  onclick="reply_ajax(${data['id']})">Gửi</button>
                        </div>
                        <div id="new-reply_${data['id']}"></div>
                    @endif`)
                    $('#rep-content_'+ id).hide()
                    $('#rep-rep_'+ id).hide()
                    $('#input-rep_'+ id).val('')
                }
            });
        }
       
        function like(id) {
            
            if($('#comment-like_'+ id).hasClass('blue')) {
                $('#comment-like_'+ id).removeClass('blue')
            } else {
                $('#comment-like_'+ id).addClass('blue')
            }
        }

        function rep_like(id) {
            if($('#rep-like_'+ id).hasClass('blue')) {
                $('#rep-like_'+ id).removeClass('blue')
            } else {
                $('#rep-like_'+ id).addClass('blue')
            }
        }

        function reply(id) {
            $('#rep-content_'+ id).show()
        }
        function rep_rep(id) {
            $('#rep-rep_'+ id).show()
        }

    </script>
@endsection
