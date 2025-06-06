@extends('layouts.app')
@section('title', 'Discounts')
@section('index')
@foreach($discounts as $discount)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('discounts.destroy',$discount)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$discount->name}}</h3>
                <p class="info-text">Code: {{$discount->code}}</p>
                <p class="info-text">Percentage: {{$discount->percentage}}</p>
                <p class="info-text">Valid: {{ $discount->valid ? 'true' : 'false' }}</p>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('discounts.show', $discount) }}" class="btn bg-primary w-100">Show</a>
                </div>
                <div class="button col">
                    <a href="{{ route('discounts.edit', $discount) }}" class="btn bg-primary w-100">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('create')
    {{route('discounts.create')}}
@endsection
@section('paginate')
    {{ $discounts->links() }}
@endsection