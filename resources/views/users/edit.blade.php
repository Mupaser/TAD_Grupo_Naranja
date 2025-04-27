@extends('layouts.app')
@section('title', 'User')
@section('single','Edit user')
@section('update')
    {{ route('users.update',$user) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Nombre" value="{{$user->name}}" autofocus></br>
    <input class="form-control" type="text" name="lastName" placeholder="Apellidos" value="{{$user->lastName}}"></br>
    <input class="form-control" type="email" name="emailAddress" placeholder="Direccion de correo" value="{{$user->emailAddress}}"></br>
    <input class="form-control" type="number" name="phone" placeholder="Telefono" value="{{$user->phone}}"></br>
    <input class="form-control" type="password" name="password" placeholder="Contraseña"></br>
    <select class="form-control sele" name="rol_id">
        @if($user->rol->name == 'cliente')
        <option selected value="2">Cliente</option>
        <option value="3">Administrador</option>
        @else
        <option value="2">Cliente</option>
        <option selected value="3">Administrador</option>
        @endif
    </select></br>
@endsection
