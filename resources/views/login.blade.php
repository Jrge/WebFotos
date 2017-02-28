
@extends('layout')
@section('content')
 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="image/login/login.jpg">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <form role="form">
              <div class="form-group">
                <label for="ejemplo_email_1">Nombre</label>
                <input type="text" class="form-control" id="ejemplo_email_1"
                       placeholder="Introduce tu email">
              </div>
         
              <div class="form-group">
                <label for="ejemplo_password_1">Contraseña</label>
                <input type="password" class="form-control" id="ejemplo_password_1" 
                       placeholder="Contraseña">
              </div>

                <div class="checkbox">
                  <label><input type="checkbox" value="">Recordar</label>
                </div>
              <button type="submit" class="btn btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin">Enviar</button>
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