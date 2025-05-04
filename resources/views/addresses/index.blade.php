@extends('layouts.app')
@section('title', 'Addresses')
@section('index')
    @foreach ($addresses as $address)
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <form action="{{ route('addresses.destroy', $address) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
                </form>
            <div class="product-info">
                <div class="info-body">
                    <h3 class="title">{{ $address->country }}</h3>
                    <p class="info-text">{{ $address->city }}</p>
                    <p class="info-text">{{ $address->street }}</p>
                    <p class="info-text">{{ $address->zipCode }}</p>
                </div>
                <div class="row">
                    <div class="button col">
                        <a href="{{ route('addresses.show', $address) }}" class="btn bg-primary w-100">Show</a>
                    </div>
                    <div class="button col">
                        <a href="{{ route('addresses.edit', $address) }}" class="btn bg-primary w-100">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('create')
    {{ route('addresses.create') }}
@endsection
@section('paginate')
{{ $addresses->links() }}
@endsection