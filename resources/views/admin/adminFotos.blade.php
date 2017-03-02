@extends('admin.layoutadmin')
@section('contenidoAdmin')

    <form method='post' action='{{url("adminFotos")}}' enctype='multipart/form-data'>
    {{csrf_field()}}
    <div class="col-md-12 ">
    @foreach($fotos as $foto)
    	<div class="row">
    	<img class="img-responsive" src="fotografias/{{$foto->nombreArchivo }}" />
    	<label for="visible">Visible: </label>
    	@if($foto->visible==0)
    		<input type="checkbox" name="visible" />
    	@else
    		<input type="checkbox" name="visible" checked="true"/>
    	@endif
    	</div>
    @endforeach
	

	</div>
		<button type="submit" name="btnGuardar" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnIm">Guardar Cambios</button>	
    </form>

 		<?php echo $fotos->render(); ?>

        <p>Pagina {{$fotos->currentPage()}} de {{$fotos->lastPage()}}</p>
@endsection