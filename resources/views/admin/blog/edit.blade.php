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
            <div class="card-header">Cập nhật bài viết</div>
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
                <a href="{{route('blog.index')}}" class="btn btn-success">Liệt kê danh sách bài viết</a>
                <a href="{{route('blog.create')}}" class="btn btn-primary">Thêm mới bài viết</a>
                <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="..." id="slug" value="{{$blog->title}}" onkeyup="ChangeToSlug()">  
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="convert_slug" value="{{$blog->slug}}" placeholder="...">  
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                        <img src="{{asset('uploads/blog/'.$blog->image)}}" alt="" width="150px" height="100px">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="desc_blog" placeholder="...">{{$blog->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="content" id="content_blog" placeholder="...">{{$blog->content}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status</label>
                        <select class="form-select form-control" name="status" required>
                            @if($blog->status == 1)
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
