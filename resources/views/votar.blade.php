<?php
use App\Models\Categoria;
use App\Models\Foto;

//$categorias=Categoria::where('idCategoria',2)->get();
$categoriaUrban=Categoria::where('idCategoria',2)->first();
$categoriaArtistico=Categoria::where('idCategoria',3)->first();

$fotos=Foto::where('idCategoria',2)->get();
?>


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
	</form>
        <div class="col-md-4 nomarggin">
            <img class="img-responsive" src="image/votar/imagenes.png">
        </div>
    </div>
</div>
@endsection