@extends('layouts.app')
@section('title', 'Address')
@section('content')

<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $address->country }}</h2>
                        <p class="info-text">City: {{ $address->city }}</p>
                        <p class="info-text">Street: {{ $address->street }}</p>
                        <p class="info-text">Zip Code: {{ $address->zipCode }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('title', 'Address')
@section('single')
    {{ $address->country }}
@endsection
@section('show')
    <p class="info-text">{{ $address->city }}</p>
    <p class="info-text">Street: {{ $address->street }}</p>
    <p class="info-text">Zip Code: {{ $address->zipCode }}</p>
@endsection
@section('edit')
    {{ route('addresses.edit', $address) }}
@endsection
@section('delete')
    {{ route('addresses.destroy', $address) }}
@endsection
@section('index')
    <div class="col-lg-3 col-md-6 col-12 mt-4">
        <button><a href="{{ route('addresses.index') }}">Back</a></button>
    </div>