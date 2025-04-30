@extends('layouts.app')
@section('title','Rols')
@section('index')
@foreach($rols as $rol)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('rols.destroy',$rol)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$rol->name}}</h3>
                <p class="info-text">{{$rol->description}}</p>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('rols.show', $rol) }}" class="btn bg-primary w-100">Show</a>
                </div>
                <div class="button col">
                    <a href="{{ route('rols.edit', $rol) }}" class="btn bg-primary w-100">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('create')
{{route('rols.create')}}
@endsection
@section('paginate')
{{ $rols->links() }}
@endsection