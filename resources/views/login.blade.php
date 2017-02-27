@extends('layout')
@section('content')


<form method="POST"action="/auth/login">
        {!!csrf_field()!!}
        <div>
            <label for="email">Email</label>
            <input type="email" name="email"id="email"value="{{old('email')}}">
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password"name="password"id="password">
        </div>
        <div>
            <input type="checkbox"name="remember">Recuérdame
        </div>
        <div><button type="submit">Entrar</button>
        </div>
    </form>

@endsection