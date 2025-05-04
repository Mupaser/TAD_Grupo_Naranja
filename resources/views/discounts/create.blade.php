@extends('layouts.app')
@section('title', 'Discount')
@section('single','Create discount')
@section('store')
    {{ route('discounts.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" autofocus></br>
    <input class="form-control" type="text" name="code" placeholder="Code"></br>
    <input class="form-control" type="number" name="percentage" placeholder="Percentage"></br>
    <input class="form-control" type="boolean" name="valid" placeholder="Valid"></br>
@endsection