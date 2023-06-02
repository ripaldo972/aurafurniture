<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->getAll();
        return view('admin.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:sliders,name,',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/slider'), $newImage);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $newImage
        ];

        $this->slider->createData($data);

        return back();

    }

    public function update(Request $request, $id)
    {
        $slider = $this->slider->getById($id);

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:sliders,name,'.$slider->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {
            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/slider'), $newImage);

            File::delete(public_path('uploads/slider/').$slider->image);

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'image' => $newImage
            ];
        } else {

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ];

        }

        $this->slider->updateData($data, $id);

        return back();
    }

    public function destroy($id)
    {
        $slider = $this->slider->getById($id);

        File::delete(public_path('uploads/slider/').$slider->image);

        $this->slider->deleteData($id);

        return back();
    }
}
