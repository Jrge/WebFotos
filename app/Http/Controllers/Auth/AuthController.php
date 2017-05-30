<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\CrearUsuarioRequest;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    protected $redirectPath = '/homeUser';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postRegister(CrearUsuarioRequest $request){
            $validator=Validator::make($request->all(),$request->rules(),$request->messages());
            if($validator->fails()){
                return redirect("auth/register")
                ->with("message", "Usuario registrado correctamente")
                ->withInput();
            }
            $user = new User;
            $user->addUsuario($request);
            return redirect("auth/register")
            ->with("message", "Usuario registrado correctamente");
        
            
        
    }

    public function postLogin(Request $request){
        
        if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
                , $request->has('remember')
                )){
            /*
            Si el login es de administrador retornara el panel de control
            */
                if (Auth::user()->admin) return view('admin.admin');
                else
                return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            
            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
    }
}
