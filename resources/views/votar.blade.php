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




@if (Session::has('fotos'))
    @foreach (Session::get('fotos') as $foto)
        <img src="fotografias/{{$foto->nombreArchivo }}"/>
        <button type='submit' name='btnVotar' value="{{$foto->nombreArchivo}}" class='btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnLargo'>Votar</button>
    @endforeach  

@else

    @foreach ($categorias as $categoria)
        
        <button type="submit" name="selectCategoria" value="{{$categoria->idCategoria}}" class='btn-primary btn-lg active btnRegistrarse btnFormulario btnLogin btnLargo'>Votar la categoria {{$categoria->Titulo}}</button>
    @endforeach   
@endif

	</form>
        <div class="col-md-4 nomarggin">
            <img class="img-responsive" src="image/votar/imagenes.png">
        </div>
    </div>
</div>
@endsection