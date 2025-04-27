@extends('layouts.app')
@section('title', 'Payment')
@section('content')
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="product-info">
                    <span class="name">ID: {{ $payment->id }}</span>
                    <h4 class="name">
                        <a href="product-grids.html">{{ $payment->name }}</a> 
                    </h4>
                    <div class="button mt-2">
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Edit</a>
                        <a href="{{ route('payments.destroy', $payment->id) }}" class="btn bg-primary"><i class="lni lni-cart"></i>Delete
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                    </div>
                    <div class="button mt-2">
                        <a href="{{ route('payments.index') }}" class="btn bg-primary"><i class="lni lni-cart"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
@endsection

