<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectPath(){
        if(auth()->user()->papel=='Aluno'){
            Session::flash('status', 'Aluno '.auth()->user()->nome.' logado com Sucesso.');
            return route('homeAluno');
        }else if(auth()->user()->papel=='Professor'){
            Session::flash('status', 'Professor '.auth()->user()->nome.' logado com Sucesso.');
            return route('homeProfessor');
        // } else if(auth()->user()->papel=='ADM'){
        //     Session::flash('status', 'Administrador '.auth()->user()->nome.' logado com Sucesso.');
        //     return route('homeADM');
        }else{
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
        $this->middleware('guest')->except('logout');
    }
}
