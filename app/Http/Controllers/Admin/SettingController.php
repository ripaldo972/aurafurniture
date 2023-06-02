<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $setting = $this->setting->getAll();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('logo')) {

            $logo = $request->logo;
            $newLogo = time().Str::random(30).'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logo'), $newLogo);

        } else {

            $newLogo = null;

        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'tiktok' => $request->tiktok,
            'whatsapp' => $request->whatsapp,
            'location' => $request->location,
            'logo' => $newLogo
        ];

        $this->setting->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        if ($request->file('logo')) {

            $setting = $this->setting->getById($id);

            $logo = $request->logo;
            $newLogo = time().Str::random(30).'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logo'), $newLogo);
            File::delete(public_path('uploads/logo/').$setting->logo);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'whatsapp' => $request->whatsapp,
                'location' => $request->location,
                'logo' => $newLogo
            ];

        } else {

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'whatsapp' => $request->whatsapp,
                'location' => $request->location,
            ];

        }

        $this->setting->updateData($data, $id);
        return back();
    }
}
