@extends('layouts.app')
@section('title', 'Cart')
@section('single','Create cart')
@section('store')
    {{ route('carts.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="user_id" placeholder="User ID" autofocus></br>
@endsection