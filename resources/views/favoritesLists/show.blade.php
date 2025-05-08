@extends('layouts.app')
@section('title', 'Favorites List')
@section('single')
    {{ $favoritesList->user->name }}'s favorites list
@endsection
@section('show')
    @foreach($favoritesList->pieces as $piece)
    <div class="single-product">
        <h4 class="info-text mt-2">{{ $piece->name }}</h4>
        <p class="info-text">Description: {{ $piece->description }}</p>
        @if ($piece->offer > 0)
            <p class="price">Price: {{ $piece->price - ($piece->price * $piece->offer) }}€ <span> {{ $piece->price }}€</span></p>
        @else
            <p class="price">Price: {{ $piece->price }}€</p>
        @endif
        <p class="info-text">State: {{ $piece->state }}</p>
        <p class="info-text">Discount: {{ ($piece->offer)*100 }}%</p>
        <img src="{{ Vite::asset($piece->image) }}" alt="{{ $piece->name }}" class="img-fluid">
        <div class="row">
            @if(Auth::user()->rol->name == "Customer")
                <div class="button col">
                    <form action="{{ route('favoritesLists.removePieceFromFavoritesList', [Auth::user()->favoritesList, $piece]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-primary w-100" aria-label="Close">Delete from Favorites List</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    @endforeach
@endsection
@if(Auth::user()->rol->name == "Admin")
    @section('delete')
        {{ route('favoritesLists.destroy', $favoritesList) }}
    @endsection
@endif
