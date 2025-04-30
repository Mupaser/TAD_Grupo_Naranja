@extends('layouts.app')
@section('title', 'Rol')
@section('single','Edit rol')
@section('update')
    {{ route('rols.update',$rol) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$rol->name}}" autofocus></br>
    <textarea class="form-control" name="description" placeholder="Description">{{$rol->description}}</textarea></br>
@endsection