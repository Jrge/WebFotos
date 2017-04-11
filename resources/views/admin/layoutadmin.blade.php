@extends('layout')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">

@section('linkCss')
@endsection
@section('content')

<div class="container-fluid nomarggin">
    <div class="row nomarggin" >
            <div class="col-md-1"></div>

        <div class="col-md-11 nomarggin">
            <img class="img-responsive" src="image/adminpanel/panelAdmin.jpg">
            <h1 class="userName">Administrador {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>

 <div class="container-fluid nomarggin">
    <div class="row nomarggin" >
     <div class="col-md-2 nomarggin">

 		<!-- Sidebar -->

 		 <nav class="nav-sidebar adminSlider">
                <ul class="nav">
                    <li class="active"><a href="{{url('admin')}}">Panel Administrador</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="{{url('adminCategorias')}}">Generar Categorias</a></li>
                    <li><a href="{{url('adminFotos')}}">Administrar Fotos</a></li>
                    <li><a href="{{url('adminAdministradores')}}">Promocionar Usuarios</a></li>
                    <li><a href="{{url('adminListadoFotografias')}}">Listado Fotograías</a></li>

                </ul>
            </nav>
  		</div>
        <div class="col-md-1"></div>
  		<div class="col-md-7 nomarggin contenido">
		@yield('contenidoAdmin')
		</div>


 </div>
</div>

@endsection