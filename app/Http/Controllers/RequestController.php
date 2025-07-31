<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Tracer;
use App\Models\User;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function request_index(Request $request)
    {
        $query = Tracer::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('studentnumber', 'like', "%{$search}%")
                ->orWhere('familyname', 'like', "%{$search}%")
                ->orWhere('firstname', 'like', "%{$search}%");
            });
        }

        $tracers = $query->orderBy('created_at', 'desc')->paginate(15);
        $tracers->appends(['search' => $search]);

        return view('online-request.view', compact('tracers', 'search'));
    }

    public function forget_password()
    {
        // Only clear session if the user explicitly requested it via query param
        if (request()->has('reset')) {
            Session::forget(['email_pending_verification', 'verification_code', 'verified']);
        }

        return view('online-request.forgetpassword');
    }




    public function send_verification_code(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $code = rand(100000, 999999);

        // Save email and code in session
        session(['email_pending_verification' => $request->email]);
        session(['verification_code' => $code]);
        session()->forget('verified'); // Ensure reset

        // Send email
        Mail::raw("Your password reset verification code is: {$code}", function ($message) use ($request) {
            $message->to($request->email)->subject('Password Reset Verification');
        });

        return back()->with('success', 'Verification code sent to your email.');
    }


    public function verify_code(Request $request)
    {
        $request->validate(['verification_code' => 'required']);

        if ($request->verification_code == session('verification_code')) {
            session(['verified' => true]);
            return back()->with('success', 'Code verified. You may now reset your password.');
        }

        return back()->withErrors(['verification_code' => 'Incorrect code.']);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \App\Models\User::where('email', session('email_pending_verification'))->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();

            // Cleanup
            session()->forget(['email_pending_verification', 'verified', 'verification_code']);

            return redirect('/')->with('success', 'Password reset successful. You can now log in.');
        }

        return back()->withErrors(['email' => 'Something went wrong.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}