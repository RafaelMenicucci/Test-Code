<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
}
