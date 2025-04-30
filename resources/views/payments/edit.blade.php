@extends('layouts.app')
@section('title', 'Edit Payment')
@section('content')
<div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="product-info">
                    <span class="name">ID: {{ $payment->id }}</span>
                    <h4 class="name">
                        <a href="product-grids.html">{{ $payment->name }}</a> 
                    </h4>
                    <form action="{{ route('payments.update', 'payment') }}" method="POST" class="form">
                        @method('PUT')    
                        @csrf
                        <label for="name" class="mt-3">Name:</label>
                        <input type="text" name="name" value="{{ $payment->name }}" required><br>
                    
                        <div class="button mt-3">
                            <a href="{{ route('payments.update', $payment->id) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Submit</a>
                            <a href="{{ route('payments.index') }}" class="btn bg-primary"><i class="lni lni-cart"></i>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
@endsection