@extends('layouts.app')
@section('title', 'Piece')
@section('single')
    {{ $piece->name }}
@endsection
@section('show')
    @if ($piece->offer > 0)
        <p class="price">Price: {{ $piece->price - ($piece->price * $piece->offer) }}<span> {{ $piece->price }}</span></p>
    @else
        <p class="price">Price: {{ $piece->price }}</p>
    @endif
    <p class="info-text">Description: {{ $piece->description }}</p>
    <p class="info-text">State: {{ $piece->state }}</p>
    <p class="info-text">Discount: {{ ($piece->offer)*100 }}%</p>
    <p class="info-text"><i class="lni lni-tag"></i>: 
        @if($piece->categories->isNotEmpty())
            {{ $piece->categories->pluck('name')->join(', ') }}
        @else
            No categories
        @endif
    </p>
    <p class="info-text">
        <i class="lni lni-heart"></i>
        Count:
         {{ $piece->favorites_lists_count }}</p>
    <img src="{{ Vite::asset($piece->image) }}" alt="resources/images/123456.jpg" class="img-fluid">
@endsection