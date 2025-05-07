@extends('layouts.app')
@section('title', 'Pieces')
@section('single','Edit piece')
@section('update')
    {{ route('pieces.update',$piece) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$piece->name}}" autofocus></br>
    <input class="form-control" type="text" name="description" placeholder="Description" value="{{$piece->description}}"></br>
    <input class="form-control" type="number" name="price" placeholder="Price" value="{{$piece->price}}"></br>
    <input class="form-control" type="text" name="state" placeholder="State" value="{{$piece->state}}"></br>
    <input class="form-control" type="text" name="offer" placeholder="Offer" value="{{$piece->offer}}"></br>
    <select class="form-control" name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $piece->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select></br>
    <input class="form-control" type="text" name="image" placeholder="Image" value="{{$piece->image}}"></br>
@endsection