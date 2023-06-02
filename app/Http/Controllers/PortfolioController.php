<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function index()
    {
        $portfolio = $this->portfolio->select('title', 'address', 'date', 'image')->orderBy('id', 'desc')->paginate(12);
        return view('portfolio', compact('portfolio'));
    }
}
