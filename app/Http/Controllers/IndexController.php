<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;

class IndexController extends Controller
{
    public function home()
    {
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category', 'slider'));
    }

    public function dichvu() //dịch vụ
    {
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.services', compact('slider'));
    }

    public function dichvucon($slug) //dịch vụ
    {
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.sub_services', compact('slug', 'slider'));
    }

    public function danhmuc_game($slug) //dịch vụ
    {
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.category', compact('slider'));
    }

    public function danhmuccon($slug) //dịch vụ
    {
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.sub_category', compact('slug', 'slider'));
    }
}
