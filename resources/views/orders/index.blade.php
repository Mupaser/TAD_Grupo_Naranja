@extends('layouts.app')
@section('title','Orders')
@section('index')
@foreach($orders as $order)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        @if(Auth::user()->rol->name == "Admin")
        <form action="{{route('orders.destroy',$order)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        @endif
        <div class="product-info">
            <h3 class="title">Order {{$order->id}}</h3>
            <p class="lastName">{{$order->state}}</a></p>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('orders.show', $order) }}" class="btn bg-primary w-100">Show</a>
                </div>
                @if(Auth::user()->rol->name == "Admin")
                <div class="button col">
                    <a href="{{ route('orders.edit', $order) }}" class="btn bg-primary w-100">Edit</a>
                </div>
                @endif
            </div>
            
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('paginate')
{{ $orders->links() }}
@endsection