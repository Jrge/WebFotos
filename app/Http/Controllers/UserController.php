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

	public function subirFotoPerfil(ImagenPerfilRequest $request){
		return View('user.homeUser')->with('mensaje',"Foto de perfil modificada correctamente");
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
        $status=Auth::user()->subirImagen($request); //VARIABLE QUE ALMACENARÁ EL MENSAJE DE SUCCES O DE FAILURE
        return redirect('user')->with('status',$status);
        }
}
	
