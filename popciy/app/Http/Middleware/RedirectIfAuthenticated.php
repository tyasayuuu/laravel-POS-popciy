<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->role == "su") {
                return redirect()->route('dashboard.su');
            } elseif ($user->role == "admin") {
                return redirect()->route('dashboard.admin');
            } elseif ($user->role == "kasir") {
                return redirect()->route('dashboard.kasir');
            }
        }

        return $next($request);
    }
}
