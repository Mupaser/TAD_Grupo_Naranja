@extends('layouts.app')

@section('titulo', 'Piezas')

@section('content')
    <h1>Añadir Pieza</h1>
    <form action="{{ route('pieces.create') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre de la pieza" autofocus>
        <input type="text" name="price" placeholder="Precio de la pieza">
        <input type="text" name="offer" placeholder="Oferta de la pieza">
        <input type="text" name="description" placeholder="Descripción de la pieza">
        <input type="file" name="image" id="image">

        <button type="submit">
            Añadir pieza
        </button>
    </form>
@endsection()
