@extends('layouts.app')
@section('title','Pedidos')
@section('content')
@foreach($orders as $order)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('orders.destroy',$order)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <h3 class="title">Order {{$order->id}}</h3>
            <p class="lastName">{{$order->state}}</a></p>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('orders.show', $order) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Show order</a>
                </div>
                <div class="button col">
                    <a href="{{ route('orders.edit', $order) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Edit order</a>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
<div>{{ $orders->links() }}</div>
@endsection