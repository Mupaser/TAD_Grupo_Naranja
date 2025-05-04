@extends('layouts.app')
@section('title', 'Discount')
@section('single')
    {{ $discount->name }}
@endsection
@section('show')
    <p class="info-text">Code: {{ $discount->code }}</p>
    <p class="info-text">Percentage: {{ $discount->percentage }}</p>
    <p class="info-text">Valid: {{ $discount->valid }}</p>
@endsection
@section('edit')
    {{ route('discounts.edit', $discount) }}
@endsection
@section('delete')
    {{ route('discounts.destroy', $discount) }}
@endsection