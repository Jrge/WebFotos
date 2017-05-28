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

    <form method='post' action='{{url("adminCategorias")}}' enctype='multipart/form-data'>
    {{csrf_field()}}

   <label for="titulo">Titulo Categoria:</label>
   <input type="text" name="titulo" class="form-control" value="{{Input::old('titulo')}}" />
   <div class="text-danger">{{$errors->first('titulo')}}</div>

   <label for="descripcion">Descripcion Categoria:</label>
   <input type="text" name="descripcion" class="form-control" value="{{Input::old('descripcion')}}" />
   <div class="text-danger">{{$errors->first('descripcion')}}</div>

   <label for="limite">Limite fotos por cada usuario</label>
   <input type="number" name="limite" class="form-control" value="{{Input::old('limite')}}" />
   <div class="text-danger">{{$errors->first('limite')}}</div>

  <label for='image'>Imagen para banner inicio: </label>
  <input type="file" name="banner" />
  <div class='text-danger'>{{$errors->first('image')}}</div>


<label>Selecciona un icono</label>


<div class="ContainerIconosSelect row-fluid"> 

<div class="col-md-12 containerIcons">
  <div class="iconCapa col-md-3 yellowBackground">
   <label class="radio-inline " >
   <input id="radio_1" type="radio" checked="checked" name="optradio" value="fa fa-pagelines" /> 
   Naturaleza  1</label>
   <i id="iconoMostrar" class="fa fa-pagelines"  aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-leaf"/> 
    Naturaleza  2</label>
   <i id="iconoMostrar" class="fa fa-leaf"  aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-paint-brush"/> 
   Arte 1</label>
   <i id="iconoMostrar" class="fa fa-paint-brush" aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-pencil"/> 
   Arte 2</label>
   <i id="iconoMostrar" class="fa fa-pencil" aria-hidden="true"></i>
</div>
</div>

<!--SECOND -->

<div class="col-md-12 containerIcons">
  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-futbol-o"> 
   Deporte</label>
   <i id="iconoMostrar" class="fa fa-futbol-o"  aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-bicycle"> 
   Deporte 2</label>
   <i id="iconoMostrar" class="fa fa-bicycle"  aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-university"> 
   Edificio</label>
   <i id="iconoMostrar" class="fa fa-university" aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-home"> 
   Edificio</label>
   <i id="iconoMostrar" class="fa fa-home" aria-hidden="true"></i>
</div>
</div>


<!--TERCERO -->

<div class="col-md-12 containerIcons">
  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input  type="radio" name="optradio" value="fa fa-car"> 
   Vehículo 1</label>
   <i id="iconoMostrar" class="fa fa-car"  aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-plane"> 
   Vehículo 2</label>
   <i id="iconoMostrar" class="fa fa-plane"  aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-users"> 
   Personas 1</label>
   <i id="iconoMostrar" class="fa fa-users" aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-user"> 
  User</label>
   <i id="iconoMostrar" class="fa fa-user" aria-hidden="true"></i>
</div>
</div>


<!--CUARTO -->

<div class="col-md-12 containerIcons">
  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-shopping-basket"> 
   Mercado</label>
   <i id="iconoMostrar" class="fa fa-shopping-basket"  aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-umbrella"> 
   Tiempo</label>
   <i id="iconoMostrar" class="fa fa-umbrella"  aria-hidden="true"></i>
</div>

  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-thermometer-three-quarters"> 
  Tiempo 2</label>
   <i id="iconoMostrar" class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>
</div>

  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-graduation-cap"> 
   Educación</label>
   <i id="iconoMostrar" class="fa fa-graduation-cap" aria-hidden="true"></i>
</div>
</div>


<!--CUARTO -->

<div class="col-md-12 containerIcons">
  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-heart"> 
   Corazón</label>
   <i id="iconoMostrar" class="fa fa-heart"  aria-hidden="true"></i>
</div>

   <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-paw"> 
   Animales</label>
   <i id="iconoMostrar" class="fa fa-paw"  aria-hidden="true"></i>
</div>


  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-cutlery"> 
  Comida</label>
   <i id="iconoMostrar" class="fa fa-cutlery" aria-hidden="true"></i>
</div>

  <div class="iconCapa col-md-3">
   <label class="radio-inline">
   <input type="radio" name="optradio" value="fa fa-trophy"> 
   Trofeos</label>
   <i id="iconoMostrar" class="fa fa-trophy" aria-hidden="true"></i>
</div>
</div>

</div><!--ContainerLogosSelect-->


   
   
  <button type="submit" class="btnTabla btnCategori">Generar Categoria</button>
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



