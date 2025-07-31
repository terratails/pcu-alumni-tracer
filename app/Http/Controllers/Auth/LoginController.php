<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Handle redirect after login based on user role.
     */
    protected function redirectTo()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return '/home'; // Admin dashboard
            }

            return '/user-home'; // Regular user dashboard
        }

        return '/'; // Default fallback
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/home'); // Admin dashboard
        }

        return redirect('/user-home'); // User dashboard
    }

    /**
     * Override default failed login behavior.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->with('error', 'These credentials do not match our records.');
    }

    /**
     * Only allow guests, except logout route.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
