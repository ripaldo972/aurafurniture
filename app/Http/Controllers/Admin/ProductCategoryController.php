<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    protected $category;

    public function __construct(ProductCategory $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getAll();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:product_categories,name',
            'description' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {

            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $newImage);

        } else {

            $newImage = null;

        }

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $newImage
        ];

        $this->category->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->getById($id);

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:product_categories,name,'.$category->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {

            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $newImage);
            File::delete(public_path('uploads/category/').$category->image);

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

        $this->category->updateData($data, $id);

        return back();

    }

    public function destroy($id)
    {
        $category = $this->category->getById($id);

        if ($category->image !== null) {
            File::delete(public_path('uploads/category/').$category->image);
        }

        $this->category->deleteData($id);

        return back();
    }
}
