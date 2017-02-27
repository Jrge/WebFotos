@extends('layout')
@section('content')

<form method="POST"action="/auth/register">
        {!!csrf_field()!!}
    <div>
        <label for="name">Nombre</label>
        <input type="text"name="name"id="name"value="{{old('name')}}">
    </div>
        <div>
            <label for="email">Email</label>
            <input type="email"name="email"id="email"value="{{old('email')}}">
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password"name="password"id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirmarcontraseña</label>
            <input type="password"name="password_confirmation"id="password_confirmation">
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>

@endsection