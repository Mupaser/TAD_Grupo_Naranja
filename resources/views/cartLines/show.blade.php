@extends('layouts.app')
@section('title', 'Cart Line')
@section('single')
    @if ($cartLines->isNotEmpty())
        Cart Line of {{ $cartLines->first()->cart->user->name }}
    @else
        No cart lines found.
    @endif
@endsection
@section('show')
    @if ($cartLines->count() > 0)
        @foreach ($cartLines as $cartLine)
        <div class="single-product">
            <h4 class="info-text mt-2">{{ $cartLine->piece->name }}</h4>
            <p class="info-text">Description: {{ $cartLine->piece->description }}</p>
            <p class="info-text">State: {{ $cartLine->piece->state }}</p>
            <p class="info-text">Price: {{ $cartLine->piece->price }}€</p>
            <p class="info-text">Quantity: {{ $cartLine->number }}</p>
            <p class="info-text">Discount: {{ $cartLine->piece->offer }}%</p>
            <p class="info-text">Total Price: {{ $cartLine->totalPrice }}€</p>
            <img src="{{ Vite::asset('resources/images/123456.jpg') }}" alt="{{ $cartLine->piece->name }}" class="img-fluid w-50">
            <div class="row">
                <div class="button col">
                    <form action="{{ route('cartLines.edit', $cartLine->id) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn bg-primary w-100" aria-label="Close">Edit</button>
                    </form>
                </div>
                <div class="button col">
                    <form action="{{ route('cartLines.destroy', $cartLine->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-primary w-100" aria-label="Close">Delete from Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No pieces found in this cart line.</p>
    @endif
@endsection
@if(Auth::user()->rol->name == "Admin")
    @section('delete')
        {{ route('favoritesLists.destroy', $favoritesList) }}
    @endsection
@endif
