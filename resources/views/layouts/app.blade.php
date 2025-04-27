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
                                <li><a class="" href="/">Inicio</a></li>
                                <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>English</option>
                                            <option value="1">Español</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{ route('users.index') }}">Users</a></li>
                                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                                <li><a href="{{ route('pieces.index') }}">Pieces</a></li>
                                <li><a href="{{ route('addresses.index') }}">Addresses</a></li>
                                <li><a href="{{ route('payments.index') }}">Payments</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <ul class="user-login">
                                <li>
                                    <a href="login.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
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
                    @hasSection ('create')
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
                    <div>@yield('paginate')</div> 
                @elseif('single')
                    <!-- Start Item Details -->
                    <section class="item-details section">
                        <div class="container">
                            <div class="top-area">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="product-info">
                                            <h3>@yield('single')<h3>
                                            @hasSection('update')
                                                <form class="form-group" action="@yield('update')" method="POST">
                                                    @method('UPDATE')
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
                                                <form class="form-group" action="@yield('store')" method="POST">
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
                                                    <div class="button col">
                                                        <a href="@yield('edit')" class="btn bg-primary w-100">Edit</a>
                                                    </div>
                                                    <form class="col" action="@yield('delete')" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="button"><button type="submit" class="btn bg-primary w-100">Delete</button></div>
                                                    </form>
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
