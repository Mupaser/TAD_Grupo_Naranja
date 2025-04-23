@extends('layouts.app')

@section('title','Piezas')

@section('content')

@foreach($pieces as $piece)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-info">
            <h4 class="price">
                <a href="{{ route('users.show', $user) }}">{{$piece->name}}</a>
            </h4>
            <span class="name">{{$piece->price}}</span>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection