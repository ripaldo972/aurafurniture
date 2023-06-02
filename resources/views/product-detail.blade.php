@extends('layouts.general')

@section('meta')
    <meta name="description" content="{{$product->meta_description}}">
    <meta name="keywords" content="{{$product->meta_keywords}}">
@endsection


@section('content')

<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>{{$product->name}}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/products')}}">Produk</a>
                            </li>
                            <li class="breadcrumb-item active">{{$product->name}}</li>
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
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="product-main-2 no-arrow">
                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('uploads/product/'.$product->image)}}" id="img-1"
                                                    data-zoom-image="{{asset('uploads/product/'.$product->image)}}"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload rounded" alt="" style="height:280px;">
                                            </div>
                                        </div>
                                        @if (count($gallery) !== 0)
                                            @foreach ($gallery as $result)
                                                <div>
                                                    <div class="slider-image">
                                                        <img src="{{asset('uploads/gallery/'.$result->image)}}"
                                                            data-zoom-image="{{asset('uploads/gallery/'.$result->image)}}"
                                                            class="img-fluid image_zoom_cls-0 blur-up lazyload rounded" alt="" style="height:280px;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                    <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('uploads/product/'.$product->image)}}"
                                                    class="img-fluid blur-up lazyload" alt="" style="height:50px;">
                                            </div>
                                        </div>
                                        @if (count($gallery) !== 0)
                                            @foreach ($gallery as $result)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{asset('uploads/gallery/'.$result->image)}}"
                                                            class="img-fluid blur-up lazyload rounded" alt="" style="height:50px;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h2 class="name">{{$product->name}}</h2>
                            <div class="procuct-contain">
                                <h2 class="text-muted">
                                    @if ($product->price !== null)
                                        Rp. {{ number_format($product->price,0,',','.') }}
                                    @else
                                        Contact Admin
                                    @endif
                                </h2>
                            </div>
                            <div class="note-box product-packege">
                                <a href="" class="btn btn-md bg-success cart-button text-white w-100">Whatsapp</a>
                            </div>

                            <div class="buy-box mb-3">
                                <a href="">
                                    <span>Share on: </span>
                                </a>
                                <a href="">
                                    <i data-feather="instagram"></i>
                                    <span>Instagram</span>
                                </a>

                                <a href="">
                                    <i data-feather="facebook"></i>
                                    <span>Facebook</span>
                                </a>
                                <a href="">
                                    <i data-feather="phone"></i>
                                    <span>Whatsapp</span>
                                </a>
                            </div>
                            <div>
                                <p>
                                    Kategori :
                                    @if ($product->product_category_id !== 0)
                                        {{$product->productCategory->name}}
                                    @else
                                        Uncategorized
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Deskripsi</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                        data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                        aria-selected="false">Spesifikasi</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                        data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                        aria-selected="false">Order By Email</button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="product-description">
                                        <div class="nav-desh">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Width</th>
                                                <td>: {{ $product->width }} cm</td>
                                            </tr>
                                            <tr>
                                                <th>Height</th>
                                                <td>: {{ $product->height }} cm</td>
                                            </tr>
                                            <tr>
                                                <th>Wide</th>
                                                <td>: {{ $product->wide }} cm</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                                    <div class="information-box">
                                        <h3>Order Now Via Email</h3>
                                        <span class="text-muted d-block mb-3">Please fill in the form to place an order via email.</span>
                                        <form action="{{ url('/order/email', Crypt::encrypt($product->id)) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Astro Cloud" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Malang, Jawa Timur" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" placeholder="0895410376876" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="astro.cloud@gmail.com" required>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Message</label>
                                                    <textarea name="message" class="form-control" placeholder="Your Message" style="height: 100px;" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-animation">Send Order</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="{{ asset('assets/user/js/custom_slick.js') }}"></script>
<script src="{{ asset('assets/user/api/location.js') }}"></script>
@endsection
