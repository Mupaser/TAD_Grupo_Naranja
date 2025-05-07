@extends('layouts.app')
@section('title', 'Categories')
@section('single')
    @if ($category->pieces->count() > 0)
        {{ $category->name }}
    @else
        {{ $category->name }} (No pieces available)
    @endif
@endsection
@section('show')
    <p class="info-text">Description: {{ $category->description }}</p>
    <p class="info-text">Pieces in this category: {{ $category->pieces->count() }}</p>
    @foreach ($category->pieces as $piece)
        <h5 class="info-title">{{ $piece->name }}</h5>
        <p class="info-text">Price: {{ $piece->price }}€</p>
        <p class="info-text">State: {{ $piece->state }}</p>
        <p class="info-text">Discount: {{ $piece->offer }}%</p>
        <p class="info-text">Description: {{ $piece->description }}</p>
        <p class="info-text">Favorites Count: {{ $piece->favorites_lists_count }}</p>
        <a href="{{ route('pieces.show', $piece) }}" class="btn btn-primary">View Piece</a>
        <img src="{{ Vite::asset($piece->image) }}" alt="{{ $piece->name }}" class="card-img-top">
    @endforeach
@endsection