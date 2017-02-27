@extends('layout')

@section('content')

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
				<img class="img-responsive" src="image/concurso2.jpg"></img>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
				<img class="img-responsive" src="image/bannerLaravel.jpg"></img>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
				<img class="img-responsive" src="image/bannerNosotrosl.jpg"></img>
                <div class="carousel-caption">
                  <!--   <h2>Caption 3</h2>!-->
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
</div>

    <!-- Page Content -->
    <!-- Page Content -->

     <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        Interval: 4000 //changes the speed
    })
    </script>

     <div class="container-fluid nomarggin">
    	<div class="row nomarggin" >
    			<div class="col-md-12 nomarggin fondoVotar">
    			<p class="txtVotar centrado marginTop">Vota por tu imagen favorita</p>
    			<a href="#" id="btnVotar" class="btn btn-primary btn-lg active btnPersonalizado" role="button">Votar</a>
    		</div>
    	</div>

   
    </div>

    <div class="container-fluid nomarggin">
    	<div class="row nomarggin" >
    		<div class="col-md-6 nomarggin centrado">
    			<img class="img-responsive nomarggin" src="image/participa.jpg">
    		</div>
    			<div class="col-md-5 nomarggin">
				<h2>Participa</h2>
				<p>Si quieres participar es muy sencillo, sube tu fotografía, puedes participar en las categorias de naturaleza, urbano y artística, recibe votaciones.Las tres fotografías con más votaciones tendrán grandes recompensas.Para ello solo tienes que registrarte en el siguiente enlace</p>
    			<a href="http://localhost/WebFotos/public/registrar" class="btn btn-primary btn-lg active btnRegistrarse" role="button">Registrarse</a>
    		</div>
    	</div>
    </div>

    <div class="container-fluid nomarggin">
        	<div class="row nomarggin" >
			<div class="col-md-12 nomarggin">
			<img class="img-responsive" src="image/categorias.png">
		    </div>
			</div>
    </div>


	<div class="container-fluid nomarggin">
	<div class="row nomarggin">
		<div class="col-md-12 nomarggin">
		<img class="img-responsive nomarggin" src="image/fotografiaUrbana.jpg"></img>
		</div>	
	</div>
	    </div>


    <div class="container-fluid nomarggin">
    	<div class="row nomarggin movimiento" >
    	<!--<div class="col-md-1 "></div>-->
    	<div class="col-md-6  centrado" >
    		<img class="img-responsive nomarggin" src="image/urbano.png">
    		</div>
    			<div class="col-md-6 marginTxt">
				<h2>Urbano</h2>
				<p>Este campo de la fotografía goza de una gran ventaja. La ventaja de tener un mismo escenario en el que cada día, cada minuto transcurre una escena diferente. En la ciudad nunca nada es igual, cada instante ocurren miles de cosas, la calle se llena de momentos únicos e irrepetibles que nosotros podemos cazar.</p>
    			
    		</div>
    		
    	</div>
    </div>

    <div class="container-fluid nomarggin">
	<div class="row nomarggin">
		<div class="col-md-12 nomarggin">
		<img class="img-responsive nomarggin" src="image/fotografiaNaturaleza.jpg"></img>
		</div>	
	</div>
	    </div>

     <div class="container-fluid nomarggin">
    	<div class="row nomarggin movimiento2" >
   			<div class=" col-md-6 marginTxtL">
				<h2>Naturaleza</h2>
				<p>La fotografía de naturaleza es una modalidad del amplio tema fotográfico que trata de enmarcar en el papel la grandiosidad de los paisajes, la fauna, la flora y los pequeños detalles. La fotografía de la naturaleza tiende a centrar su atención en la captación de aspectos estéticos, muy por encima de otros tipos de fotografía.</p> 			
    		</div>
    		  	<div class="col-md-6 nomarggin centrado">
    			<img class="img-responsive nomarggin" src="image/naturaleza.png">
    		</div>
    		
    	</div>
    </div>

    <div class="container-fluid nomarggin">
	<div class="row nomarggin">
		<div class="col-md-12 nomarggin">
		<img class="img-responsive nomarggin" src="image/fotografiaArtistica.jpg"></img>
		</div>	
	</div>
	    </div>

 <div class="container-fluid nomarggin">
    	<div class="row nomarggin movimiento3" >
    	<div class="col-md-6  centrado">
    			<img class="img-responsive nomarggin" src="image/artistico.png">
    		</div>
    			<div class=" col-md-6 marginTxt">
				<h2>Artistico</h2>
				<p>La fotografía artística integra los componentes de una obra de arte. Tratar de definirlos sería muy complejo para un espacio tan reducido, pero se puede categorizar a dos categorías principales: el dominio técnico y su contenido.</p>
    			
    		</div>
    		
    	</div>
    </div>


    
<script>

jQuery(function($) {
$('.movimiento').waypoint(function() {
$('.movimiento').addClass( 'magictime spaceInLeft' );
},
{
offset: '70%',
triggerOnce: true
});
});

jQuery(function($) {
$('.movimiento2').waypoint(function() {
$('.movimiento2').addClass( 'magictime spaceInLeft' );
},
{
offset: '70%',
triggerOnce: true
});
});



jQuery(function($) {
$('.movimiento3').waypoint(function() {
$('.movimiento3').addClass( 'magictime spaceInLeft' );
},
{
offset: '70%',
triggerOnce: true
});
});



</script>
	



@endsection