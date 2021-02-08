<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class GuestUser
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
        if(!session()->has('identifiant_student') && !session()->has('identifiant_admin')) {
            return $next($request);
        }elseif(session()->has('identifiant_student') | session()->has('identifiant_admin')){
            Flashy::error('Vous devez d\'abord vous déconnecter!');
            return redirect(url()->previous());
        }
    }
}
