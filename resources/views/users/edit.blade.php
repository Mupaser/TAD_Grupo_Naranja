@extends('layouts.app')
@section('title', 'User')
@section('single','Edit user')
@section('update')
    {{ route('users.update',$user) }}
@endsection
@section('inputs')
    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$user->name}}" autofocus></br>
    <input class="form-control" type="text" name="lastName" placeholder="Last name" value="{{$user->lastName}}"></br>
    <input class="form-control" type="email" name="emailAddress" placeholder="Email address" value="{{$user->emailAddress}}"></br>
    <input class="form-control" type="number" name="phone" placeholder="Phone" value="{{$user->phone}}"></br>
    <input class="form-control" type="password" name="password" placeholder="Password"></br>
    <select class="form-control sele" name="rol_id">
        @if($user->rol->name == 'Customer')
        <option selected value="2">Customer</option>
        <option value="3">Admin</option>
        @else
        <option value="2">Customer</option>
        <option selected value="3">Admin</option>
        @endif
    </select></br>
@endsection
