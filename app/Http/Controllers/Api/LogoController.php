<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LogoController extends Controller
{

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $setting = $this->setting->getAll();

        if (!empty($setting)) {

            $logo = asset('uploads/logo/'.$setting->logo);

        } else {

            $logo = 'no-image.png';

        }

        $response = [
            'logo' => $logo
        ];

        return response()->json($response);
    }
}
