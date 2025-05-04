@extends('layouts.app')
@section('title', 'Payments')
@section('index')
@foreach($payments as $payment)
<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <form action="{{route('payments.destroy',$payment)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-close btn-close-white bg-primary" aria-label="Close"></button>
        </form>
        <div class="product-info">
            <div class="info-body">
                <h3 class="title">{{$payment->name}}</h3>
            </div>
            <div class="row">
                <div class="button col">
                    <a href="{{ route('payments.show', $payment) }}" class="btn bg-primary w-100">Show</a>
                </div>
                <div class="button col">
                    <a href="{{ route('payments.edit', $payment) }}" class="btn bg-primary w-100">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
@endforeach
@endsection
@section('create')
    {{route('payments.create')}}
@endsection
@section('paginate')
    {{ $payments->links() }}
@endsection