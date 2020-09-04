<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectPath(){
        if(auth()->user()->papel=='Aluno'){
            Session::flash('status', 'Aluno '.auth()->user()->nome.' registrado e logado com Sucesso.');
            return route('homeAluno');
        }else if(auth()->user()->papel=='Professor'){
            Session::flash('status', 'Professor '.auth()->user()->nome.' registrado e logado com Sucesso.');
            return route('homeProfessor');
        // }else if(auth()->user()->papel=='ADM'){
        //     Session::flash('status', 'Administrador '.auth()->user()->nome.' registrado e logado com Sucesso.');
        //     return route('homeADM');
        } else{
            return route('home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        // $usuarios = DB::table('usuarios')
        //                 ->select('usuarios.*')
        //                 ->where([['usuarios.email','=',$data['email']],
        //                     ['usuarios.papel','=',$data['papel']],
        //                 ])
        //                 ->first();

        // if($usuarios){
        //     Session::flash('erro', 'Vocẽ já possui uma conta com este email e papel.');
            return Validator::make($data, [
                'nome' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:usuarios'],
                'matricula' => ['string','nullable', 'max:255', 'unique:usuarios'],
                'papel' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        // }else{
        //     return Validator::make($data, [
        //         'nome' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255'],
        //         'matricula' => ['string','nullable', 'max:255', 'unique:usuarios'],
        //         'papel' => ['required', 'string', 'max:255'],
        //         'password' => ['required', 'string', 'min:6', 'confirmed'],
        //     ]);
        // }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $formataNome = ucwords(strtolower($data['nome']));

        return Usuario::create([
            'nome' => $formataNome,
            'email' => $data['email'],
            'matricula' => $data['matricula'],
            'papel' => $data['papel'],
            'is_Admin' => 0,
            'password' => Hash::make($data['password']),
        ]);
    }
}
