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
                    <a href="{{ route('cartLines.edit', $cartLine) }}" class="btn bg-primary w-100">Edit</a>
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
                    <p class="info-text">Total pieces in the cart: <strong class="text-primary">{{ $cart->cartLines->sum('number') }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="price">Total amount: <strong class="text-primary">{{$totalAmount}}€</strong><p>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('carts.applyDiscount', $cart) }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col">
                        <input type="text" name="discount_code" class="form-control" placeholder="Discount code" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Apply Discount</button>
                    </div>
                </form>
                @if(session('discount_success'))
                    <div class="alert alert-success py-1 px-2 mt-2 text-center mx-auto" style="font-size: 0.6em; max-width: 250px;">
                        {{ session('discount_success') }}
                    </div>
                @endif
                @if($errors->has('discount_code'))
                    <div class="alert alert-danger py-1 px-2 mt-2 text-center mx-auto" style="font-size: 0.6em; max-width: 250px;">
                        {{ $errors->first('discount_code') }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    @php
        $discount = session('cart_discount_percentage', 0);
        $discount_code = session('cart_discount_code', null);
        $discountAmount = $totalAmount * ($discount / 100);
        $finalAmount = $totalAmount - $discountAmount;
    @endphp

    <div class="single-product">
        <div class="row">
            <div class="col">
                <p class="price mt-1">
                    @if($discount)
                        Total amount: <strong class="text-primary" style="font-size: 1em;">{{ number_format($finalAmount, 2) }}€</strong>
                        <br>
                        <p class="text-success" style="font-size: 0.6em;">
                            (Discount {{ $discount_code }}: -{{ $discount }}% / -{{ number_format($discountAmount, 2) }}€)
                        </p>
                    @else
                        Total amount: <strong class="text-primary">{{ $totalAmount }}€</strong>
                    @endif
                </p>
            </div>
            
        </div>
        <div class="row mt-2">
            <div class="button col">
                <form action="{{route('orders.create')}}" method="POST">
                    @csrf
                    <input type="hidden" name="totalAmount" value="{{ $finalAmount }}">
                    <button type="submit" class="btn bg-primary w-100">Buy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('edit')
    {{ route('carts.edit', $cart) }}
@endsection
@section('delete')
    {{ route('carts.destroy', $cart) }}
@endsection