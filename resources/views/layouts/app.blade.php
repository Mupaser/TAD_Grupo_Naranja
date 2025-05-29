<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Compra piezas de coches</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />-->

    <!-- ========================= CSS here ========================= -->
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    @vite(['resources/js/main.js', 'resources/css/main.css'])
    @vite(['resources/js/glightbox.min.js', 'resources/css/glightbox.min.css'])
    @vite(['resources/js/tiny-slider.js', 'resources/css/tiny-slider.css'])
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">
    <!--<link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />-->

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar bg-primary">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle top-left">
                            <ul class="menu-top-link useful-links">
                                <li><a class="" href="/home">{{__('messages.home')}}</a></li>
                                @if(Session::get('locale')=="es")
                                <li><a class="" href="{{route('lang.change','en')}}">English</a></li>
                                @else
                                <li><a class="" href="{{route('lang.change','es')}}">Español</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            @auth
                            <ul class="useful-links">
                                @if(Auth::user()->rol->name == "Admin")
                                <li><a href="{{ route('pieces.index') }}">{{__('messages.pieces')}}</a></li>
                                <li><a href="{{ route('users.index') }}">{{__('messages.users')}}</a></li>
                                <li><a href="{{ route('rols.index') }}">{{__('messages.rols')}}</a></li>
                                <li><a href="{{ route('orders.index',Auth::user()) }}">{{__('messages.orders')}}</a></li>
                                <li><a href="{{ route('payments.index') }}">{{__('messages.payments')}}</a></li>
                                <li><a href="{{ route('categories.index') }}">{{__('messages.categories')}}</a></li>
                                <li><a href="{{ route('categories.index') }}">{{__('messages.discounts')}}</a></li>
                                @else
                                <li><a href="{{ route('pieces.index') }}">{{__('messages.pieces')}}</a></li>
                                <li><a href="{{ route('orders.index',Auth::user()) }}">{{__('messages.orders')}}</a></li>
                                @endif
                            </ul>
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            @if(Auth::check() && Auth::user()->rol->name == "Customer")
                                <a href="{{ route('favoritesLists.show', Auth::user()->favoritesList) }}" class="wishlist btn btn-outline-primary position-relative text-white">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items badge bg-dark text-white position-absolute top-0 start-100 translate-middle">
                                    {{ Auth::user()->favoritesList->pieces->count() }}
                                    </span>
                                </a>
                                <a href="{{ route('carts.show', Auth::user()->cart) }}" class="cart btn btn-outline-primary rounded-circle position-relative text-white m-2">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items badge bg-dark text-white position-absolute top-0 start-100 translate-middle">
                                    {{ Auth::user()->cart->cartLines->count() }}
                                    </span>
                                </a>
                            @endif
                            <ul class="user-login m-2">
                                @if (Route::has('login'))
                                    @auth
                                        <div class="dropdown">
                                            <button class="btn btn-primary text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">{{__('messages.profile')}}</a></li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('messages.logout')}}</a></li>
                                            </ul>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        <li>
                                        <a href="{{ route('login') }}">{{__('messages.login')}}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                            <a href="{{ route('register') }}">{{__('messages.register')}}</a>
                                            <li>
                                        @endif
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
    </header>
    <!-- End Header Area -->
    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            @hasSection('home')
                @yield('home')
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>@yield('title')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @hasSection('index')
                    @yield('index')
                    <div>@yield('paginate')</div>
                @endif
                @hasSection('create')
                        <div class="col-lg-3 col-md-6 col-12 ">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="button">
                                    <a href="@yield('create')" class="btn bg-primary w-100">Create +</a>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    @endif
                @hasSection('single')
                    <!-- Start Item Details -->
                    <section class="item-details section">
                        <div class="container">
                            <div class="top-area">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="product-info">
                                            <h3>@yield('single')<h3>
                                                    @hasSection('update')
                                                        <form class="form-group" action="@yield('update')"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            @yield('inputs')
                                                            <div class="button">
                                                                <button class="btn btn-primary w-100" type="submit">
                                                                    Edit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                    @hasSection('store')
                                                        <form class="form-group" action="@yield('store')"
                                                            method="POST">
                                                            @csrf
                                                            @yield('inputs')
                                                            <div class="button">
                                                                <button class="btn btn-primary w-100" type="submit">
                                                                    Create
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                    @hasSection('show')
                                                        @yield('show')
                                                        <div class="row">
                                                            @auth
                                                            @if (Auth::user()->rol->name == "Admin")
                                                                @hasSection('edit')
                                                                    <div class="button col">
                                                                        <a href="@yield('edit')"
                                                                            class="btn bg-primary w-100">Edit</a>
                                                                    </div>
                                                                @endif
                                                                @hasSection('delete')
                                                                    <form class="col" action="@yield('delete')"
                                                                        method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="button"><button type="submit"
                                                                                class="btn bg-primary w-100">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                            @endauth
                                                        </div>
                                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Item Details -->
                @endif
            </div>
        </div>
        </div>
    </section>
    <!-- Start Footer Area -->
    <footer class="footer bg-primary">
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= JS here ========================= -->
    <!--<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>-->
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>
