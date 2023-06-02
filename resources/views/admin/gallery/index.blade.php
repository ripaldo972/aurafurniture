@extends('admin.layouts.general')

@section('content')
<div class="col-md-12">
    <h1>GALLERY PRODUCT</h1>
</div>

<div class="col-md-4 mb-3">
    <h3>Add New Category</h3>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-select" required>

            </select>
            <span class="text-muted"><i>Products are the key to adding to the gallery.</i></span> <br>
        </div>
        <div class="mb-3">
            <label class="form-lable">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
            <span class="text-muted"><i>We recommend an image size for categories of <b>100 x 100 pixels</b>.</i></span>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Add New Category</button>
        </div>
    </form>
</div>
@endsection
