@extends('layouts.app')
@section('title', 'Payment')
@section('single','Create payment')
@section('store')
    {{ route('payments.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" autofocus></br>
@endsection