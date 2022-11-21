@extends('admin.layouts.app')

@section('title')
    Quản lý danh mục
@endsection

@section('content')
    <form action="cat/del" method="post">
        @csrf
        <div class="content p-4">
            <h2 class="text-center mt-2">Danh sách danh mục</h2>
            <a href="{{ route('admin.cat.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Category</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%"><input type="checkbox" id="check"></th>
                        <th>Category</th>
                        <th>Category Alias</th>
                        <th style="width:8%">Status</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center"><input class="checkbox" type="checkbox" name="cat_id[]" value="{{ $item->id }}"></td>
                            <td>
                                <div class="content-detail">{{ $item->name }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->cat_alias }}</div>
                            </td>
                            <td class="text-center pt-3">{{ $item->status }}</td>
                            <td class="text-center pt-3">
                                <a href="{{route('admin.cat.edit', ['id'=> $item->id])}}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return(confirm('Bạn muốn xóa danh mục này không ?'))" href="{{route('admin.cat.del', ['id'=> $item->id])}}" class="btn btn-danger"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></a>
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
