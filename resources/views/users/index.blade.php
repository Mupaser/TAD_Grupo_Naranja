@extends('layouts.app')
@section('title','Users')
@section('index')
@foreach($users as $user)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('users.destroy',$user)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$user->name}}</h3>
                <p class="info-text">{{$user->lastName}}</p>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('users.show', $user) }}" class="btn bg-primary w-100">Show</a>
                </div>
                <div class="button col">
                    <a href="{{ route('users.edit', $user) }}" class="btn bg-primary w-100">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
<div class="col-lg-3 col-md-6 col-12 mt-4">
        <button><a href="{{ route('users.create') }}">Create User</a></button>
    </div>
@endsection
@section('create')
{{route('users.create')}}
@endsection
@section('paginate')
{{ $users->links() }}
@endsection
