@section('head')
<!DOCTYPE html>
<html>
<head>

	<title>Concurso Fotografía</title>
	<!-- link CSS -->
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magic.css')}}">
    <link rel="stylesheet" href="{{asset('css/cssPersonalizado.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    @yield('linkCss')
    <script src="{{ URL::asset('js/personalizado.js') }}"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>

	<!-- link JQUERY -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.waypoints.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


    @yield('linkJs')


</head>
@show
<!--NAVEGACION MENU -->
 @section('menuNavegacion')
 <header>
	 <nav class="navbar navbar-inverse" id="navInverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{{url('/')}}">Concurso Fotografía</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="{{url('/')}}">Home</a></li>
	      <li><a href="{{url('votar')}}">Votar</a></li>
	      
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
   @if (Auth::check())
      @if (Auth::user()->admin)
      <li><a href="{{url('admin')}}">Panel de Administrador</a></li>
      <li><a href="{{url('auth/logout')}}">Salir</a></li>

      @else
     <li><a href="{{url('homeUser')}}">{{Auth::user()->name}}</a></li>
     <li><a href="{{url('auth/logout')}}">Salir</a></li>
     @endif
   @else
            <li><a href="{{url('auth/register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="{{url('auth/login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

   @endif
	    </ul>
	  </div>
	</nav>
</header>
@show

          


<body>

@yield('content')


</body>

 @section('footer')
<footer class="container-fluid nomarggin">
	<div class="row nomarggin fondoGris" >
    	<div class="col-md-6  centrado ">
    		<p class="txtFooter">Proyecto DAM ©2017</p>
    	</div>
   	</div>
</footer>
</html>
@show

