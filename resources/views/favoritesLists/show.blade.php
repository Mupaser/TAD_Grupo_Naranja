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
        <p class="info-text">Price: {{ $piece->price }}€</p>
        <p class="info-text">State: {{ $piece->state }}</p>
        <p class="info-text">Discount: {{ $piece->offer }}%</p>
        <img src="{{ Vite::asset('resources/images/123456.jpg') }}" alt="{{ $piece->name }}" class="img-fluid w-50">
        <div class="row">
            <div class="button col">
                <form action="{{ route('favoritesLists.removePieceFromFavoritesList', ['user_id' => $favoritesList->user_id, 'piece_id' => $piece->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-primary w-100" aria-label="Close">Delete from Favorites List</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@if(Auth::user()->rol->name == "Admin")
    @section('delete')
        {{ route('favoritesLists.destroy', $favoritesList) }}
    @endsection
@endif
