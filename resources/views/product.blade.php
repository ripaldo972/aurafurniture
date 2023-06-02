@extends('layouts.general')

@section('content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Our Products</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>
                            @if (isset($category))
                                <li class="breadcrumb-item">
                                    <a href="{{url('/products')}}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{$category->name}}
                                </li>
                            @else
                            <li class="breadcrumb-item active">
                                Product
                            </li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-section">
    <div class="container-fluid-lg">
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

            @if (count($products) == 0)
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <h2>Sorry!! Produk kosong</h2>
                    </div>
                </div>
            @endif

            <div class="col-md-12 mb-4">
                <div class="d-flex justify-content-center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
