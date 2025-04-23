@extends('layouts.app')
@section('title','Usuarios')
@section('content')
@foreach($users as $user)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-info">
            <span class="name">{{$user->name}}</span>
            <h4 class="lastName">
                <a href="product-grids.html">{{$user->lastName}}</a>
            </h4>
            <div class="phone">
                <span>{{$user->phone}}</span>
            </div>
            <div class="button">
                <a href="{{ route('users.show', $user) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Mostrar usuario</a>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection