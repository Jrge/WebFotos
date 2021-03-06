<?php
use App\Models\Categoria;
$categorias=Categoria::get();

?>

@extends('user.layoutUser')
@section('contenidoUser')



@if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif

			<h2 class="colorGrey">Subir imagen</h2>
			<form method='post' action='{{url("user")}}' enctype='multipart/form-data'>
				{{csrf_field()}}
				<div class='form-group'>
					<label for='image'>Imagen: </label>
					<input type="file" name="image" />
					<div class='text-danger'>{{$errors->first('image')}}</div>

                    <label for="name">Titulo:</label>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" />
                    <div class="text-danger">{{$errors->first('titulo')}}</div>

                    <label for="name">Descripcion:</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" />
                    <div class="text-danger">{{$errors->first('descripcion')}}</div>
				</div>

				@foreach ($categorias as $categoria)
			   	<div class="radio">
			   		@if($categoria->idCategoria==1)
	      			<label><input type="radio" name="optradio" checked="true" value='{{ $categoria->Titulo }}'> {{ $categoria->Titulo }}</label>
	      			@else
	      			<label><input type="radio" name="optradio" value='{{ $categoria->Titulo }}'> {{ $categoria->Titulo }}</label>
	      			@endif

	   			</div>
				@endforeach


				<button type='submit' class='btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnLargo'>Subir Imagen</button>
			</form>
			<div>

			
			</div>
		</div>


	</div>
@endsection