@extends('layouts.app')
@section('title', 'Addresses')
@section('content')
    @foreach ($addresses as $address)
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="product-content">
                    <h3><a href="{{ route('addresses.show', $address->id) }}">{{ $address->country }}</a></h3>
                    <p>Address ID: {{ $address->id }}</p>
                    <button><a href="{{ route('addresses.edit', $address->id) }}">Edit</a></button>
                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-3 col-md-6 col-12 mt-4">
        <button><a href="{{ route('addresses.create') }}">Create Address</a></button>
    </div>
@endsection