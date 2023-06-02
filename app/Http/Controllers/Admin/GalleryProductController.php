<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GalleryProductController extends Controller
{
    protected $gallery;

    public function __construct(GalleryProduct $gallery)
    {
        $this->gallery = $gallery;
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {

            $response = [
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()
            ];

            return response()->json($response);

        }

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/gallery'), $newImage);

        $data = [
            'product_id' => $request->product_id,
            'image' => $newImage
        ];

        $this->gallery->createData($data);

        $response = [
            'status' => Response::HTTP_CREATED,
            'message' => 'Data berhasil disimpan'
        ];

        return response()->json($response);

    }

    public function destroy($id)
    {
        $gallery = $this->gallery->where('id', $id)->first();

        File::delete(public_path('uploads/gallery/').$gallery->image);

        $gallery->delete();

        $response = [
            'status' => Response::HTTP_OK
        ];

        return response()->json($response);
    }

}
