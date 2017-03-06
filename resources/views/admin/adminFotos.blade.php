@extends('admin.layoutadmin')
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='text-success'>
    {{Session::get('mensaje')}}
</div>
@endif


<table class="table table-striped">
          <tr>
            <th>Fotografia</th>
            <th>Titulo</th>
            <th>Visible</th>
            <th>Autor</th>

          </tr>
            @foreach ($fotos as $foto)
          <tr>
            <td>  
            <img class="img-responsive" src="fotografias/{{$foto->nombreArchivo }}" />
            </td>
            <td>{{$foto->Titulo}}</td>
            <td>{{$foto->visible}}</td>
            <td>Nombre Autor</td>
            <td>
            <form method='post' action='{{url("adminFotos")}}' enctype='multipart/form-data'>{{csrf_field()}}
             <label for="visible">Visible: </label>
        @if($foto->visible==0)
            <input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" />
        @else
            <input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" checked="true"/>
        @endif

            <label for="oculta">Oculta: </label>
        @if($foto->visible==0)
            <input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}"  checked="true" />
        @else
            <input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}"/>
        @endif    


        <button type="submit" name="btnGuardar" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnIm">Guardar Cambios</button>     
     
            </form>

            </td>
          </tr>
          @endforeach
        </table>


      <div class="col-md-8">         
        {!! $fotos->render() !!}
        </div>


<!--
    <form method='post' action='{{url("adminFotos")}}' enctype='multipart/form-data'>
    {{csrf_field()}}
    @foreach($fotos as $foto)

    	<img class="img-responsive" src="fotografias/{{$foto->nombreArchivo }}" />
    	<label for="visible">Visible: </label>
    	@if($foto->visible==0)
    		<input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" />
    	@else
    		<input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" checked="true"/>
    	@endif        
    @endforeach


	  <div class="col-md-8">         
        {!! $fotos->render() !!}
        </div>

		<button type="submit" name="btnGuardar" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnIm">Guardar Cambios</button>	
    </form>
-->

@endsection