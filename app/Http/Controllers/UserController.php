<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display the user home page.
     */
    public function tracer()
    {
        return $this->hasOne(Tracer::class, 'email', 'email');
    }


    public function index()
    {
        return view('user.home');
    }

    /**
     * Handle first time password reset.
     */
    public function resetFirstPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->password_reset_required = false;  // Reset flag
        $user->save();

        return redirect()->route('user.home')->with('success', 'Password updated successfully!');
    }




    // Other resourceful methods (empty placeholders)
    public function create() { }
    public function store(Request $request) { }
    public function show(string $id) { }
    public function edit(string $id) { }
    public function update(Request $request, string $id) { }
    public function destroy(string $id) { }
}
