<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
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
