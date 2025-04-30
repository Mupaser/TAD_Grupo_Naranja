@extends('layouts.app')
@section('title', 'Order')
@section('single','Edit order')
@section('update')
    {{ route('orders.update',$order) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="estate" placeholder="Estate" value="{{$order->state}}" autofocus></br>
    <input class="form-control" type="email" name="address" placeholder="Address" value="{{$order->address}}"></br>
@endsection