<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Votacion;

use Input;


class VotoController extends Controller
{

    public function gestionarVoto(Request $request)
    {
        $nombreArchivo=Input::get('btnVotar');
        $foto=Foto::where('nombreArchivo',$nombreArchivo)->first();
            $foto->votos++;
            $foto->save();
            $ip=$request->ip();
            $voto=new Votacion;
            $voto->ip=$ip;
            $voto->idFoto=$foto->id;
            $voto->save();



            return redirect('votar')->with('status', 'Su voto ha sido contabilizado, la imagen cuenta con '.$foto->votos.' votos');   
        
        
    }
}
