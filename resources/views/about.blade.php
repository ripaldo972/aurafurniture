@extends('layouts.general')

@section('meta')
<meta name="keywords" content="{{ $about->meta_keywords }}">
<meta name="description" content="{{ $about->meta_description }}">
@endsection

@section('content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>{{ $about->title }}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ $about->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-section mb-5">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-md-12">
                        <img src="{{ asset('uploads/about/'.$about->image) }}" alt="" width="100%" height="300">
                    </div>
                    <div class="col-md-12 mb-3">
                        {!! $about->content !!}
                    </div>
                </div>
            </div>

            @include('layouts.right-bar')
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('assets/user/api/contact_information.js') }}"></script>
<script src="{{ asset('assets/user/api/location.js') }}"></script>
@endsection
