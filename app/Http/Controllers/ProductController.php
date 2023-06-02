<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    protected $product;
    protected $gallery;
    protected $setting;

    public function __construct(Product $product, GalleryProduct $gallery, Setting $setting)
    {
        $this->product = $product;
        $this->gallery = $gallery;
        $this->setting = $setting;
    }

    public function index()
    {
        $products = $this->product->select('name', 'slug', 'product_category_id', 'price', 'image')->orderBy('id', 'desc')->paginate(24);
        return view('product', compact('products'));
    }

    public function detail($slug)
    {
        $product = $this->product->where('slug', $slug)->first();
        $gallery = $this->gallery->where('product_id', $product->id)->get();
        return view('product-detail', compact('product', 'gallery'));
    }

    public function order(Request $request, $id)
    {
        $product = $this->product->getById($id);

        if ($product->status == 1) {
            $status = "In Stock";
        } else {
            $status = "Out of Stock";
        }

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'product_name' => $product->name,
            'category' => $product->productCategory->name,
            'status' => $status,
            'price' => $product->price,
            'image' => asset('uploads/product/'.$product->image)
        ];

        $setting = $this->setting->select('email')->first();
        Mail::to($setting->email)->send(new OrderMail($data));

        return back();
    }
}
