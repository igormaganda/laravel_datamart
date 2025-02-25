<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Ajout de l'import de la classe Log
use Illuminate\Support\Facades\Auth; // Ajout de l'import de la classe Auth

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        Log::info('Authenticate::redirectTo called'); // Ajout d'un point de contrôle

        if (! $request->expectsJson()) {
            Log::info('Request is not JSON'); // Ajout d'un point de contrôle
            Log::info('Redirecting to filament.admin.auth.login'); // Ajout d'un point de contrôle
            Log::info('Auth::check(): ' . Auth::check()); // Ajout d'un point de contrôle pour vérifier l'authentification
            Log::info('Session: ' . json_encode(session()->all())); // Ajout d'un point de contrôle pour vérifier la session
            return route('filament.admin.auth.login');
        }

        Log::info('Request is JSON, no redirect'); // Ajout d'un point de contrôle
        Log::info('Auth::check(): ' . Auth::check()); // Ajout d'un point de contrôle pour vérifier l'authentification
        Log::info('Session: ' . json_encode(session()->all())); // Ajout d'un point de contrôle pour vérifier la session

        return null;
    }

    public function handle($request, \Closure $next, ...$guards)
    {
        Log::info('Authenticate::handle called');
        return parent::handle($request, $next, ...$guards);
    }
}
// namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

// class Authenticate extends Middleware
// {
//     /**
//      * Get the path the user should be redirected to when they are not authenticated.
//      */
//     protected function redirectTo(Request $request): ?string
//     {
//         return $request->expectsJson() ? null : route('filament.admin.auth.login');
//     }
    
// }
