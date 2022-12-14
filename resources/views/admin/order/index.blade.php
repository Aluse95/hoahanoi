@extends('admin.layouts.app')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <form action="order/del" method="post" class="h-100">
        @csrf
        <div class="content h-100 p-5">
            <h2 class="text-center mt-2">Danh sách đơn hàng</h2>
            <a href="{{ route('admin.order.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Order</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%"><input type="checkbox" id="check"></th>
                        <th>Name</th>
                        <th class="address">Address</th>
                        <th class="phone">Phone</th>
                        <th class="email">Email</th>
                        <th class="product">Product</th>
                        <th class="note">Note</th>
                        <th class="price" style="width:8%">Price</th>
                        <th style="width:8%">Status</th>
                        <th style="width:8%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center"><input class="checkbox" type="checkbox" name="order_id[]" value="{{ $item->id }}"></td>
                            <td>
                                <div class="content-detail">{{ $item->name }}</div>
                            </td>
                            <td class="address">
                                <div class="content-detail">{{ $item->address }}</div>
                            </td>
                            <td class="phone">
                                <div class="content-detail">{{ $item->phone }}</div>
                            </td>
                            <td class="email">
                                <div class="content-detail">{{ $item->email }}</div>
                            </td>
                            <td class="product">
                                <div class="content-detail">{{ $item->product }}</div>
                            </td>
                            <td class="note">
                                <div class="content-detail">{{ $item->note }}</div>
                            </td>
                            <td class="price">
                                <div class="content-detail">{{ $item->price }}</div>
                            </td>
                            <td class="text-center pt-2" id="order_{{$item->id}}">
                                @if ($item->status == 1)
                                    <div class="btn btn-success btn-update mt-3">Đã giao</div>
                                @else
                                    Đang giao
                                    <button type="button" onclick="complete_ajax({{$item->id}})" class="btn btn-primary btn-update mt-2">Cập nhật</button>
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('admin.order.edit', ['id'=> $item->id])}}" class="btn btn-warning btn-product">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </a>
                                <a onclick="return(confirm('Bạn muốn xóa đơn hàng này không ?'))" 
                                href="{{route('admin.order.del', ['id'=> $item->id])}}" class="btn btn-danger">
                                <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>

    </form>

@endsection

@section('js')
    <script>
        $("#check").click(function () {
            if($("#check").prop('checked')) {
                $(".checkbox").attr('checked', true)
            } else {
                $(".checkbox").removeAttr('checked')
            }
        });

        function complete_ajax(id) {

            $.ajax({
                url : "order/complete",
                type : "get",
                data : {
                    id : id
                },
                success : function (data){
                    $('#order_'+ id).html(
                        '<div class="btn btn-success btn-update mt-3">Đã giao</div>'
                    )
                }
            });
        }
    </script>
@endsection
