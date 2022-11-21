@extends('admin.layouts.app')

@section('title')
    Quản lý Admin
@endsection

@section('content')

    <div class="content p-4">
        <h2 class="text-center mt-2">Danh sách Admin</h2>
        <a href="{{ route('admin.admin.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add Admin</a>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="text-center">
                    <th style="width:5%"><input type="checkbox" id="check"></th>
                    <th style="width:15%">Name</th>
                    <th style="width:15%">UserName</th>
                    <th>Image</th>
                    <th>Level</th>
                    <th style="width:8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="text-center">
                        <td class="text-center"><input class="checkbox" type="checkbox" name="admin_id[]" value="{{ $item->id }}"></td>
                        <td>
                            <div class="content-detail">{{ $item->name }}</div>
                        </td>
                        <td>
                            <div class="content-detail">{{ $item->username }}</div>
                        </td>
                        <td>
                            <div class="content-detail">{{ $item->image }}</div>
                        </td>
                        <td>
                            <div class="content-detail">{{ $item->level }}</div>
                        </td>
                        <td class="text-center pt-4">
                            <a href="{{route('admin.admin.edit', ['id'=> $item->id])}}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return(confirm('Bạn muốn xóa danh mục này không ?'))" href="{{route('admin.admin.del', ['id'=> $item->id])}}" class="btn btn-danger"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
    </div>


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
