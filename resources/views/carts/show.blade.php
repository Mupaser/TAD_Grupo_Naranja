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
            @if ($cartLine->piece->offer > 0)
                <p class="price">Price: {{ $cartLine->piece->price - ($cartLine->piece->price * $cartLine->piece->offer) }}€ <span> {{ $cartLine->piece->price }}€</span></p>
            @else
                <p class="price">Price: {{ $cartLine->piece->price }}€</p>
            @endif
            <p class="info-text">Quantity: {{ $cartLine->number }}</p>
            <p class="info-text">Discount: {{ $cartLine->piece->offer *100 }}%</p>
            <p class="info-text">Total Price: {{ $cartLine->totalPrice }}€</p>
            <img src="{{ Vite::asset($cartLine->piece->image) }}" alt="Piece's image" class="img-fluid">
            <div class="row">
                <div class="button col">
                    <form action="{{ route('cartLines.edit', $cartLine) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn bg-primary w-100">Edit</button>
                    </form>
                </div>
                <div class="button col">
                    <form action="{{ route('cartLines.destroy', [$cartLine, $cart]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-primary w-100">Delete from Cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @if ($cart->cartLines->isNotEmpty())
        <div class="single-product">
            <div class="row">
                <div class="col">
                    <p class="price">Total amount: <strong class="text-primary">{{$totalAmount}}€</strong><p>
                </div>
                <div class="button col">
                    <form action="{{route('orders.create')}}" method="POST">
                        @csrf
                        <input hidden="true" name="totalAmount" value="{{$totalAmount}}">
                        <button type="submit" class="btn bg-primary w-100">Buy</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('edit')
    {{ route('carts.edit', $cart) }}
@endsection
@section('delete')
    {{ route('carts.destroy', $cart) }}
@endsection