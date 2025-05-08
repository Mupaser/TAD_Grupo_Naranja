@extends('layouts.app')
@section('title', 'User')
@section('single')
    {{ $user->name }}'s profile
@endsection
@section('show')
    <div class="row">
        <h3 class="title mt-2">Personal Information</h3>
        <p class="info-text">Last name: {{ $user->lastName }}</p>
        <p class="info-text">E-mail: {{ $user->emailAddress }}</p>
        <p class="info-text">Phone number: {{ $user->phone }}</p>
        <p class="info-text">Rol: {{ $user->rol->name }}</p>
    </div>
    <div class="row mt-4">
        @if (!$user->addresses)
            <h3 class="info-title">Addresses</h3>
            <p class="info-text">No addresses available.</p>
        @else
            <h3 class="info-title">Addresses</h3>
            @foreach ($user->addresses as $address)
                <h5 class="info-text mt-3">Address {{ $loop->iteration }}</h3>
                <p class="info-text">Country: {{ $address->country }}</p>
                <p class="info-text">City: {{ $address->city }}</p>
                <p class="info-text">Street: {{ $address->street }}</p>                
                <p class="info-text">Zip Code: {{ $address->zipCode }}</p>
                <div class="row justify-content-center">
                    <div class="button col">
                        <form action="{{ route('addresses.destroy', $address) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-primary w-100">Delete</button>
                        </form>
                    </div>
                    <div class="button col">
                        <a href="{{ route('addresses.edit', $address) }}" class="btn bg-primary w-100">Edit</a>
                    </div>    
                </div>       
            @endforeach
        @endif
        <div class="button col mt-4">
            <a href="{{ route('addresses.create') }}" class="btn bg-primary w-100">Add</a>
        </div>
    </div>
    <div class="row mt-4">
        @if (!$user->payment)
            <h3 class="info-title">Payments Methods</h3>
            <p class="info-text">No payment methods available.</p>
        @else
            @foreach ($user->payments as $payment)
                <h5 class="info-text mt-3">Payments Method {{ $loop->iteration }}</h5>
                <p class="info-text">Name: {{ $payment->type }}</p>
            @endforeach
        @endif
    </div>
@endsection
@section('edit')
    {{ route('users.edit', $user) }}
@endsection
@section('delete')
    {{ route('users.destroy', $user) }}
@endsection
