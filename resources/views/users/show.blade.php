@extends('layouts.app')
@section('title','Usuario')
@section('content')

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{$user->name}}</h2>
                        <p class="info-text">Email: {{$user->emailAddress}}</p>
                        <p class="info-text">Telefono: {{$user->phone}}</p>
                        <p class="info-text">Rol: {{$user->rol->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->

@endsection