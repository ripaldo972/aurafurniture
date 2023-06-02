<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactInformationController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $contacts = $this->setting->select('name','email', 'address', 'phone')->first();

        $response = [
            'status' => Response::HTTP_OK,
            'data' => $contacts
        ];

        return response()->json($response);
    }
}
