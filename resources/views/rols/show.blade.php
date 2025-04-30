@extends('layouts.app')
@section('title', 'Rol')
@section('single')
    {{ $rol->name }}
@endsection
@section('show')
    <p class="info-text">Description: {{ $rol->description }}</p>
@endsection
@section('edit')
    {{ route('rols.edit', $rol) }}
@endsection
@section('delete')
    {{ route('rols.destroy', $rol) }}
@endsection
