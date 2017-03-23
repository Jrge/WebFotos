@extends('layout')

@section('linkCss')
<link rel="stylesheet" href="{{asset('css/votar.css')}}">
<link rel="stylesheet" href="{{asset('css/lg-fb-comment-box.css')}}">


<link rel="stylesheet" href="{{asset('css/lightgallery.css')}}">


@endsection


@section('linkJs')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
<script src="{{ URL::asset('js/jquery.mousewheel.min.js') }}"></script>


<script src="{{ URL::asset('js/lightgallery.min.js') }}"></script>

<!-- lightgallery plugins -->
<script src="{{ URL::asset('js/lg-thumbnail.min.js') }}"></script>
<script src="{{ URL::asset('js/lg-fullscreen.min.js') }}"></script>
@endsection


@section('content')
@if (Session::has('status'))
<hr />
<div class='alert alert-info'>
    {{Session::get('status')}}
</div>
<hr />
@endif


 <div class="container-fluid nomarggin" >
    <div class="row nomarggin" >
    <form method='post' action='{{url("votar")}}' enctype='multipart/form-data'>
    {{csrf_field()}}

     <div class="col-md-12 nomarggin">
        <img class="img-responsive imgMargenBotton" src="image/votar/votar.jpg">
    </div>

    </div>
</div>


<div class="row ">
        <div class="col-md-2 col-xs-2 margenCategorias" >
        @foreach ($categorias as $categoria)
            <h1 class="tituloCategorias center-block">{{$categoria->Titulo}}</h1>
            <button type="submit" name="selectCategoria" value="{{$categoria->idCategoria}}" class=' center-block {{$categoria->Titulo}} sintitulo '></button>
        @endforeach 
    </div>



@if (Session::has('fotos'))
      <div  id="selector1">
  @foreach (Session::get('fotos') as $foto)
<form method="post" action="{{url('votar')}}" >{!! csrf_field() !!}

    </form>
<div class="col-md-3 col-sm-3">

  <div class="item" data-src="fotografias/{{$foto->nombreArchivo }}"  data-sub-html="#con{{$foto->idFoto}}">
    <img class="img-responsive" src="fotografias/{{$foto->nombreArchivo }}"/> 
  </div>

 <div id="con{{$foto->idFoto}}" class="row">
    <form method="post" action="{{url('votar')}}" >{!! csrf_field() !!}
      <button type='submit' name='btnVotar' value="{{$foto->nombreArchivo}}" class=' btnVotar col-md-6'></button> 
      <h1 class="txtVotaciones col-md-6">Votos {{$foto->votos}}</h1>
    </form>
  </div>
        


</div>





   @endforeach   
     </div><!--fin id Selector-->


@endif




    </div>
</div>

    </div>
</div>

</form>



<script type="text/javascript">



    $('#selector1').lightGallery({
        selector: '.item'

    });




</script>


@endsection