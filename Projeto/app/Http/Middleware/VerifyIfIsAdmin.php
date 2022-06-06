<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::User();

        if($user->tipo == 'C' || $user->tipo == null){
            return redirect()->route('home')->with('alert-msg', 'Voce nao tem permissao para acessar a esta pagina')->with('alert-type', 'danger');
        }
        return $next($request);
    }
}
