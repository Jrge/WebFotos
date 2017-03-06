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

<<<<<<< HEAD
     <div class="col-md-12 nomarggin">
        <img class="img-responsive" src="image/votar/votar.jpg">
    </div>
=======
    
        <div class="col-md-12 nomarggin">
            <img class="img-responsive" src="image/votar/imagenes.png">
        </div>
>>>>>>> origin/master
    </div>
</div>


<div class="row ">
        <div class="col-md-2">
        @foreach ($categorias as $categoria)
            <h1 class="tituloCategorias center-block">{{$categoria->Titulo}}</h1>
            <button type="submit" name="selectCategoria" value="{{$categoria->idCategoria}}" class='center-block {{$categoria->Titulo}} sintitulo'></button>
        @endforeach  
    </div>



@if (Session::has('fotos'))
    @foreach (Session::get('fotos') as $foto)
      <div class="col-md-3">
      <a href="#" class="pop">
 
      <img id="{{$foto->idFoto}}" class="thumbnail img-responsive imgVotacion" src="fotografias/{{$foto->nombreArchivo }}"/> 
 </a>
       <div class="col-md-6">

      <button type='submit' name='btnVotar' value="{{$foto->nombreArchivo}}" class='btn-primary btn-lg active btnDebajoImagen btnRegistrarse'>Votar</button> 
      </div>
             <div class="col-md-6">

      <h1>{{$foto->votos}}</h1>
      </div>
    </div>
   @endforeach   

   

@endif

    </div>
</div>

    </div>
</div>

</form>



<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="max-width:560px; height:auto;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(".pop").on("click", function() {
   $('#imagepreview').attr('src', $(this).find("img").attr("src")); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

</script>	
@endsection