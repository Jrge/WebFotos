@extends('admin.layoutadmin')
@section('linkCss')
<link rel="stylesheet" href="{{asset('css/generarCategorias.css')}}">
@endsection
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

<div class="col-md-12 containerIcons">

  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio"> 
   Naturaleza</label>


   <i id="iconoMostrar" class="fa fa-pagelines" aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio"> 
   Hoja</label>


   <i id="iconoMostrar" class="fa fa-leaf" aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio"> 
   Home</label>


   <i id="iconoMostrar" class="fa fa-home" aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio"> 
   Lapiz</label>


   <i id="iconoMostrar" class="fa fa-pencil" aria-hidden="true"></i>
</div>


</div>
   
   
  <button type="submit" class="btnTabla btnCategori">Enviar</button>

    </form>

   
@endsection

<script>


$( ".target" ).change(function() {
  alert( "Handler for .change() called." );
});



$( "#myselect" ).change(function() {
  var str = $( "#myselect option:selected" ).value(); 
  alert( "Handler for .change() called." );
});



</script>