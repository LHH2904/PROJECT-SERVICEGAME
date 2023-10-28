<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'DESC')->paginate(3);
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $video = new Video();
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->link = $data['link'];
        $video->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName(); //hinh.jpg
            $name_image = current(explode('.', $get_name_image)); //hinh . jpg (current lấy được cái tên -> hinh, end lấy được cái đuôi-> jpg)
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //hinh12.jpg
            $get_image->move($path, $new_image);
            $video->image = $new_image;
        }

        $video->save();
        return redirect()->route('video.index')->with('status', 'Thêm Video thành công');
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
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $video = Video::find($id);
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->link = $data['link'];
        $video->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName(); //hinh.jpg
            $name_image = current(explode('.', $get_name_image)); //hinh . jpg (current lấy được cái tên -> hinh, end lấy được cái đuôi-> jpg)
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //hinh12.jpg
            $get_image->move($path, $new_image);
            $video->image = $new_image;
        }

        $video->save();
        return redirect()->route('video.index')->with('status', 'Cập nhật Video thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::find($id);
        // bỏ hình ảnh cũ đã lưu trong uploads
        $path_unlink = 'uploads/video/' . $video->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $video->delete();
        return redirect()->route('video.index');
    }
}