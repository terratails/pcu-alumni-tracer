<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Tracer;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function edit()
    {
        $user = Auth::user();
        $tracer = Tracer::where('email', $user->email)->first();

        return view('profile.edit', compact('user', 'tracer'));
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
    public function index()
    {
        $user = Auth::user();
        $tracer = \App\Models\Tracer::where('email', $user->email)->first();

        return view('profile.view', compact('user', 'tracer'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
            'profile_picture' => 'nullable|image|max:2048',

            // Educational background
            'studentnumber' => 'nullable|string|max:255',
            'primary_school' => 'nullable|string|max:255',
            'primary_yeargraduated' => 'nullable|string|max:255',
            'secondary_school' => 'nullable|string|max:255',
            'secondary_yeargraduated' => 'nullable|string|max:255',
            'tertiary_course' => 'nullable|string|max:255',
            'tertiary_yeargraduated' => 'nullable|string|max:255',
            'tertiary_masters' => 'nullable|string|max:255',
            'tertiary_doctors' => 'nullable|string|max:255',

            // Employment background
            'employer' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'placeofwork' => 'nullable|string|max:255',
            'typeofemployment' => 'nullable|string|max:255',
            'extentofemployment' => 'nullable|string|max:255',
            'datehired' => 'nullable|date',
            'averagemonthly' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $tracer = Tracer::where('email', $user->email)->first();

        if ($tracer) {
            $tracer->update([
                'familyname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'contact' => $request->contact,
                'studentnumber' => $request->studentnumber,
                'primary_school' => $request->primary_school,
                'primary_yeargraduated' => $request->primary_yeargraduated,
                'secondary_school' => $request->secondary_school,
                'secondary_yeargraduated' => $request->secondary_yeargraduated,
                'tertiary_course' => $request->tertiary_course,
                'tertiary_yeargraduated' => $request->tertiary_yeargraduated,
                'tertiary_masters' => $request->tertiary_masters,
                'tertiary_doctors' => $request->tertiary_doctors,
                'employer' => $request->employer,
                'position' => $request->position,
                'sector' => $request->sector,
                'placeofwork' => $request->placeofwork,
                'typeofemployment' => $request->typeofemployment,
                'extentofemployment' => $request->extentofemployment,
                'datehired' => $request->datehired,
                'averagemonthly' => $request->averagemonthly,
            ]);
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }





    public function updatePicture(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->route('profile.index')->with('success', 'Profile picture updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
