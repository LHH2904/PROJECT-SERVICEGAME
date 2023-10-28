<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Video;

class IndexController extends Controller
{
    public function home()
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category', 'slider', 'blogs_huongdan'));
    }

    public function dichvu() //dịch vụ
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.services', compact('slider', 'blogs_huongdan'));
    }

    public function dichvucon($slug) //dịch vụ
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.sub_services', compact('slug', 'slider', 'blogs_huongdan'));
    }

    public function danhmuc_game($slug) //dịch vụ
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.category', compact('slider', 'blogs_huongdan'));
    }

    public function danhmuccon($slug) //dịch vụ
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.sub_category', compact('slug', 'slider', 'blogs_huongdan'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'blogs')->paginate(4);
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.blogs', compact('slider', 'blogs', 'blogs_huongdan'));
    }

    public function blogs_detail($slug)
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $blog = Blog::where('slug', $slug)->first();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.blog_detail', compact('slider', 'blog', 'blogs_huongdan'));
    }

    public function video_highlight()
    {
        $videos = Video::orderBy('id', 'DESC')->where('status', 1)->paginate(2);
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.video', compact('slider', 'videos', 'blogs_huongdan'));
    }

    public function show_video(Request $request)
    {
        $data = $request->all();
        $video = Video::find($data['id']);
        $output['video_title'] = $video->title;
        $output['video_description'] = $video->description;
        $output['video_link'] = $video->link;
        echo json_encode($output);
    }
}
