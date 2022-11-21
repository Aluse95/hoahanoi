@extends('admin.layouts.app')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <form action="order/del" method="post">
        @csrf
        <div class="content p-4">
            <h2 class="text-center mt-2">Danh sách đơn hàng</h2>
            <a href="{{ route('admin.order.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Order</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%"><input type="checkbox" id="check"></th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Note</th>
                        <th>Price</th>
                        <th>Status</th>
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
                            <td>
                                <div class="content-detail">{{ $item->address }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->phone }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->email }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->product }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->note }}</div>
                            </td>
                            <td>
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
                            <td class="text-center pt-4">
                                <a href="{{route('admin.order.edit', ['id'=> $item->id])}}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return(confirm('Bạn muốn xóa danh mục này không ?'))" href="{{route('admin.order.del', ['id'=> $item->id])}}" class="btn btn-danger"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></a>
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
