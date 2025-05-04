@extends('layouts.app')
@section('title', 'Cart')
@section('content')

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">Cart</h2>
                        <p class="info-text">User ID: {{ $cart->user_id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->
@endsection
@section('title', 'Cart')
@section('single')
    {{ $cart->user_id }}
@endsection
@section('show')
    <p class="info-text">User ID: {{ $cart->user_id }}</p>
@endsection
@section('edit')
    {{ route('carts.edit', $cart) }}
@endsection
@section('delete')
    {{ route('carts.destroy', $cart) }}
@endsection
@section('index')
    {{ route('carts.index') }}
@endsection