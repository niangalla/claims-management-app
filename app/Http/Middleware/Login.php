<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InscritsController;
use Closure;
use Illuminate\Http\Request;
use App\Models\Inscrit;
use MercurySeries\Flashy\Flashy;
use PhpParser\Node\Stmt\ElseIf_;

class Login
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

        if(session()->has('identifiant_student') | session()->has('identifiant_admin')) {
        
            if(session()->has('identifiant_student') && $_SERVER['REQUEST_URI'] == '/register_list_notes') {
                Flashy::error('Uniquement réservé à l\'administration!');
                return redirect(url()->previous());
            }elseif(session()->has('identifiant_admin') && $_SERVER['REQUEST_URI'] == '/make_claims') {
                Flashy::error('Uniquement réservé aux étudiants!');
                return redirect(url()->previous());
            }elseif(session()->has('identifiant_admin') && $_SERVER['REQUEST_URI'] == '/student_world') {
                Flashy::error('Espace réservé aux étudiants!');
                return redirect(url()->previous());
            }elseif(session()->has('identifiant_student') && $_SERVER['REQUEST_URI'] == '/admin_world') {
                Flashy::error('Espace réservé à l\'administration!');
                return redirect(url()->previous());
            }
            $request->session()->regenerate();
            return $next($request);
        }else {
            Flashy::error('Vous devez d\'abord vous connecter!');
            return redirect(url()->previous());
        }

    }
}
