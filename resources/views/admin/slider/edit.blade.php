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
            <div class="card-header">Cập nhật Slider</div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{route('slider.index')}}" class="btn btn-success">Liệt kê Slider</a>
                <form action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="..." value="{{$slider->title}}">  
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" type="file" name="image"><br>
                        <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" width="500px" height="150px">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="...">{{$slider->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status</label>
                        <select class="form-select form-control" name="status" required>
                            @if($slider->status == 1)
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                            @else
                            <option value="1">Hiển thị</option>
                            <option value="0" selected>Không hiển thị</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
