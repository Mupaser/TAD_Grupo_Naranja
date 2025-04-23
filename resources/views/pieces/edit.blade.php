@extends('layouts.app')

@section('titulo','Piezas')

@section('content')
    <h1>Editar Pieza</h1>
    <form action="{{ route('pieces.update', $piece) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nombre de la pieza" value="{{ $piece->name }}" autofocus>
        <input type="text" name="price" placeholder="Precio de la pieza" value="{{ $piece->price }}">
        <input type="text" name="offer" placeholder="Oferta de la pieza" value="{{ $piece->offer }}">
        <input type="text" name="description" placeholder="Descripción de la pieza" value="{{ $piece->description }}">
        <input type="file" name="image" id="image">
        <button type="submit">
            Editar pieza
        </button>
    </form>
@endsection()