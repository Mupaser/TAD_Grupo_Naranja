@extends('layouts.app')
@section('title', 'Address')
@section('single')
    {{ $address->country }}
@endsection
@section('show')
    <p class="info-text">{{ $address->city }}</p>
    <p class="info-text">Street: {{ $address->street }}</p>
    <p class="info-text">Zip Code: {{ $address->zipCode }}</p>
@endsection
@section('edit')
    {{ route('addresses.edit', $address) }}
@endsection
@section('delete')
    {{ route('addresses.destroy', $address) }}
@endsection