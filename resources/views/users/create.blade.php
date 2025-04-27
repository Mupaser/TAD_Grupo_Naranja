@extends('layouts.app')
@section('title', 'User')
@section('single','Create user')
@section('store')
    {{ route('users.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Nombre" autofocus></br>
    <input class="form-control" type="text" name="lastName" placeholder="Apellidos"></br>
    <input class="form-control" type="email" name="emailAddress" placeholder="Direccion de correo"></br>
    <input class="form-control" type="number" name="phone" placeholder="Telefono"></br>
    <input class="form-control" type="password" name="password" placeholder="Contraseña"></br>
    <select class="form-control sele" name="rol_id">
        <option value="2">Cliente</option>
        <option value="3">Administrador</option>
    </select></br>
@endsection