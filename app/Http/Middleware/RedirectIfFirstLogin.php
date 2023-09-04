<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biography;

class RedirectIfFirstLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

 
        if ($request->routeIs('biographies.store')) {
            return $next($request); 
        }

        if ($user && !$user->biography) {
            return redirect()->route('biographies.create')->withErrors('Veuillez créer votre biographie pour continuer');
        }
        
        return $next($request);
    }
}
