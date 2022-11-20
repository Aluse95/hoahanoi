@extends('admin.layouts.app')

@section('title')
    Quản lý sản phẩm
@endsection

@section('content')
    <form action="product/del" method="post">
        @csrf
        <div class="content p-4">
            <a href="{{ route('admin.product.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Product</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:3%"><input type="checkbox" id="check"></th>
                        <th style="width:9%">Product</th>
                        <th style="width:9%">Alias</th>
                        <th>Category</th>
                        <th style="width:6%">Price</th>
                        <th style="width:7%">Old Price</th>
                        <th>Content</th>
                        <th>Description</th>
                        <th style="width:12%">Image</th>
                        <th style="width:5%">Status</th>
                        <th style="width:7%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center"><input class="checkbox" type="checkbox" name="product_id[]" value="{{ $item->id }}"></td>
                            <td>
                                <div class="content-detail">
                                    {{ $item->name }}
                                </div>
                            </td>
                            <td>
                                <div class="content-detail">
                                    {{ $item->product_alias }}
                                </div>
                            </td>
                            <td>{{ $item->cat->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->old_price }}</td>
                            <td>
                                <div class="content-detail">
                                    {!! $item->content !!}
                                </div>
                            </td>
                            <td>
                                <div class="content-detail">
                                    {!! $item->description !!}
                                </div>
                            </td>
                            <td>
                                <div class="content-detail">
                                    {{ $item->image }}
                                </div>
                            </td>
                            <td class="text-center pt-4">{{ $item->status }}</td>
                            <td class="text-center pt-4">
                                <a href="{{route('admin.product.edit', ['id'=> $item->id])}}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return(confirm('Bạn muốn xóa sản phẩm này không ?'))" href="{{route('admin.product.del', ['id'=> $item->id])}}" class="btn btn-danger"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></a>
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
