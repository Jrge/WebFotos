<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Votacion;
use App\Models\Categoria;

use Input;


class VotoController extends Controller
{

    public function gestionarVoto(Request $request)
    {
        if($request->exists('btnVotar')){ //SI SE HA PULSADO EL BOTON DE VOTAR SOBRE UNA IMAGEN..
            $nombreArchivo=Input::get('btnVotar');
            $foto=Foto::where('nombreArchivo',$nombreArchivo)->first();
            $foto->votos++;
            $foto->save();
            $ip=$request->ip();
            $voto=new Votacion;
            $voto->ip=$ip;
            $voto->idFoto=$foto->idFoto;
            $voto->save();
            return redirect('votar')->with('status', 'Su voto ha sido contabilizado, la imagen cuenta con '.$foto->votos.' votos');   
        
        }else{ //SI NO SE MUESTRAN LAS FOTOS DE LA CATEGORIA SELECCIONADA EN getVotar
            $categoria=Input::get('selectCategoria');
            $fotos=Foto::where('idCategoria',$categoria)->get();
            return redirect('votar')->with('fotos',$fotos);      

        }
    }


    public function getVotar(){
        $categorias=Categoria::get();
        return view('votar')->with('categorias',$categorias);
    }



}
