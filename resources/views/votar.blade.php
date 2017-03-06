@extends('layout')
@section('content')
@if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif
 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
    <form method='post' action='{{url("votar")}}' enctype='multipart/form-data'>
    {{csrf_field()}}


        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="image/votar/imagenes.png">
        </div>
    </div>
</div>


    <div class="row">
        @foreach ($categorias as $categoria)
        <div class="col-md-4">

            <h1 class="tituloCategorias center-block">{{$categoria->Titulo}}</h1>
            <button type="submit" name="selectCategoria" value="{{$categoria->idCategoria}}" class='center-block {{$categoria->Titulo}} sintitulo'></button>
            </div>

        @endforeach  
    </div>
</div>


<div class="container-fluid">
    <div class="row">
@if (Session::has('fotos'))
<div class="col-md-12 nomarggin">
  <img class="img-responsive" src="image/votar/votar.jpg">
</div>

    @foreach (Session::get('fotos') as $foto)

     <div class="col-md-4">
        <img class="img-responsive marginFoto" src="fotografias/{{$foto->nombreArchivo }}"/>
        <button type='submit' name='btnVotar' value="{{$foto->nombreArchivo}}" class='btn-primary btn-lg active btnDebajoImagen btnRegistrarse'>Votar</button> 
    </div>
    @endforeach  

@endif

    </div>
</div>

</form>


    
@endsection