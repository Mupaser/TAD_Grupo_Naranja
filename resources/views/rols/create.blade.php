@extends('layouts.app')
@section('title', 'Rol')
@section('single','Create rol')
@section('store')
    {{ route('rols.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" autofocus></br>
    <textarea class="form-control" name="description" placeholder="Description"></textarea></br>
@endsection