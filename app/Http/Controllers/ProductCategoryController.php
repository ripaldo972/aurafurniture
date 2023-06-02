<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductCategoryController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(ProductCategory $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;

    }

    public function index()
    {
        $categories = $this->category->getData();

        $remapp = [];

        foreach ($categories as $value) {

            $data = [
                'name' => $value->name,
                'slug' => $value->slug,
                'image' => asset('uploads/category/'.$value->image)
            ];

            array_push($remapp, $data);

        }

        $response = [
            'status' => Response::HTTP_OK,
            'data' => $remapp
        ];

        return response()->json($response);

    }

    public function byCategory($slug)
    {
        $category = $this->category->where('slug', $slug)->first();
        $products = $this->product->where('product_category_id', $category->id)->orderBy('id', 'desc')->paginate(24);

        return view('product', compact('products', 'category'));
    }
}
