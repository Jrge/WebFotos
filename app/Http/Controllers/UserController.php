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
	
	public function user(){
		return View('user.user');
	}


	public function profile(){
        return View('user');
    }

	public function subirImagen(SubirImagenRequest $request){
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotografias', $name);

            $select = Input::get('optradio') ;
            $categoria=Categoria::where('Titulo',$select)->first();

            $foto = new Foto;
            $foto->subirImagen($categoria->idCategoria, Auth::user()->id,Auth::user()->tipoParticipante, $request, $name);
            return redirect('user')->with('status', 'Su imagen en la categoria '.$foto->idCategoria. ' ha sido subida con exito');               

        }
}
	
