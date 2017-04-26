

@extends('user.layoutUser')
@section('contenidoUser')

@foreach ($categorias as $categoria)

<div class="col-md-12">
<h2>{{$categoria->Titulo}}<h2>
</div>


<div class="col-md-12 ">
@foreach ($fotos as $foto)
      @if (Auth::user()->id==$foto->idParticipante && $foto->idCategoria==$categoria->idCategoria)
      	<div class="col-md-{{12/$categoria->limite}} misFotos">
		<img class="img-responsive thumbnail miniFoto" src="fotografias/{{$foto->nombreArchivo }}"  />
		<h4>VOTOS: {{$foto->votos }} </h4>
		@if($foto->visible==1)
		<img class="img-responsive" src="image/Visibilidad.png" title="Imagen visible"  />
		@else
		<img class="img-responsive" src="image/NoVisibilidad.png" title="Esperando moderación"  />
		 @endif	

		</div>

      @else
        <div class="col-md-{{12/$categoria->limite}} misFotos">
		<img  class="img-responsive thumbnail miniFoto" src="http://www.freeiconspng.com/uploads/no-image-icon-11.PNG" />
		<h4>SIN VOTOS</h4>
		</div>
			 @endif	
@endforeach

</div>

@endforeach
   



@endsection


