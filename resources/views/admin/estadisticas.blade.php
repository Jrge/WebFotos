@extends('admin.layoutadmin')

@section('contenidoAdmin')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



<div class="ro-fluid">

 <div class="col-md-12 cabecera">
  <i class="fa fa-camera" aria-hidden="false"></i>		
  <h3>Fotografias</h3>
</div>
</div>


<div class="ro-fluid">
	<div class="col-md-12 estadis">
		 <div>
		    {!! $chartjs->render() !!}
		</div>
	</div>
</div>


<div class="ro-fluid">

 <div class="col-md-12 cabecera">
<i class="fa fa-users" aria-hidden="true"></i>
  <h3>Usuarios</h3>
</div>
</div>


<div class="ro-fluid">
	<div class="col-md-12 estadis">
		 <div>
		    {!! $chart->render() !!}
		</div>
	</div>
</div>


@endsection