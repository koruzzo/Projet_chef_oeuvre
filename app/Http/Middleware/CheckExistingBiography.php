<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Biography;

class CheckExistingBiography
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        if ($user) {
            $existingBiography = Biography::where('user_id', $user->id)->first();
            
            if ($existingBiography) {
                return redirect()->route('home')->with('error', 'Vous avez déjà une biographie.');
            }
        }

        return $next($request);
    }
}
