@extends('layouts.app')
@section('title', 'Favoritest List')
@section('single')
    {{ $favoritesList->user->name }}'s favorites list
@endsection
@section('show')
    @foreach($favoritesList->pieces as $piece)
    <h4 class="">{{ $piece->name }}</h4>
    <p class="">Description: {{ $piece->description }}</p>
    <p class="">Price: {{ $piece->price }}</p>
    <p class="info-text">State: {{ $piece->state }}</p>
    @endforeach
@endsection
@section('delete')
    {{ route('favoritesLists.destroy', $favoritesList) }}
@endsection
