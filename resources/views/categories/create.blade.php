@extends('layouts.app')
@section('title', 'Categories')
@section('single','Create category')
@section('store')
    {{ route('categories.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Category Name" autofocus></br>
    <input class="form-control" type="text" name="description" placeholder="Category Description"></br>
@endsection