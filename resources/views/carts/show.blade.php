@extends('layouts.app')
@section('title', 'Cart')
@section('single')
    @if ($cart->cartLines->isNotEmpty())
        {{ $cart->user->name }}'s Cart
    @else
        No pieces in the cart.
    @endif
@endsection
@section('show')
    @foreach($cart->cartLines as $cartLine)
        <div class="single-product">
            <h4 class="info-text mt-2">{{ $cartLine->piece->name }}</h4>
            <p class="info-text">Description: {{ $cartLine->piece->description }}</p>
            <p class="info-text">State: {{ $cartLine->piece->state }}</p>
            <p class="info-text">Price: {{ $cartLine->piece->price }}€</p>
            <p class="info-text">Quantity: {{ $cartLine->number }}</p>
            <p class="info-text">Discount: {{ $cartLine->piece->offer }}%</p>
            <p class="info-text">Total Price: {{ $cartLine->totalPrice }}€</p>
            <img src="{{ Vite::asset($cartLine->piece->image) }}" alt="resources/images/123456.jpg" class="img-fluid w-50">
            <div class="row">
                <div class="button col">
                    <form action="{{ route('cartLines.edit', $cartLine) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn bg-primary w-100" aria-label="Close">Edit</button>
                    </form>
                </div>
                <div class="button col">
                    <form action="{{ route('cartLines.destroy', [$cartLine, $cart]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-primary w-100" aria-label="Close">Delete from Cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('edit')
    {{ route('carts.edit', $cart) }}
@endsection
@section('delete')
    {{ route('carts.destroy', $cart) }}
@endsection