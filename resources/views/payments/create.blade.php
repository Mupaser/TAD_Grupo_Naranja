@extends('layouts.app')
@section('title', 'Create Payment')
@section('content')
<div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
                <div class="product-info">
                    <form action="{{ route('payments.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required><br>

                        <div class="button mt-3">
                            <button type="submit" class="btn bg-primary"><i class="lni lni-cart"></i>Create</button>
                            <a href="{{ route('payments.index') }}" class="btn bg-primary"><i class="lni lni-cart"></i>Back</a>
                        </div>
                    </form>    
                </div>
            </div>
        </div> 
@endsection
    