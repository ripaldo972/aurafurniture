<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function index()
    {
        $portfolio = $this->portfolio->getAll();
        return view('admin.portfolio.index', compact('portfolio'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:portfolios,title,',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/portfolio'), $newImage);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'date' => $request->date,
            'address' => $request->address,
            'image' => $newImage
        ];

        $this->portfolio->createData($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $portfolio = $this->portfolio->getById($id);

        $this->validate($request, [
            'title' => 'required|string|max:255|unique:portfolios,title,'.$portfolio->id,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->date) {
            $date = $request->date;
        } else {
            $date = $portfolio->date;
        }

        if ($request->file('image')) {
            $image = $request->image;
            $newImage = time().Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/portfolio'), $newImage);
            File::delete(public_path('uploads/portfolio/').$portfolio->image);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'date' => $date,
                'address' => $request->address,
                'image' => $newImage
            ];
        } else {

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'date' => $date,
                'address' => $request->address,
            ];

        }

        $this->portfolio->updateData($data, $id);

        return back();
    }

    public function destroy($id)
    {
        $portfolio = $this->portfolio->getById($id);

        File::delete(public_path('uploads/portfolio/').$portfolio->image);

        $this->portfolio->deleteData($id);

        return back();
    }
}
