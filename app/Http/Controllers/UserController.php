<?php   

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Foto;
use Validator;
use Auth;
use App\Models\User;
use App\Http\Requests\SubirImagenRequest;

use Input;

class UserController extends Controller{
	
	public function __construct(){
		$this->middleware('auth'); 
	}
	

	public function homeUser(){
		return View('user.homeUser');
	}

	public function user(){
		return View('user.homeUser');
	}

	public function vistaMisFotos(){
        $fotos=Foto::get();
        $categorias=Categoria::get();
		return View('user.misFotos',compact('fotos', 'categorias'));
	}


	public function profile(){
        return View('user');
    }

    public function vistaSubirFotos(){
        return View('user.user');
    }

	public function subirImagen(SubirImagenRequest $request){
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotografias', $name);

            $select = Input::get('optradio') ;
            $categoria=Categoria::where('Titulo',$select)->first();
            $usuario=Auth::user();
            $usuario->comprobarNFotos($categoria);
            if(($usuario->comprobarNFotos($categoria))<($categoria->limite)){
	            $foto = new Foto;
            	$foto->subirImagen($categoria->idCategoria, $usuario->id, $usuario->tipoParticipante, $request, $name);
            	return redirect('user')->with('status', 'Su imagen en la categoria '.$foto->idCategoria. ' ha sido subida con exito, aun puede subir '.($categoria->limite-$usuario->comprobarNFotos($categoria)));               
            }else{
            	return redirect('user')->with('status', 'No ha sido posible subir la foto, ha alcanzado el número máximo de fotos para esta categoría.');  	
            }

        }
}
	
