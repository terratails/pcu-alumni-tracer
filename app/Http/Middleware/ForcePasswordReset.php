<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForcePasswordReset
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->password_reset_required && $user->role !== 'admin') {
                // Allow access only to password reset and logout routes
                if (
                    $request->routeIs('password.reset.first') ||
                    $request->routeIs('logout') ||
                    $request->routeIs('user.home')
                ) {
                    return $next($request);
                }

                // Redirect all other routes to user.home
                return redirect()->route('user.home');
            }
        }

        return $next($request);
    }
}
