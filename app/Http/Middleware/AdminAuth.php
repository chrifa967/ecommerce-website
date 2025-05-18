<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        $user = Auth::user();

            // Vérifie si l'utilisateur est un admin
            if (Auth::User() && $user->hasRole('admin')) {
               return $next($request);
            } else {
                return redirect('/login');
            }
        
    }
}
