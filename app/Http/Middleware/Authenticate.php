<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use MercurySeries\Flashy\Flashy;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
                Flashy::error('Vous devez d\'abord vous connecter!');
                return url()->previous();
        }else{
            return $next($request);
        }
    }
}
