<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $setting = $this->setting->select('location')->first();;


        $response = [
            'location' => $setting->location
        ];

        return response()->json($response);
    }
}
