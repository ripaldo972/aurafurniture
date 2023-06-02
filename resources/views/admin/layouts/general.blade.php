<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <!-- CSS files -->
    <link href="{{asset('assets/admin/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/custome.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Logo -->
    <link rel="icon" href="" id="logoIcon">
    @yield('css')
  </head>
  <body >
    <div class="page">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Navbar -->
        @include('admin.layouts.header')
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    <!-- Tabler Core -->
    <script src="{{asset('assets/admin/dist/js/tabler.min.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{asset('assets/admin/api/logo.js')}}"></script>
    @yield('js')
  </body>
</html>
