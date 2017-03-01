<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Foto;
use Validator;
use Auth;
use App\User;

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



	//Copy paste habria k editarlo 
	public function subirImagen(Request $request){

        $rules = ['image' => 'required|image|max:1024*1024*1',
                    'titulo' => 'required|min:3|max:30|',
                    'descripcion' => 'required|min:3|max:50|',
        ];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
            'titulo.required' => 'El campo es requerido',
            'titulo.min' => 'El mínimo de caracteres permitidos son 3',
            'titulo.max' => 'El máximo de caracteres permitidos son 30',
            'descripcion.required' => 'El campo es requerido',
            'descripcion.min' => 'El mínimo de caracteres permitidos son 3',
            'descripcion.max' => 'El máximo de caracteres permitidos son 50',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('user')->withErrors($validator);
        }
        else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotografias', $name);

            $select = Input::get('optradio') ;
            $categoria=Categoria::where('Titulo',$select)->first();

                $foto = new Foto;
                $foto->idCategoria=$categoria->idCategoria;
                $foto->idParticipante=Auth::user()->id;
                $foto->Titulo=$request->titulo;
                $foto->descripcion=$request->descripcion;
                $foto->nombreArchivo=$name;
                $foto->save();
                return redirect('user')->with('status', 'Su imagen en la categoria '.$foto->idCategoria. ' ha sido subida con exito');               

        }
    }
	
}