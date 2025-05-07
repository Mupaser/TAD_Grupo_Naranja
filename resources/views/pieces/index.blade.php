@extends('layouts.app')
@section('title', 'Pieces')
@section('index')
    @foreach($pieces as $piece)
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="position-relative">
                    @if(Auth::user()->rol->name == "Admin")
                        <form action="{{ route('pieces.destroy', $piece) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
                        </form>
                    @else
                        <div class="wishlist-icon position-absolute top-0 end-0">
                            @if($piece->favoritesLists->contains('user_id', Auth::user()->id))
                                <form action="{{ route('favoritesLists.removePieceFromFavoritesList', [Auth::user()->favoritesList, $piece]) }}" method="POST" class="wishlist-icon">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="piece_id" value="{{ $piece->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button class="lni lni-heart-filled btn btn-primary"></button>
                                </form>
                            @else
                                <form action="{{ route('favoritesLists.addPieceToFavoritesList', [Auth::user()->favoritesList, $piece]) }}" method="POST" class="wishlist-icon">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="piece_id" value="{{ $piece->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button class="lni lni-heart btn btn-outline-primary"></button>
                                </form>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="product-info">
                    <div class="info-body">
                        <h3 class="title">{{ $piece->name }}</h3>
                        <p class="info-text">Description: {{ $piece->description }}</p>
                        <p class="info-text">Price: {{ $piece->price }}€</p>
                        <p class="info-text">State: {{ $piece->state }}</p>
                        <p class="info-text">Discount: {{ $piece->offer }}%</p>
                        <div class="button col">
                            <a href="{{ route('pieces.show', $piece) }}">
                                <img src="{{ Vite::asset($piece->image) }}" alt="Piece's image" class="img-fluid">
                            </a>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        @if(Auth::user()->rol->name == "Admin")
                            <div class="button col">
                                <a href="{{ route('pieces.edit', $piece) }}" class="btn bg-primary w-100">Edit</a>
                            </div>
                        @else
                            <div class="button col mt-2">
                                <form action="{{ route('cartLines.store', Auth::user()->cart) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="piece_id" value="{{ $piece->id }}">
                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                    <input type="number" name="number" value="1" class="form-control mb-2" placeholder="Quantity" required>
                                    <button type="submit" class="btn bg-primary w-100">Add to Cart</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@if(Auth::user()->rol->name == "Admin")
    @section('create')
        {{ route('pieces.create') }}
    @endsection
@endif
@section('paginate')
    {{ $pieces->links() }}
@endsection