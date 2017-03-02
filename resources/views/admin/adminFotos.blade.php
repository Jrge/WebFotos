@extends('admin.layoutadmin')
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='text-success'>
    {{Session::get('mensaje')}}
</div>
@endif


    <form method='post' action='{{url("adminFotos")}}' enctype='multipart/form-data'>
    {{csrf_field()}}
    @foreach($fotos as $foto)
        <div class="col-md-4 ">

    	<img class="img-responsive" src="fotografias/{{$foto->nombreArchivo }}" />
    	<label for="visible">Visible: </label>
    	@if($foto->visible==0)
    		<input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" />
    	@else
    		<input type="checkbox" name="fotos[]" value="{{$foto->nombreArchivo}}" checked="true"/>
    	@endif
    	</div>
        
    @endforeach
	

		<button type="submit" name="btnGuardar" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnIm">Guardar Cambios</button>	
    </form>

 		<?php echo $fotos->render(); ?>

        <p>Pagina {{$fotos->currentPage()}} de {{$fotos->lastPage()}}</p>
@endsection