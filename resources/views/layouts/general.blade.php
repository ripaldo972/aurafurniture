
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Avifurniture">
    <link rel="icon" href="" type="image/x-icon" id="logoIcon">
    <title>Avifurniture</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('assets/user/css/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('assets/user/css/animate.min.css')}}">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/font-awesome.css')}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/feather-icon.css')}}">

    <!-- slick css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/bulk-style.css')}}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/custome.css') }}">

    @yield('css')

    @yield('meta')
</head>

<body class="theme-color-2 bg-effect">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi Senjafurniture Jepara</h5>
                    <p class="mt-1 text-content">Ini adalah lokasi resmi dari senjafurniture jepara</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2315610778983!2d110.6929599140955!3d-6.618129066534608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711f2ff54ac2e7%3A0xa196d81d3261b092!2sSenja%20Furniture%20Jepara!5e0!3m2!1sen!2sid!4v1679582450814!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->


    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="setting-box mb-3">

        </div>

        <div class="">
            <a href="" class="">
                <img src="{{asset('assets/user/logo/whatsapp.png')}}" alt="" style="width: 60px; height:60px;">
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{asset('assets/user/js/jquery-3.6.0.min.js')}}"></script>

    <!-- jquery ui-->
    <script src="{{asset('assets/user/js/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/user/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/user/js/popper.min.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{asset('assets/user/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/user/js/feather-icon.js')}}"></script>

    <!-- Lazyload Js -->
    <script src="{{asset('assets/user/js/lazysizes.min.js')}}"></script>

    <!-- Slick js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/user/js/bootstrap-notify.min.js')}}"></script>
    <!-- Fly Cart Js -->
    <script src="{{asset('assets/user/js/fly-cart.js')}}"></script>

    <!-- script js -->
    <script src="{{asset('assets/user/js/script.js')}}"></script>

    <script src="{{ asset('assets/user/api/logo.js') }}"></script>
    <script src="{{ asset('assets/user/api/category-menu.js') }}"></script>
    <script src="{{ asset('assets/user/api/footer.js') }}"></script>
    <script src="{{ asset('assets/user/api/medsos.js') }}"></script>
    @yield('js')
</body>

</html>
