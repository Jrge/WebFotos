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
      <option value="todos" name="todos">Todos</option>
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
 <form method="POST" action="{{url('adminListadoFotografias')}}">
   {!! csrf_field() !!}
    <div class="form-group">
     <button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnFiltrar">Filtrar</button>
    </div>
</form>
</div>


<div class="row-fluid">
<div class="col-md-12">

<table class="table table-striped">
          <tr>
            <th>Fotografia</th>
            <th>Votos</th>
            <th>Tipo Participantes</th>
            <th>id Participante</th>
          </tr>
            @foreach ($fotos as $foto)
          <tr>
            <td>  
            <img class="img-responsive imgTable" src="fotografias/{{$foto->nombreArchivo }}" />
            </td>
            <td>{{$foto->votos}}</td>
            <td>{{$foto->tipoParticipante}}</td>
            <td>{{$foto->idParticipante}}</td>
          </tr>
          @endforeach
        </table>

</div>
</div>


  <div class="col-md-8">         
        {!! $fotos->render() !!}
        </div>

@endsection