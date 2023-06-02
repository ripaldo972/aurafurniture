<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    protected $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }
    public function index()
    {
        $about = $this->about->select('title', 'content', 'image', 'meta_keywords', 'meta_description')->first();
        return view('about', compact('about'));
    }
}
