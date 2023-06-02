@extends('layouts.general')

@section('content')
<section class="home-section-small section-b-space slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" id="slider-indicator">

        </div>
        <div class="carousel-inner" id="sliders">

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="category-section-2" id="categories">
    <div class="container-fluid-lg">
        <div class="title title-flex-2">
            <div class="text-center">
                <h2 class="">Categories</h2>
                <span class="text-muted">View Our Categories</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="home_categories">

            </div>
        </div>
    </div>
</section>

<section class="product-section mb-3">
    <div class="container-fluid-lg">
        <div class="title title-flex-2">
            <div class="text-center">
                <h2 class="">Our Products</h2>
                <span class="text-muted">Lorep Ipsum Generate The Code From Google</span>
            </div>
        </div>

        <div class="row g-8">
            @foreach ($products as $product => $result)
                <div class="col-xxl-2 col-lg-3 col-md-4 col-6 wow fadeInUp">
                    <div class="product-box-4 shadow">
                        <div class="product-image">
                            <a href="{{ url('/product', $result->slug) }}">
                                <img src="{{asset('uploads/product/'.$result->image)}}" class="rounded" alt="{{$result->name}}">
                            </a>

                            <ul class="option">
                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                    <a href="{{ url('/product', $result->slug) }}">
                                        <i class="iconly-Show icli"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="product-detail">
                            <h3 class="d-block mb-3">
                                @if ($result->price !== null)
                                    Rp. {{ number_format($result->price,0,',','.') }}
                                @else
                                    Contact Admin
                                @endif
                            </h3>
                            <a href="{{ url('/product', $result->slug) }}">
                                <h4 >{{$result->name}}</h4>
                            </a>
                            <span class="text-secondary">
                                @if ($result->product_category_id !== 0)
                                    {{$result->productCategory->name}}
                                @else
                                    Uncategorized
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="newsletter-section-2 section-b-space mb-3">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="newsletter-box hover-effect">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('uploads/slider/1685360824nC7TeeMxf5o4xJh8chsl11BqI3B5lg.jpg') }}" alt="" width="100%" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')
<script src="{{ asset('assets/user/api/slider.js') }}"></script>
<script src="{{ asset('assets/user/api/category-home.js') }}"></script>

@endsection
