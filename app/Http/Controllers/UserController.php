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
		$usuario=Auth::user();
		$datosUsuario=$usuario->devolverDatosHome();
		return View('user.homeUser')->with('datosUsuario',$datosUsuario);
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
            	if($usuario->comprobarNFotos($categoria)!=$categoria->limite){
            	return redirect('user')->with('status', 'Su imagen en la categoria '.$categoria->Titulo. ' ha sido subida con exito. Número de fotos restantes posibles por subir en esta categoría: '.($categoria->limite-$usuario->comprobarNFotos($categoria))).'.';
            	}else{
					return redirect('user')->with('status', 'Su imagen en la categoria '.$categoria->Titulo. ' ha sido subida con exito, ha alcanzado el máximo de fotos permitidas.');
            	}               
            }else{
            	return redirect('user')->with('status', 'No ha sido posible subir la foto, ha alcanzado el número máximo de fotos para esta categoría.');  	
            }

        }
}
	
