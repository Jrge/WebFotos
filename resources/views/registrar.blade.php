@extends('layout')
@section('content')
 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="image/registrar/registrar.png">
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
            <form role="form" id="formRegistro">
              <div class="form-group">
                <label for="ejemplo_email_1">Email</label>
                <input type="email" class="form-control" id="ejemplo_email_1"
                       placeholder="Introduce tu email">
              </div>
              <div class="form-group">
                <label for="ejemplo_password_1">Contraseña</label>
                <input type="password" class="form-control" id="ejemplo_password_1" 
                       placeholder="Contraseña">
              </div>

                <div class="form-group">
                <label for="Confirmar contraseña">Confirmar contraseña</label>
                <input type="password" class="form-control" name="confirmPassword" />
                </div>
              
              <button type="submit" class="btn btn-primary btn-lg active btnRegistrarse btnFormulario">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script>
$('#formRegistro').formValidation({
    framework: 'bootstrap',
    fields: {
        password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    message: 'The password and its confirm are not the same'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password and its confirm are not the same'
                }
            }
        }
    }
});
</script>

<!--
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
    -->
@endsection