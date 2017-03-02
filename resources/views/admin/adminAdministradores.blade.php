@extends('admin.layoutadmin')
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='text-success'>
    {{Session::get('mensaje')}}
</div>
@endif

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