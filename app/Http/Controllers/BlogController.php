<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(6);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->content = $data['content'];
        $blog->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName(); //hinh.jpg
            $name_image = current(explode('.', $get_name_image)); //hinh . jpg (current lấy được cái tên -> hinh, end lấy được cái đuôi-> jpg)
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //hinh12.jpg
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }

        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogs = Blog::find($id);
        // bỏ hình ảnh cũ đã lưu trong uploads
        $path_unlink = 'uploads/blog/' . $blogs->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $blogs->delete();
        return redirect()->back();
    }
}