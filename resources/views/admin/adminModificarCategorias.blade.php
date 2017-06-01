@extends('admin.layoutadmin')
@section('linkCss')
<link rel="stylesheet" href="{{asset('css/generarCategorias.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
@endsection
@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='alert alert-info'>
    {{Session::get('mensaje')}}
</div>
@endif

    <form method='post' action='{{url("adminModificarCategorias")}}' enctype='multipart/form-data'>
    {{csrf_field()}}
   <label for="titulo">Titulo Categoria:</label>
       {{$categoria->Titulo}}

   <input type="hidden" name="idCategoria" value="{{$categoria->idCategoria}}"/>
   <input type="text" name="titulo" class="form-control" value="{{$categoria->Titulo}}" />
   <div class="text-danger">{{$errors->first('titulo')}}</div>

   <label for="descripcion">Descripcion Categoria:</label>
   <input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" />
   <div class="text-danger">{{$errors->first('descripcion')}}</div>

   <label for="limite">Limite fotos por cada usuario</label>
   <input type="number" name="limite" class="form-control" value="{{$categoria->limite}}" />
   <div class="text-danger">{{$errors->first('limite')}}</div>

  <label for='image'>Imagen para banner inicio: </label>
  <input type="file" name="banner" />

  <div class='text-danger'>{{$errors->first('banner')}}</div>
   
  <button type="submit" name="btnModificar" class="btnTabla btnCategori">Modificar Categoria</button>
  </form>


<script>


$(document).ready(function() {

$("#radio_1").prop("checked", true)


    $('label').change(function() {
        $('label').parent().removeClass('yellowBackground');
        $(this).parent().addClass('yellowBackground');
    });
});

</script>   
@endsection



