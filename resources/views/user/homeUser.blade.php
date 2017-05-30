@extends('user.layoutUser')

@section('contenidoUser')

<div class="row-fluid ">
			<div class="col-md-12 capaPos masVotada barraFondo"></div>

<div class="col-md-3 contentPerfil"> 	
@if (Session::has('mensaje'))
<div class='alert alert-info'>
    {{Session::get('mensaje')}}
</div>
@endif

        <img class="img-responsive imgPerfil" src="fotosPerfil/{{Auth::user()->fotoPerfil}}">
        <h5 class="txtUser">{{Auth::user()->name}}</h5>
        <h5>{{Auth::user()->email}}</h5>

</div>

<div class="col-md-6 "> 	
<form method='post' action='{{url("homeUser")}}' enctype='multipart/form-data'>
{{csrf_field()}}
	<div class='form-group'>
		<label for='imagePerfil'>Cambiar imagen de perfil</label>
		<input type="file" name="imagePerfil" />
		<div class="text-danger">{{$errors->first('imagePerfil')}}</div>
		<button type='submit' class='btn-primary'>Subir Imagen</button>
	</div>

</form>
</div>





<div class="col-md-4">
	<i class="fa fa-camera" aria-hidden="true"></i>
	<p>Fotos Totales: {{$datosUsuario['nFotos']}}</p>
	<i class="fa fa-thumbs-up" aria-hidden="true"></i>
	<p>Votos totales: {{$datosUsuario['nVotosTotales']}}</p>
</div>

</div>



<div class="row-fluid ">
			<div class="col-md-12 capaPos masVotada barraFondo"></div>

			<div class="col-md-12 capaPos  ">

			<div class="col-md-5 capaPos">
			<p class="eleCentrados minTit">Mejor Votada</p>
			@if($datosUsuario['mejorFotoUsuario']!=null)
<img class="img-responsive imgMasVotada thumbnail" src="fotografias/{{$datosUsuario['mejorFotoUsuario']->nombreArchivo}}" />
			@else
					<img  class="img-responsive thumbnail miniFoto" src="http://www.freeiconspng.com/uploads/no-image-icon-11.PNG" />

			@endif

			</div>

			<div class="col-md-3 capaPos">
							<p class="eleCentrados minTit">Votos: </p>

				<div class="posicion">
				@if($datosUsuario['mejorFotoUsuario']!=null)
				<p class="eleCentrados pos">{{$datosUsuario['mejorFotoUsuario']->votos}}</p>
				@else
				<p class="eleCentrados pos">0</p>

				@endif
				</div>
			</div>

			<div class="col-md-4 capaPos">
				<p class="eleCentrados minTit">Categoria</p>
					@if($datosUsuario['tituloCategoria']!=null)
				<p class="eleCentrados categoriaTxt">{{$datosUsuario['tituloCategoria']}}</p>
				@else
				<p class="eleCentrados categoriaTxt">Sin Categoria</p>
								@endif


			</div>

			</div>
</div>


@endsection