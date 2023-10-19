<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isCustomer
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
        // On récupère le user courant (session)
        $user = Auth::guard('webcustomers')->user();
        
        // Aucun user, pas autorisé
        if(empty($user)){
            abort(403);
        }

        // pas customer, pas autorisé
        if($user->role !== 'customer'){
            abort(403);
        }

        // on exécute le reste du code
        return $next($request);
    }
}
