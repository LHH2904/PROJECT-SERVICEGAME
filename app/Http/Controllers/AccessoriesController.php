<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use App\Models\Category;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessories::with('category')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.accessories.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.accessories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $access = new Accessories();
        $access->title = $data['title'];
        $access->category_id = $data['category_id'];
        $access->status = $data['status'];
        $access->save();

        return redirect()->back();
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
        $category = Category::orderBy('id', 'DESC')->get();
        $accessories = Accessories::find($id);
        return view('admin.accessories.edit', compact('category', 'accessories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = request()->all();
        $access = Accessories::find($id);
        $access->title = $data['title'];
        $access->category_id = $data['category_id'];
        $access->status = $data['status'];
        $access->save();

        return redirect()->route('accessories.index')->with('status', 'Cập nhật phụ kiện thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $access = Accessories::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa phụ kiện Game thành công');
    }
}
