@extends('admin.layoutadmin')
@section('linkCss')
<link rel="stylesheet" href="{{asset('css/listadoFotos.css')}}">
@endsection
@section('contenidoAdmin')
<div class="col-md-4">
 <form method="POST" action="{{url('auth/register')}}">
   {!! csrf_field() !!}
    <div class="form-group">
    <label for="categoria">Tipo de usuario:</label>
    <select class="form-control" name="categoria">
      <option value="alumno" name="alumno">Todos</option>
      <option value="alumno" name="alumno">Alumno/Alumna</option>
      <option value="tutor" name="tutor">Padre/Madre</option>
      <option value="profesor" name="profesor">Profesor/Profesora</option>
    </select>
    </div>
</form>
</div>

<div class="col-md-4">
 <form method="POST" action="{{url('auth/register')}}">
   {!! csrf_field() !!}
    <div class="form-group">
    <label for="categoria">Resultados</label>
    <input type="number" name="numResultados" min="0" value="10">
    </div>
</form>
</div>

<div class="col-md-4">
 <form method="POST" action="{{url('auth/register')}}">
   {!! csrf_field() !!}
    <div class="form-group">
     <button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnFiltrar">Filtrar</button>
    </div>
</form>
</div>
@endsection