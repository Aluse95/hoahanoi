@extends('client.layouts.app')

@section('title')
    Thanh toán
@endsection

@section('container')
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 pay-wrap">
                    <h3 class="my-4">Thông tin thanh toán</h3>
                    <div class="form-group d-flex">
                        <input class="w-50 mr-4 py-2 px-3" type="text" name="name" placeholder="Tên">
                        <input class="w-50 py-2 px-3" type="text" name="fistname" placeholder="Họ">
                    </div>
                    <div class="form-group">
                        <input class="w-100 py-2 px-3 mt-3" type="text" name="address" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <input class="w-100 py-2 px-3 mt-3" type="text" name="post" placeholder="Mã bưu điện">
                    </div>
                    <div class="form-group">
                        <input class="w-100 py-2 px-3 mt-3" type="text" name="city" placeholder="Tỉnh/Thành phố">
                    </div>
                    <div class="form-group">
                        <input class="w-100 py-2 px-3 mt-3" type="text" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input class="w-100 py-2 px-3 mt-3" type="text" name="email" placeholder="Địa chỉ email">
                    </div>
                    <h3 class="my-4">Thông tin bổ sung</h3>
                    <div class="form-group">
                      <textarea class="form-control pay-text p-3" name="note" rows="5" placeholder="Ghi chú về đơn hàng, vd: thời gian hay địa chỉ cụ thể"></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="pay-detail my-5 py-4 px-5">
                        <h3 class="my-4">Đơn hàng của bạn</h3>
                        <div class="pay-title d-flex justify-content-between font-weight-bold">
                            <p class="mb-2">SẢN PHẨM</p>
                            <p class="mb-2">THÀNH TIỀN</p>
                        </div>
                        @foreach ($data as $item)
                            <div class="pay-product d-flex justify-content-between py-3">
                                <div class="d-flex">
                                    <div class="pay-name">{{ $item->name }}</div>
                                    <div class="pay-name ml-3 mr-1">x {{ number_format($item->pivot->quantity) }}</div>
                                </div>
                                <div>{{ number_format($item->price * $item->pivot->quantity) }} đ</div>
                            </div>
                            <div class="d-none">{{ $total += $item->price * $item->pivot->quantity }}</div>
                            <input type="hidden" name="product[{{ $item->name }}]" value="{{ $item->pivot->quantity }}">
                        @endforeach
                        <div class="pay-current d-flex justify-content-between my-3">
                            <p class="font-weight-bold">Tạm tính</p>
                            <p>{{ number_format($total) }} đ</p>
                        </div>
                        <div class="pay-discount">
                            <p class="font-weight-bold">Bạn có mã giảm giá?</p>
                            <div class="form-group">
                                <input class="pay-text w-50 py-2 px-3" id="discount" type="text" name="discount" placeholder="Nhập mã giảm giá"><span id="check-discount" class="ml-3"></span>
                            </div>
                        </div>
                        <div class="pay-total d-flex justify-content-between font-weight-bold my-3">
                            <p>Tổng thanh toán</p>
                            <p id="current" class="d-none">{{$total}}</p>
                            <p class="pink-color" id="sale-price">{{ number_format($total) }} đ</p>
                            <input type="hidden" id="total" name="price" value="{{ number_format($total) }} đ">
                        </div>
                        <div class="pay-bank">
                            <input type="radio" id="bank" checked name="payment" value="bank">
                            <label for="bank">Chuyển khoản ngân hàng</label><br>
                            <p id="pay-rule">Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                        </div>
                        <div class="my-3 pay-cash">
                            <input type="radio" id="cash" name="payment" value="cash">
                            <label for="cash">Trả tiền mặt khi nhận hàng</label><br>
                        </div>
                        <input type="checkbox" id="rule" name="rule" value="rule">
                        <label for="rule">Tôi đã đọc và đồng ý với <a href="" class="pink-color">điều khoản và điều kiện</a> của website</label><br>
                        <button type="submit" disabled class="btn pay-btn px-3 py-0 my-3">Đặt hàng</button>
                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="" class="pink-color">chính sách riêng tư.</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>

        $("#cash").click(function () {
            $("#pay-rule").slideUp();
        });
        $("#bank").click(function () {
            $("#pay-rule").slideDown();
        });
        $("#rule").click(function () {
            if($("#rule").prop('checked')) {
                $(".pay-btn").removeAttr('disabled')
            } else {
                $(".pay-btn").attr('disabled', true)
            }
        });

        $('#discount').keyup(function() {

            $.ajax({
                url : "discount",
                type : "get",
                data : {
                    content : $('#discount').val()
                },
                success : function (data){
                    var price = $('#current').html()*data
                    $('#sale-price').html(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' đ')

                    $('#total').val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' đ')

                    if(data != 1) {
                        $('#check-discount').html('<i class="fa-solid fa-check"></i>')
                    } else {
                        $('#check-discount').html('')
                    }
                }
            });
        })

    </script>
@endsection