<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->getAll();

        $remapp = [];
        foreach ($sliders as $value) {

            if ($value->image !== null) {
                $image = asset('uploads/slider/'.$value->image);
            } else {
                $image = asset('default_image/slider-default.jpg');
            }

            $data = [
                'name' => $value->name,
                'description' => $value->description,
                'image' => $image
            ];

            array_push($remapp, $data);

        }

        $response = [
            'status' => Response::HTTP_OK,
            'data' => $remapp
        ];

        return response()->json($response);
    }
}
