<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        return view('pages.home');
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