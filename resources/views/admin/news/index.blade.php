@extends('admin.layouts.app')

@section('title')
    Quản lý bài viết
@endsection

@section('content')
    <form action="news/del" method="post" class="h-100">
        @csrf
        <div class="content h-100 p-5">
            <h2 class="text-center mt-2">Danh sách bài viết</h2>
            <a href="{{ route('admin.news.add') }}" class="btn btn-control btn-primary mb-4 mr-2">Add News</a>
            <button type="submit" class="btn-control btn btn-danger mb-4">Delete Option</button>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%"><input type="checkbox" id="check"></th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th class="image">Image</th>
                        <th class="content2">Content</th>
                        <th class="desc">Description</th>
                        <th style="width:8%">Status</th>
                        <th style="width:8%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center"><input class="checkbox" type="checkbox" name="news_id[]" value="{{ $item->id }}"></td>
                            <td>
                                <div class="content-detail">{{ $item->name }}</div>
                            </td>
                            <td>
                                <div class="content-detail">{{ $item->news_alias }}</div>
                            </td>
                            <td class="image">
                                <div class="content-detail">{{ $item->image }}</div>
                            </td>
                            <td class="content2">
                                <div class="content-detail">{{ $item->content }}</div>
                            </td>
                            <td class="desc">
                                <div class="content-detail">{{ $item->description }}</div>
                            </td>

                            <td class="text-center pt-3" id="news_{{$item->id}}">
                                @if ($item->status == 1)
                                    Hoạt động
                                @else
                                    Không hoạt động
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('admin.news.edit', ['id'=> $item->id])}}" class="btn btn-warning btn-product">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </a>
                                <a onclick="return(confirm('Bạn muốn xóa bài viết này không ?'))" href="{{route('admin.news.del', ['id'=> $item->id])}}" class="btn btn-danger">
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
