<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    protected $workshop;

    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function index()
    {
        $workshops = $this->workshop->select('title', 'address', 'date', 'image')->orderBy('id', 'desc')->paginate(12);
        return view('workshop', compact('workshops'));
    }
}
