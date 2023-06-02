<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    protected $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        $faq = $this->faq->getAll();
        return view('admin.faqs.index', compact('faq'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:faqs,title,',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/faq'), $newImage);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'image' => $newImage
        ];

        $this->faq->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $faq = $this->faq->getById($id);

        $this->validate($request, [
            'title' => 'required|string|max:255|unique:faqs,title,'.$faq->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {
            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/faq'), $newImage);
            File::delete(public_path('uploads/faq/').$faq->image);

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

        $this->faq->updateData($data, $id);

        return back();
    }
}
