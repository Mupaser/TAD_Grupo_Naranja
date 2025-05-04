@extends('layouts.app')
@section('title', 'Discount')
@section('content')

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $discount->name }}</h2>
                        <p class="info-text">Code: {{ $discount->code }}</p>
                        <p class="info-text">Percentage: {{ $discount->percentage }}</p>
                        <p class="info-text">Valid: {{ $discount->valid }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->

@endsection
@section('title', 'Discount')
@section('single')
    {{ $discount->name }}
@endsection
@section('show')
    <p class="info-text">Code: {{ $discount->code }}</p>
    <p class="info-text">Percentage: {{ $discount->percentage }}</p>
    <p class="info-text">Valid: {{ $discount->valid }}</p>
@endsection
@section('edit')
    {{ route('discounts.edit', $discount) }}
@endsection
@section('delete')
    {{ route('discounts.destroy', $discount) }}
@endsection