@extends('admin.layoutadmin')
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='text-success'>
    {{Session::get('mensaje')}}
</div>
@endif

    <form method='post' action='{{url("adminCategorias")}}' enctype='multipart/form-data'>
    {{csrf_field()}}

   <label for="titulo">Titulo Categoria:</label>
   <input type="text" name="titulo" class="form-control" value="{{Input::old('titulo')}}" />
   <div class="text-danger">{{$errors->first('titulo')}}</div>

   <label for="descripcion">Descripcion Categoria:</label>
   <input type="text" name="descripcion" class="form-control" value="{{Input::old('descripcion')}}" />
   <div class="text-danger">{{$errors->first('descripcion')}}</div>
 	<button type="submit" class="btnTabla btnCategori">Enviar</button>



    </form>
@endsection