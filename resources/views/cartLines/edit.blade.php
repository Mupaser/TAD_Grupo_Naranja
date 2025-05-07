@extends('layouts.app')
@section('title', 'Cart Line')
@section('single','Edit cart line')
@section('update')
    {{ route('cartLines.update',$cartLine) }}
@endsection
@section('inputs')
    <input class="form-control" type="number" name="number" min="1" placeholder="Quantity" value="{{$cartLine->number}}" autofocus></br>
@endsection
@section('hidden')
    <input type="hidden" name="piece_id" value="{{$cartLine->piece_id}}"></br>
    <input type="hidden" name="cart_id" value="{{$cartLine->cart_id}}"></br>
@endsection