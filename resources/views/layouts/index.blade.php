@extends('layouts.app')

@section('content')
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
                @yield('content')
            </div>
        </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
@endsection
