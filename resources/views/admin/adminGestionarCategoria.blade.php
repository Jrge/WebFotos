@extends('admin.layoutadmin')

@section('contenidoAdmin')

@if (Session::has('mensaje'))
<div class='text-success'>
    {{Session::get('mensaje')}}
</div>
@endif


<table class="table table-striped">
          <tr>
            <th>Icono</th>
            <th>Titulo</th>
            <th>Limite</th>
          </tr>
            @foreach ($categorias as $categoria)
          <tr>
            <td><i class="fa {{$categoria->icono}}" aria-hidden="true"></i></td>
            <td>{{$categoria->Titulo}}</td>
            <td>{{$categoria->limite}}</td>
            <td>
            <form method='post' action='{{url("adminModificarCategorias")}}' enctype='multipart/form-data'>{{csrf_field()}}
            <button type="submit" name="btnCambiar" class="btnTabla" value="{{$categoria->idCategoria}}">Modificar</button>   
            </form>
            </td>
          </tr>
          @endforeach
        </table>


      <div class="col-md-8">         
        {!! $categorias->render() !!}
        </div>

        @endsection