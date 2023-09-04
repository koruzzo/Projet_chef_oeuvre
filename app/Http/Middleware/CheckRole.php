<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth()->user();
        if ($user->role == 'admin'){
            return $next($request);
        }
        else if (!$user || $user->role !== $role){
            abort(403, 'Action non Autorisé');
        }
        else{
           return $next($request); 
        }
        
    }
}
