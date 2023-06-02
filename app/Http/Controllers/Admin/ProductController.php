<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $gallery;

    public function __construct(Product $product, ProductCategory $category, GalleryProduct $gallery)
    {
        $this->product = $product;
        $this->category = $category;
        $this->gallery = $gallery;
    }

    public function index()
    {
        $products = $this->product->getAll();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->category->getName();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:products,name,',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {

            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $newImage);

        } else {

            $newImage = null;

        }

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'product_category_id' => $request->product_category_id,
            'description' => $request->description,
            'price' => $request->price,
            'width' => $request->width,
            'height' => $request->height,
            'wide' => $request->wide,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'image' => $newImage,
            'status' => 1
        ];

        $this->product->createData($data);

        $this->category->countAdd(Crypt::encrypt($data['product_category_id']));

        return back();
    }

    public function show($id)
    {
        $product = $this->product->getById($id);

        $gallery = $this->gallery->where('product_id', $product->id)->get();

        return view('admin.product.show', compact('product', 'gallery'));
    }

    public function edit($id)
    {
        $product = $this->product->getById($id);
        $categories = $this->category->getName();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->getById($id);

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:products,name,'.$product->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image')) {

            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $newImage);
            File::delete(public_path('uploads/product/').$product->image);

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'product_category_id' => $request->product_category_id,
                'description' => $request->description,
                'price' => $request->price,
                'width' => $request->width,
                'height' => $request->height,
                'wide' => $request->wide,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image' => $newImage,
                'status' => $request->status
            ];

        } else {

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'product_category_id' => $request->product_category_id,
                'description' => $request->description,
                'price' => $request->price,
                'width' => $request->width,
                'height' => $request->height,
                'wide' => $request->wide,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'status' => $request->status
            ];

        }

        if ($product->product_category_id == 0) {
            $this->category->countAdd(Crypt::encrypt($data['product_category_id']));
        }

        $this->product->updateData($data, $id);

        return redirect()->route('product.edit', $id);
    }

    public function destroy($id)
    {
        $product = $this->product->getById($id);
        File::delete(public_path('uploads/product/'). $product->image);

        $this->category->countMinus(Crypt::encrypt($product->product_category_id));

        $this->product->deleteData($id);

        return back();
    }
}
