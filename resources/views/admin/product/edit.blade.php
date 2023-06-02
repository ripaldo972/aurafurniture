@extends('admin.layouts.general')

@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/plugin/summernote/summernote-lite.css')}}">
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <div class="d-flex justify-content-between">
        <h1>EDIT PRODUCT</h1>
        <div>
            <a href="{{ route('product.index') }}">Product</a> / <span>View</span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <form action="{{ route('product.update', Crypt::encrypt($product->id)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Astro Cloud Software Developer" class="form-control form-title mb-2" id="nameProduct" onkeyup="permalink()" value="{{ $product->name }}">
                    <div>Permalink : {{url('/')}}/product/<span id="setName">{{ $product->slug }}</span> </div>
                </div>
                <div class="mb-3">
                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="d-flex justify-content-end">
                    <div class="card card-95">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="product_category_id" class="form-select" required>
                                    @foreach ($categories as $result)
                                        <option value="{{ $result->id }}"
                                            @if ($product->product_category_id == $result->id)
                                                selected
                                            @endif
                                        >{{ $result->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Rp. 20.000" value="{{ $product->price }}">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Width (cm)</label>
                                        <input type="number" min="0" class="form-control" name="width" placeholder="100" value="{{ $product->width }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Height (cm)</label>
                                        <input type="number" min="0" class="form-control" name="height" placeholder="100" value="{{ $product->height }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Wide (cm)</label>
                                        <input type="number" min="0" class="form-control" name="wide" placeholder="100" value="{{ $product->wide }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" placeholder="SEO for google" value="{{ $product->meta_keyowrds }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" style="height: 100px;" placeholder="SEO for google">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <div class="d-flex justify-content-between">
                                        <span>Image</span>
                                        @if ($product->image !== null)
                                            <a href="{{ asset('uploads/product/'.$product->image) }}" target="_blank">Lihat gambar</a>
                                        @endif
                                    </div>
                                </label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" @if($product->status == 1) selected @endif>In Stock</option>
                                    <option value="0" @if($product->status == 0) selected @endif>Out of Stock</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/plugin/summernote/summernote-lite.js')}}"></script>

<script>
    $('#description').summernote({
        placeholder: 'Create your description here',
        tabsize: 2,
        height: 560,
        toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
        ]
    });
</script>

<script src="{{asset('assets/admin/dist/js/permalink.js')}}"></script>
@endsection
