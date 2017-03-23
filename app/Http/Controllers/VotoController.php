<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Votacion;
use App\Models\Categoria;

use Input;

use Carbon\Carbon;


class VotoController extends Controller
{

    public function gestionarVoto(Request $request)
    {
        if($request->exists('btnVotar')){ //SI SE HA PULSADO EL BOTON DE VOTAR SOBRE UNA IMAGEN..
            $nombreArchivo=Input::get('btnVotar');
            $foto=Foto::where('nombreArchivo',$nombreArchivo)->first();
            $voto=Votacion::where('ip',$request->ip())->orderBy('created_at', 'DESC')->first(); 
            if($voto==null || ($voto!=null && $voto->posibleVotar())){
                $nuevoVoto=new Votacion;
                $nuevoVoto->votar($foto->idFoto,$request);
                $foto->aumentarVoto();

                return redirect('votar')->with('status', 'Su voto ha sido contabilizado, la imagen cuenta con '.$foto->votos.' votos');  
            }else{

                
                return redirect('votar')->with('status', 'Solo se permite un voto cada 24 horas.');  
                }
        }else{ //SI NO SE MUESTRAN LAS FOTOS DE LA CATEGORIA SELECCIONADA EN getVotar
            $categoria=Input::get('selectCategoria');
            $fotos=Foto::where('idCategoria',$categoria)
<<<<<<< HEAD
                        ->where('visible',true)
                        ->get();

            $fotos=Foto::paginate(6);

=======
                        ->where('visible',1)
                        ->paginate(4);
        
            
>>>>>>> origin/master
            return redirect('votar')->with('fotos',$fotos);      

        }
    }
    public function getVotar(){
        $categorias=Categoria::get();
        return view('votar')
        ->with('categorias',$categorias);
    }



}
