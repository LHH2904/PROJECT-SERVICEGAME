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
            <div class="card-header">Cập nhật phụ kiện Game</div>
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
                <a href="{{route('accessories.index')}}" class="btn btn-success">Liệt kê phụ kiện game</a>
                <a href="{{route('accessories.create')}}" class="btn btn-success">Thêm phụ kiện game</a>
                <form action="{{route('accessories.update', [$accessories->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="..." value="{{$accessories->title}}">  
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Thuộc Game</label>
                        <select class="form-select form-control" name="category_id">
                            @foreach ($category as $key => $cate)
                            <option {{$cate->id==$accessories->category_id ? 'selected' : ''}} value="{{$cate->id}}">{{$cate->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status</label>
                        <select class="form-select form-control" name="status" required>
                            @if($accessories->status == 1)
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                            @else
                            <option value="1">Hiển thị</option>
                            <option value="0" selected>Không hiển thị</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật phụ kiện</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
