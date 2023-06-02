@extends('admin.layouts.general')

@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/plugin/summernote/summernote-lite.css')}}">
@endsection

@section('content')
<div class="col-md-12">
    <h1>ABOUT</h1>
</div>

<div class="col-md-12">
    <form action="@if(!empty($about)) {{ route('about.update', Crypt::encrypt($about->id)) }} @else {{ route('about.store') }} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(!empty($about))
            @method('patch')
        @endif
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Astro Cloud Software Developer" class="form-control form-title mb-2" id="nameProduct" onkeyup="permalink()" @if(!empty($about)) value="{{ $about->title }}" @endif>
                    <div>Permalink : {{url('/')}}/about-us/<span id="setName">@if(!empty($about)){{ $about->slug }} @endif</span> </div>
                </div>
                <div class="mb-3">
                    <textarea name="content" id="content">@if(!empty($about)){{ $about->content }}@endif</textarea>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="d-flex justify-content-end">
                    <div class="card card-95">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" placeholder="SEO for google" @if(!empty($about)) value="{{ $about->meta_keywords }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" style="height: 100px;" placeholder="SEO for google">@if(!empty($about)){{ $about->meta_description }}@endif</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <div class="d-flex justify-content-between">
                                        <span>Image</span>
                                        @if (!empty($about))
                                            <a href="{{ asset('uploads/about/'.$about->image) }}" target="_blank">View image</a>
                                        @endif
                                    </div>
                                </label>
                                @if (!empty($about))
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                @else
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                @endif

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
    $('#content').summernote({
        placeholder: 'Create your content here',
        tabsize: 2,
        height: 350,
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
