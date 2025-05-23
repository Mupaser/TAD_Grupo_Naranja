@extends('layouts.app')
@section('title', 'Order')
@section('single','Create order')
@section('store')
    {{ route('orders.store',Auth::user()->cart) }}
@endsection
@section('inputs')
    <input hidden="true" class="form-control" type="text" name="state" value="Processing" >
    <label class="form-label">Address</label>
    <select class="form-control bg-light" name="address">
        @foreach (Auth::user()->addresses as $address)
            <option value="Street {{$address->street}}, City {{$address->city}}, Country {{$address->country}} ">Street {{$address->street}}, City {{$address->city}}, Country {{$address->country}} </option>
        @endforeach
    </select></br>
    <label class="form-label">Phone</label>
    <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{Auth::user()->phone}}" ></br>
    <label class="form-label">Payment method</label>
    <select class="form-control bg-light" name="payment">
        @foreach ($payments as $payment)
            <option value="{{$payment->name}}">{{$payment->name}}</option>
        @endforeach
    </select></br>
    <input hidden="true" class="form-control" type="number" name="user_id" value="{{Auth::user()->id}}" >
    <label class="form-label">Amount</label>
    <input class="form-control" type="number" name="totalPrice" value="{{$totalAmount}}"></br>
@endsection