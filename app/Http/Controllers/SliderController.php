<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->paginate(2);
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:slider|max:255',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_with=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required'
            ],
            [
                'title.unique' => 'Tên Slider game đã có xin vui lòng điền tên khác',
                'title.required' => 'Tên Slider game phải có',
                'description.required' => 'Mô tả Slider game phải có nhé',
                'image.required' => 'Hình ảnh Slider game phải có nhé',
            ]
        );
        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];
        // thêm hình ảnh vào folder
        $get_image = $request->image;
        $path = 'uploads/slider/';

        $get_name_image = $get_image->getClientOriginalName(); // [hinhabc].jpg lấy tên hình
        $name_image = current(explode('.', $get_name_image));

        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $slider->image = $new_image;

        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Thêm Slider Game thành công');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_with=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required'
            ],
            [
                'title.required' => 'Tên Slider game phải có',
                'description.required' => 'Mô tả Slider game phải có nhé',
            ]
        );
        $slider = Slider::find($id);
        $slider->title = $data['title'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];
        // thêm hình ảnh vào folder
        $get_image = $request->image;
        if ($get_image) {
            // bỏ hình ảnh cũ đã lưu trong uploads
            $path_unlink = 'uploads/slider/' . $slider->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            // Thêm hình ảnh mới
            $path = 'uploads/slider/';
            $get_name_image = $get_image->getClientOriginalName(); // [hinhabc].jpg lấy tên hình
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $slider->image = $new_image;
        }

        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Cập nhật Slider Game thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        // bỏ hình ảnh cũ đã lưu trong uploads
        $path_unlink = 'uploads/slider/' . $slider->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $slider->delete();
        return redirect()->back();
    }
}
