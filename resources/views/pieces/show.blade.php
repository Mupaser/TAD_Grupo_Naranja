@extends('layouts.app')

@section('titulo','Piezas')

@section('content')
    <h1>Nombre {{ $piece->name }}</h1>
    <p>Precio: {{ $piece->price }}</p>
    <p>Estado: {{ $piece->estate }}</p>
    <p>Oferta: {{ $piece->offer }}</p>
    <p>Descripción: {{ $piece->description }}</p>
    <p>Imagen: {{ $piece->image }}</p>
    <button><a href="{{ route('pieces.edit', $piece) }}">Editar</a></button>
@endsection()
