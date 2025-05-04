@extends('layouts.app')
@section('title', 'Discount')
@section('single','Edit discount')
@section('update')
    {{ route('discounts.update',$discount) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$discount->name}}" autofocus></br>
    <input class="form-control" type="text" name="code" placeholder="Code" value="{{$discount->code}}"></br>
    <input class="form-control" type="number" name="percentage" placeholder="Percentage" value="{{$discount->percentage}}"></br>
    <input class="form-control" type="boolean" name="valid" placeholder="Valid" value="{{$discount->valid}}"></br>
@endsection
