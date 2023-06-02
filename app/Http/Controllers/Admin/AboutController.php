<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    protected $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }

    public function index()
    {
        $about = $this->about->getAll();
        return view('admin.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:abouts,title,',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/about'), $newImage);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'image' => $newImage
        ];

        $this->about->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $about = $this->about->getById($id);

        $this->validate($request, [
            'title' => 'required|string|max:255|unique:abouts,title,'.$about->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {
            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/about'), $newImage);
            File::delete(public_path('uploads/about/').$about->image);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image' => $newImage
            ];
        } else {

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ];

        }

        $this->about->updateData($data, $id);

        return back();
    }
}
