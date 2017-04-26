@extends('layout')
<link rel="stylesheet" href="{{asset('css/panelUsuario.css')}}">

@section('linkCss')
@endsection
@section('content')

<div class="container-fluid nomarggin">
    <div class="row nomarggin" >
            <div class="col-md-1"></div>

        <div class="col-md-11 nomarggin">
            <img class="img-responsive" src="image/adminpanel/panelAdmin.jpg">
            <h1 class="userName">Usuario {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>

 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
     <div class="col-md-2 nomarggin">

 		<!-- Sidebar -->

 		 <nav class="nav-sidebar adminSlider">
                <ul class="nav">
                    <li class="active"><a href="{{url('homeUser')}}">Home</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="{{url('user')}}">Subir Fotos</a></li>
                    <li><a href="{{url('misFotos')}}">Mis Fotos</a></li>

                </ul>
            </nav>
  		</div>
        <div class="col-md-1"></div>
  		<div class="col-md-7 nomarggin contenido">
		@yield('contenidoUser')
		</div>


 </div>
</div>

@endsection