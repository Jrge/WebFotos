

@extends('user.layoutUser')
@section('contenidoUser')

@foreach ($categorias as $categoria)
<div class="row-fluid">
<div class="col-md-12 colTxtLeft">
<h2>{{$categoria->Titulo}}<h2>
</div>
</div>


<div class="row-fluid ">
<div class="col-md-12 barraFondo colTxtLeft">
</div>
</div>



<div class="row-fluid ">

<?php $contador = 0; ?>
@foreach ($fotos as $foto)

	      @if (Auth::user()->id==$foto->idParticipante && $foto->idCategoria==$categoria->idCategoria)
	      	<?php $contador++; ?>		
	      	<div class="col-md-{{12/$categoria->limite}} misFotos">
	      		<div class="fondoImg">
				<img class="img-responsive thumbnail miniFoto" src="fotografias/{{$foto->nombreArchivo }}"  />
				<h4>VOTOS: {{$foto->votos }} </h4>
				@if($foto->visible==1)
				<img class="img-responsive iconOjo" src="image/Visibilidad.png" title="Imagen visible"  />
				@else
				<img class="img-responsive iconOjo" src="image/NoVisibilidad.png" title="Esperando moderación"  />
			@endif
					</div>
							</div>
	
		@endif	

@endforeach
			
			<?php 
			$fotosFaltan =$categoria->limite ;
			$resto = $fotosFaltan - $contador;
			?>




	
      @for ($i = 0; $i < $resto; $i++)
		<div class="col-md-{{12/$categoria->limite}} misFotos">
		<div class="fondoImg">
		<img  class="img-responsive thumbnail miniFoto" src="http://www.freeiconspng.com/uploads/no-image-icon-11.PNG" />
		<h4>SIN VOTOS</h4>
		</div>
		</div>
	@endfor


</div>

@endforeach
   
@endsection


