@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liệt kê Video Game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('video.create')}}" class="btn btn-success">Thêm Video Game</a>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Video</th>
                                <th>Slug</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Video</th>
                                <th>Quản lý</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$video->title}}</td>
                                <td>{{$video->slug}}</td>
                                <td>{!!$video->description!!}</td>
                                <td>
                                    @if($video->status == 0)
                                    Không hiển thị
                                    @else
                                    Hiển thị
                                    @endif
                                </td>
                                <td><img src="{{asset('uploads/video/'.$video->image)}}" alt="" width="150px" height="100px"></td>
                                <td><span>{{$video->link}}</span></td>
                                <td>
                                    <form action="{{route('video.destroy', [$video->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa bài viết game này không?')" class="btn btn-danger">Xóa</button>
                                    </form>
                                    <a href="{{route('video.edit',$video->id)}}" class="btn btn-warning">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$videos->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection
