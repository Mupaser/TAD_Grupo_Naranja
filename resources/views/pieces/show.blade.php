@extends('layouts.app')
@section('title', 'Piece')
@section('single')
    {{ $piece->name }}
@endsection
@section('show')
    <p class="info-text">Price: {{ $piece->price }}</p>
    <p class="info-text">State: {{ $piece->state }}</p>
    <p class="info-text">Offer: {{ $piece->offer }}</p>
    <p class="info-text">Description: {{ $piece->description }}</p>
    <img src="{{ Vite::asset('resources/images/123456.jpg') }}" alt="{{ $piece->name }}" class="img-fluid">
@endsection