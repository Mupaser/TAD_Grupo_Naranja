@extends('layouts.app')
@section('title', 'Carts')
@section('index')
@foreach($carts as $cart)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('carts.destroy',$cart)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$cart->user_id}}</h3>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('carts.show', $cart) }}" class="btn bg-primary w-100">Show</a>
                </div>
                <div class="button col">
                    <a href="{{ route('carts.edit', $cart) }}" class="btn bg-primary w-100">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('create')
    {{route('carts.create')}}
@endsection
@section('paginate')
    {{ $carts->links() }}
@endsection