@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê danh mục Game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục game</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Quản lý</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $cate)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$cate->title}}</td>
                                <td>{{$cate->description}}</td>
                                <td>
                                    @if($cate->status == 0)
                                    Không hiển thị
                                    @else
                                    Hiển thị
                                    @endif
                                </td>
                                <td><img src="{{asset('uploads/category/'.$cate->image)}}" alt="" width="150px" height="100px"></td>
                                <td>Doe</td>
                                <td><a href="" class="btn btn-danger">Xóa</a><a href="" class="btn btn-warning">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
