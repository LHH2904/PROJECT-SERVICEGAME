<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function home()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category'));
    }

    public function dichvu() //dịch vụ
    {
        return view('pages.services');
    }

    public function dichvucon($slug) //dịch vụ
    {
        return view('pages.sub_services', compact('slug'));
    }

    public function danhmuc() //dịch vụ
    {
        return view('pages.category');
    }

    public function danhmuccon($slug) //dịch vụ
    {
        return view('pages.sub_category', compact('slug'));
    }
}
