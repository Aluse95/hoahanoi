@extends('admin.layouts.app')

@section('title')
    Quản lý mã giảm giá
@endsection

@section('content')
    <form action="discount/del" method="post" class="h-100">
        @csrf
        <div class="content h-100 p-5">
            <h2 class="text-center mt-2">Danh sách mã giảm giá</h2>
            <a href="{{ route('admin.discount.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Category</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%"><input type="checkbox" id="check"></th>
                        <th>Name</th>
                        <th>Sale off</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="text-center">
                            <td class="text-center"><input class="checkbox" type="checkbox" name="discount_id[]" value="{{ $item->id }}"></td>
                            <td>
                                <div class="content-detail">{{ $item->name }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->sale_off * 100 }} %</div>
                            </td>
                            <td class="text-center pt-3">
                                @if ($item->status == 1)
                                    Hoạt động
                                @else
                                    Vô hiệu
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('admin.discount.edit', ['id'=> $item->id])}}" class="btn btn-warning btn-product btn-dis ml-2">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </a>
                                <a onclick="return(confirm('Bạn muốn xóa mã này không ?'))" 
                                href="{{route('admin.discount.del', ['id'=> $item->id])}}" class="btn btn-danger ml-2">
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
    </script>
@endsection
