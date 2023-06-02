<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WorkshopController extends Controller
{
    protected $workshop;

    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function index()
    {
        $workshops = $this->workshop->getAll();
        return view('admin.workshop.index', compact('workshops'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:workshops,title,',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/workshop'), $newImage);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'date' => $request->date,
            'address' => $request->address,
            'image' => $newImage
        ];

        $this->workshop->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $workshop = $this->workshop->getById($id);

        $this->validate($request, [
            'title' => 'required|string|max:255|unique:workshops,title,'.$workshop->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->date) {
            $date = $request->date;
        } else {
            $date = $workshop->date;
        }

        if ($request->file('image')) {
            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/workshop'), $newImage);
            File::delete(public_path('uploads/workshop/').$workshop->image);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'date' => $date,
                'address' => $request->address,
                'image' => $newImage
            ];
        } else {

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'date' => $date,
                'address' => $request->address,
            ];

        }

        $this->workshop->updateData($data, $id);

        return back();
    }

    public function destroy($id)
    {
        $workshop = $this->workshop->getById($id);

        File::delete(public_path('uploads/workshop/').$workshop->image);

        $this->workshop->deleteData($id);

        return back();
    }
}
