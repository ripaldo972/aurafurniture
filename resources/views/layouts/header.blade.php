<!-- Header Start -->
<header class="header-2">
    <div class="top-nav top-header sticky-header sticky-header-3">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top" style="z-index: 999999999999;">
                        <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="iconly-Category icli theme-color"></i>
                            </span>
                        </button>
                        <a href="{{ url('/') }}" class="web-logo nav-logo text-white" id="logo-header">

                        </a>

                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item @if(Request::is('about')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/about') }}">About</a>
                                        </li>
                                        <li class="nav-item @if(Request::is('products', 'product*')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/products') }}">Product</a>
                                        </li>
                                        <li class="nav-item @if(Request::is('workshops')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/workshops') }}">Workshop</a>
                                        </li>
                                        <li class="nav-item @if(Request::is('portfolio')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/portfolio') }}">Portfolio</a>
                                        </li>
                                        <li class="nav-item @if(Request::is('faqs')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/faqs') }}">Faqs</a>
                                        </li>
                                        <li class="nav-item @if(Request::is('contact')) active @endif">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ url('/contact') }}">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="header-nav-left">
                            <button class="dropdown-category dropdown-category-2">
                                <i class="iconly-Category icli"></i>
                                <span>All Categories</span>
                            </button>

                            <div class="category-dropdown">
                                <div class="category-title">
                                    <h5>Categories</h5>
                                    <button type="button" class="btn p-0 close-button text-content">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>

                                <ul class="category-list w-75" id="categories">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Header End -->


<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="@if(Request::is('/')) active @endif">
            <a href="{{ url('/') }}">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="iconly-Category icli js-link"></i>
                <span>Kategori</span>
            </a>
        </li>

        <li class="@if(Request::is('products', 'product*')) active @endif">
            <a href="{{ url('/product') }}" class="notifi-wishlist">
                <i class="iconly-Heart icli"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="@if(Request::is('contact')) active @endif">
            <a href="{{ url('/contact') }}">
                <i class="iconly-Info-Circle icli fly-cate"></i>
                <span>Info</span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile fix menu end -->
