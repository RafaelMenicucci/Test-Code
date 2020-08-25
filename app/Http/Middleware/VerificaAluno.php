<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class VerificaAluno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ( !auth()->check() )
            return redirect()->route('login');

        $papel = auth()->user()->papel;

        if($papel != 'Aluno') {
            Session::flash('info', 'Acesso Bloqueado.');
            return redirect()->route('homeProfessor');
        }

        return $next($request);

    }
}
