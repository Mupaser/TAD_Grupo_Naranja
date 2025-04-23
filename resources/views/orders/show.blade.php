@extends('layouts.app')
@section('title','Pedido')
@section('content')

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{$order->state}}</h2>
                        <p class="info-text">Cliente: {{$order->user->name}}</p>
                        <p class="info-text">Precio: {{$order->precioTotal}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->

@endsection