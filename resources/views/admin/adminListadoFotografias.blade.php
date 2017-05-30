@extends('admin.layoutadmin')
@section('linkCss')
<link rel="stylesheet" href="{{asset('css/listadoFotos.css')}}">
@endsection
@section('contenidoAdmin')


{!!Form::model(Request::all(), [ 'method' => 'POST' ]) !!}
<form method='post' action='{{url("adminListadoFotografias")}}' enctype='multipart/form-data'>
{!!csrf_field()!!}

<div class="col-md-4">


    <div class="form-group">

         <div class="checkbox">
          <label><input type="checkbox" name="alumno" value="alumno">Alumno/Alumna</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="tutor" value="tutor">Padre/Madre</label>
        </div>

        <div class="checkbox">
          <label><input type="checkbox" name="profesor" value="profesor">Profesor/Profesora</label>
        </div>
    </div>

</div>


<div class="col-md-4">
    <div class="form-group">
    <label for="categoria">Resultados</label>
    {!! Form::number('numResultados',null,['placeholder'=>'10'],['min'=>'1'],['class' =>'form-control'])!!}
    </div>
</div>



<div class="col-md-4">
    <div class="form-group">
     <button type="submit" class="btnTabla">Filtrar</button>
    </div>
</div>


</form>



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