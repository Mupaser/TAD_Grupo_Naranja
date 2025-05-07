@extends('layouts.app')
@section('title', 'Categories')
@section('index')
@foreach ($categories as $category)
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <form action="{{ route('categories.destroy', $category) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
            </form>
            <div class="product-info">
                <div class="info-body">
                    <h3 class="title">{{ $category->name }}</h3>
                </div>
                <div class="row">
                    <div class="button col">
                        <a href="{{ route('categories.show', $category) }}" class="btn bg-primary w-100">Show</a>
                    </div>
                    <div class="button col">
                        <a href="{{ route('categories.edit', $category) }}" class="btn bg-primary w-100">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
@endforeach
@endsection
@section('create')
    {{ route('categories.create') }}
@endsection
@section('paginate')
    {{ $categories->links() }}
@endsection