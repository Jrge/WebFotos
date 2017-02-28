
@extends('layout')
@section('content')
 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="../image/login/login.jpg">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="container text-danger">
                  @if (Session::has('message'))
                   {{Session::get('message')}}
                  @endif
                 </div>
                 <form method="post" action="{{url('auth/login')}}">
                  {{csrf_field()}}
                  <div class="form-group">
                   <label for="email">Email:</label>
                   <input type="email" name="email" class="form-control" value="{{Input::old('email')}}" />
                   <div class="text-danger">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                   <label for="password">Password:</label>
                   <input type="password" name="password" class="form-control" />
                   <div class="text-danger">{{$errors->first('password')}}</div>
                  </div>
                      <div class="form-group">
                       <label for="remember">No cerrar sesión:</label>
                       <input type="checkbox" name="remember" />
                      </div>
                  <button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin">Enviar</button>
                 </form>
        </div>
        
    </div>
</div>

<!--
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
-->
@endsection