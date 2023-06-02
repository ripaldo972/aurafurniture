<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {

        $products = $this->product->select('name', 'slug', 'product_category_id', 'price', 'image')->orderBy('id')->take(12)->get();
        return view('dashboard', compact('products'));
    }


}
