@extends('layouts.general')

@section('content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Contact Us</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Contact Us</li>
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
                        <h2 class="d-block mb-3">How Contact Us ?</h2>
                        <h5 class="text-muted">Please fill in the form below and you will be connected to us via email. Thank You</h5>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ url('/contact/email/send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" required placeholder="Astro CLoud">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required placeholder="Malang, Jawa Timur">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" required placeholder="0895410376876">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required placeholder="astrocloud@gmail.com">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="message" required class="form-control" placeholder="Your message"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-animation">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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


