@extends('admin.layoutadmin')
@section('linkCss')
<link rel="stylesheet" href="{{asset('css/listadoFotos.css')}}">
@endsection
@section('contenidoAdmin')
{!!Form::model(Request::all(), [ 'method' => 'POST' ]) !!}
<div class="col-md-4">
    <div class="form-group">
    <label for="categoria">Tipo de usuario:</label>

    {!! Form::select('categoria', [
    'todos' => 'Todos',
    'alumno' => 'Alumno/Alumna',
    'tutor' => 'Padre/Madre',
    'profesor' => 'Profesor/Profesora']
    ,null, ['class' =>'form-control']) !!}
 
    </div>

</div>

<div class="col-md-4">
    <div class="form-group">
    <label for="categoria">Resultados</label>
    {!! Form::number('numResultados',null,['class' =>'form-control'])!!}
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
     <button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnFiltrar">Filtrar</button>
    </div>
{!! Form::close()!!}
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
        {!! $fotos->appends(Request::only(['categoria','numResultados']))->render() !!}
        </div>

@endsection