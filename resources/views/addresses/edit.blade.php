@extends('layouts.app')
@section('title', 'Address')
@section('single','Edit address')
@section('update')
    {{ route('addresses.update',$address) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="country" placeholder="Country" value="{{$address->country}}" autofocus></br>
    <input class="form-control" type="text" name="city" placeholder="City" value="{{$address->city}}"></br>
    <input class="form-control" type="text" name="street" placeholder="Street" value="{{$address->street}}"></br>
    <input class="form-control" type="number" name="zipCode" placeholder="Zip Code" value="{{$address->zipCode}}"></br>
    <input class="form-control" type="number" name="user_id" placeholder="User" value="{{$address->user_id}}"></br>
@endsection