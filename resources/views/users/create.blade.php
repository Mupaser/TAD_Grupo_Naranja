@extends('layouts.app')
@section('title', 'User')
@section('single','Create user')
@section('store')
    {{ route('users.store') }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" autofocus></br>
    <input class="form-control" type="text" name="lastName" placeholder="Last name"></br>
    <input class="form-control" type="email" name="emailAddress" placeholder="Email address"></br>
    <input class="form-control" type="number" name="phone" placeholder="Phone"></br>
    <input class="form-control" type="password" name="password" placeholder="Password"></br>
    <select class="form-control sele" name="rol_id">
        <option value="2">Cliente</option>
        <option value="3">Administrador</option>
    </select></br>
@endsection