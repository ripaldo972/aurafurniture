@extends('admin.layouts.general')

@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/plugin/summernote/summernote-lite.css')}}">
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <h1>Add New Product</h1>
</div>
<div class="col-md-12">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Astro Cloud Software Developer" class="form-control form-title mb-2" id="nameProduct" onkeyup="permalink()">
                    <div>Permalink : {{url('/')}}/product/<span id="setName"></span> </div>
                </div>
                <div class="mb-3">
                    <textarea name="description" id="description"></textarea>
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
                                        <option value="{{ $result->id }}">{{ $result->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Rp. 20.000">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Width (cm)</label>
                                        <input type="number" min="0" class="form-control" name="width" placeholder="100">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Height (cm)</label>
                                        <input type="number" min="0" class="form-control" name="height" placeholder="100">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Wide (cm)</label>
                                        <input type="number" min="0" class="form-control" name="wide" placeholder="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" placeholder="SEO for google">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" style="height: 100px;" placeholder="SEO for google"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary">Save Changes</button>
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
        height: 480,
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
