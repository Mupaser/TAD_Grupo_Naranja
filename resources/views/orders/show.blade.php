@extends('layouts.app')
@section('title', 'Order')
@section('single')
    Order {{ $order->id }}
@endsection
@section('show')
    <p class="info-text">State: {{$order->state}}</p>
    <p class="">Customer: {{$order->user->name}}</p>
    <p class="">Address: {{$order->address}}</p>
    <p class="info-text">Payment: {{$order->payment}}</p>
    @foreach($order->orderLines as $orderLine)
    <p class="">Piece: {{$orderLine->pieceName}}</p>
    <p class="">Number: {{$orderLine->number}}</p>
    <p class="info-text">Amount: {{$orderLine->totalPrice}}</p>
    @endforeach
    <p class="info-text">Total amount: {{$order->totalPrice}}</p>
@endsection
@section('edit')
    {{ route('orders.edit', $order) }}
@endsection
@section('delete')
    {{ route('orders.destroy', $order) }}
@endsection