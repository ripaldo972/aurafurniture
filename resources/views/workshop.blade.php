@extends('layouts.general')

@section('css')
<style>

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #0baf9a;
        border-color: #0baf9a;
    }

    .page-link  {
        color: #0baf9a;
    }
</style>
@endsection

@section('content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Workshops</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Workshops</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            @foreach ($workshops as $result)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ asset('uploads/workshop/'.$result->image) }}" alt="" width="100%" height="300">
                        <div class="card-body">
                            <h3 class="d-block mb-3">{{ $result->title }}</h3>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-muted">{{ $result->address }}</h5>
                                <h6 class="text-muted">{{ date('l, d F Y', strtotime($result->date)) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="product-section mb-3">
    <div class="d-flex justify-content-center">
        {{ $workshops->links() }}
    </div>
</section>
@endsection
