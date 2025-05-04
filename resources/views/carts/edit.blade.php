@extends('layouts.app')
@section('title', 'Cart')
@section('single','Edit cart')
@section('update')
    {{ route('carts.update',$cart) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="user_id" placeholder="User ID" value="{{$cart->user_id}}" autofocus></br>
@endsection