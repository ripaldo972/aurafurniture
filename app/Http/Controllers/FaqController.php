<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        $faq = $this->faq->select('title', 'content', 'meta_keywords', 'meta_description', 'image')->first();
        return view('faq', compact('faq'));
    }
}
