@extends('layouts.app')
@section('title', 'Category')
@section('single','Edit category')
@section('update')
    {{ route('categories.update',$category) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Category Name" value="{{$category->name}}" autofocus></br>
    <input class="form-control" type="text" name="description" placeholder="Category Description" value="{{$category->description}}"></br>
@endsection