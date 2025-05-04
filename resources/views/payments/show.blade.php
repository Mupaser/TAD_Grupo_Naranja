@extends('layouts.app')
@section('title', 'Payment')
@section('single')
    {{ $payment->name }}
@endsection
@section('show')
    <p class="info-text">ID: {{ $payment->id }}</p>
@endsection
@section('edit')
    {{ route('payments.edit', $payment) }}
@endsection
@section('delete')
    {{ route('payments.destroy', $payment) }}
@endsection
