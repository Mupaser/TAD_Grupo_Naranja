@extends('layouts.app')
@section('title', 'Address')
@section('single','Create address')
@section('store')
    {{ route('addresses.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="country" placeholder="Country" autofocus></br>
    <input class="form-control" type="text" name="city" placeholder="City"></br>
    <input class="form-control" type="text" name="street" placeholder="Street"></br>
    <input class="form-control" type="number" name="zipCode" placeholder="Zip Code"></br>
    <input class="form-control" type="number" name="user_id" placeholder="User" value="{{ Auth::user()->id }}"></br>
@endsection