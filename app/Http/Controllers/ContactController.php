<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        $setting = $this->setting->select('email')->first();
        Mail::to($setting->email)->send(new ContactMail($data));

        return back();
    }
}
