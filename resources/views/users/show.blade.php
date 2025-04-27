@extends('layouts.app')
@section('title', 'User')
@section('single')
    {{ $user->name }}
@endsection
@section('show')
    <p class="info-text">{{ $user->lastName }}</p>
    <p class="info-text">Email: {{ $user->emailAddress }}</p>
    <p class="info-text">Telefono: {{ $user->phone }}</p>
    <p class="info-text">Rol: {{ $user->rol->name }}</p>
@endsection
@section('edit')
    {{ route('users.edit', $user) }}
@endsection
@section('delete')
    {{ route('users.destroy', $user) }}
@endsection
