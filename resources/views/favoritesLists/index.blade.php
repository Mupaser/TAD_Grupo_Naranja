@extends('layouts.app')
@section('title','Favorites Lists')
@section('index')
@foreach($favoritesLists as $favoritesList)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('favoritesLists.destroy',$favoritesList)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$favoritesList->user->name}}'s favorites list</h3>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('favoritesLists.show', $favoritesList) }}" class="btn bg-primary w-100">Show</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('paginate')
{{ $favoritesLists->links() }}
@endsection