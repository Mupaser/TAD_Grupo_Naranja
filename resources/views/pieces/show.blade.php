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
    <p class="info-text">State: {{ $piece->state }}</p>
    <p class="info-text">Description: {{ $piece->description }}</p>
    <img src="{{ Vite::asset($piece->image) }}" alt="resources/images/123456.jpg" class="img-fluid">
@endsection