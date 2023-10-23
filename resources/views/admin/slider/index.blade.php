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
                <div class="card-header">Liệt kê Slider Game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('slider.create')}}" class="btn btn-success">Thêm slider game</a>
                    {{-- slider --}}
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Slider</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Quản lý</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $key => $slide)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$slide->title}}</td>
                                <td>{{$slide->description}}</td>
                                <td>
                                    @if($slide->status == 0)
                                    Không hiển thị
                                    @else
                                    Hiển thị
                                    @endif
                                </td>
                                <td><img src="{{asset('uploads/slider/'.$slide->image)}}" alt="" width="300px" height="150px"></td>
                                <td>
                                    <form action="{{route('slider.destroy', [$slide->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa Slider Game này không?')" class="btn btn-danger">Xóa</button>
                                    </form>
                                    <a href="{{route('slider.edit',$slide->id)}}" class="btn btn-warning">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$slider->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection
