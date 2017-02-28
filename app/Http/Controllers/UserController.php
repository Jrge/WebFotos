<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
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

        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('user')->withErrors($validator);
        }
        else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotografias', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['fotografias' => 'fotografias/'.$name]);

            $select = Input::get('optradio') ;
            //$categoria = App\Models\Categoria::where('Titulo',$select)->idCategoria;
            //$categoria = new Categoria;
            //$categoria->where('Titulo',$select)->idCategoria;
           
            return redirect('user')->with('status', 'Su imagen en la categoria '.$select. ' ha sido subida con exito');
        }
    }
	
}