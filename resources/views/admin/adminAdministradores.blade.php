@extends('admin.layoutadmin')
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='alert alert-info'>
    {{Session::get('mensaje')}}
</div>
@endif


	 <table class="table table-striped">
	      <tr>
	        <th>Nombre</th>
	        <th>Email</th>
	        <th>Administrador</th>
	      </tr>
			@foreach ($listaUsuarios as $lista)
	      <tr>
	        <td>{{$lista->name}}</td>
	        <td>{{$lista->email}}</td>
	        <td>{{$lista->admin}}</td>

	        <td>
	         <form method='post' action='{{url("adminAdministradores")}}' enctype='multipart/form-data'>{{csrf_field()}}
			<button type="submit"  name="promocionar" value="{{$lista->id}}" class="btn-primary btn-lg active ">Promocionar</button>
			</form>

	        </td>
	      </tr>
	      @endforeach
	    </table>
	<div class="text-danger">{{$errors->first('email')}}</div>

	    <div class="col-md-8">
	    	
	    {!! $listaUsuarios->render() !!}

	    </div>

<!--
    <form method='post' action='{{url("adminAdministradores")}}' enctype='multipart/form-data'>
    {{csrf_field()}}

	<div class="form-group">
	<label for="email">Email usuario a promocionar:</label>
	<input type="email" name="email" class="form-control" value="{{Input::old('email')}}" />
	<div class="text-danger">{{$errors->first('email')}}</div>

 	<button type="submit" class="btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnMarginTopP">Promocionar</button>


	</div>
	</form>
@endsection