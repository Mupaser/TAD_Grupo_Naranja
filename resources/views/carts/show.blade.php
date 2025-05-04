@extends('layouts.app')
@section('title', 'Cart')
@section('single')
    {{ $cart->user_id }}
@endsection
@section('show')
    <p class="info-text">User ID: {{ $cart->user_id }}</p>
@endsection
@section('edit')
    {{ route('carts.edit', $cart) }}
@endsection
@section('delete')
    {{ route('carts.destroy', $cart) }}
@endsection