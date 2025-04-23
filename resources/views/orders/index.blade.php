@extends('layouts.app')
@section('title','Pedidos')
@section('content')
@foreach($orders as $order)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-info">
            <span class="name">{{$order->id}}</span>
            <h4 class="lastName">
                <a href="product-grids.html">{{$order->state}}</a>
            </h4>
            <div class="price">
                <span>{{$order->totalPrice}}</span>
            </div>
            <div class="button">
                <a href="{{ route('orders.show', $order) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Mostrar pedido</a>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection