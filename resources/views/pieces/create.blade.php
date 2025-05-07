@extends('layouts.app')
@section('title', 'Pieces')
@section('single','Create piece')
@section('store')
    {{ route('pieces.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" autofocus></br>
    <input class="form-control" type="number" name="price" placeholder="Price"></br>
    <input class="form-control" type="text" name="state" placeholder="State"></br>
    <input class="form-control" type="text" name="offer" placeholder="Offer"></br>
    <input class="form-control" type="text" name="description" placeholder="Description"></br>
    <input class="form-control" type="text" name="image" placeholder="Image"></br>
@endsection
