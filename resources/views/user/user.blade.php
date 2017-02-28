
@extends('layout')
@section('content')
<div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="image/panelControl/categorias.jpg">
        </div>
    </div>
</div>

<div class="container-fluid nomarggin">
    <div class="row nomarggin" >
        <div class="col-md-12 nomarggin">
		<h1 class="userName">{{Auth::user()->name}}</h1>
        </div>
    </div>
</div>
@if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif

<did class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			
			<img src='{{url(Auth::user()->fotografias)}}' class='img-responsive'  />

		</div >

		<div class="col-md-6">
			<h2 class="colorGrey">Subir imagen</h2>
			<form method='post' action='{{url("user")}}' enctype='multipart/form-data'>
				{{csrf_field()}}
				<div class='form-group'>
					<label for='image'>Imagen: </label>
					<input type="file" name="image" />
					<div class='text-danger'>{{$errors->first('image')}}</div>
				</div>
				<button type='submit' class='btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnLargo'>Subir Imagen</button>
			</form>

		</div>


	</div>
</div>



@endsection