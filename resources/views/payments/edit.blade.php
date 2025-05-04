@extends('layouts.app')
@section('title', 'Payment')
@section('single','Edit payment')
@section('update')
    {{ route('payments.update',$payment) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$payment->name}}" autofocus></br>
@endsection