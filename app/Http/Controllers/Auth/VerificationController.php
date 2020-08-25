<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Session;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected function redirectPath(){
        if(auth()->user()->papel=='Aluno'){
            Session::flash('status', 'Aluno '.auth()->user()->nome.' verificado e logado com Sucesso.');
            return route('homeAluno');
        }else if(auth()->user()->papel=='Professor'){
            Session::flash('status', 'Professor '.auth()->user()->nome.' verificado e logado com Sucesso.');
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
