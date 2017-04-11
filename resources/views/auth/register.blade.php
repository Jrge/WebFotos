@extends('layout')
@section('content')
 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="../image/registrar/registrar.png">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            
            <div class="text-info">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>

            <form method="POST" action="{{url('auth/register')}}">
                {!! csrf_field() !!}

                <div class='form-group'>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                    <div class="text-danger">{{$errors->first('name')}}</div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                    <div class="text-danger">{{$errors->first('email')}}</div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" />
                    <div class="text-danger">{{$errors->first('password')}}</div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Password:</label>
                    <input type="password" class="form-control" name="password_confirmation" />
                </div>


                <div class="form-group">
                <label for="categoria">Soy:</label>
                <select class="form-control" name="tipoUsuario">
                  <option value="alumno" name="alumno">Alumno/Alumna</option>
                  <option value="tutor" name="tutor">Padre/Madre</option>
                  <option value="profesor" name="profesor">Profesor</option>
                </select>
                </div>

                <div class="form-group">

                   <input type="checkbox" name="aceptar">
                   <label for="terminos">Acepto los <a data-toggle="modal" href="#myModal">Términos y condiciones de uso</a></label>
                    <div class="text-danger">{{$errors->first('aceptar')}}</div>
                </div>
                    
                <div>
                    <button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Términos y condiciones de uso</h3>
        </div>
        <div class="modal-body">
          <p>Texto</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>



 

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