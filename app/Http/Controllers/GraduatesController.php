<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Tracer;

class GraduatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function graduate_index()
    {
        $users = User::with('tracer')
        ->where('role', 'user')
        ->when(request('search'), function ($query) {
            $query->whereHas('tracer', function ($subQuery) {
                $subQuery->where('familyname', 'like', '%' . request('search') . '%')
                        ->orWhere('firstname', 'like', '%' . request('search') . '%')
                        ->orWhere('middlename', 'like', '%' . request('search') . '%');
            });
        })
        ->paginate(10); 

        return view('admin.graduates', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $tracer = $user->tracer;

        // Update User fields
        $user->email = $request->input('email');
        $user->save();

        // Update Tracer fields
        $tracer->update([
            'familyname'               => $request->input('familyname'),
            'firstname'                => $request->input('firstname'),
            'middlename'               => $request->input('middlename'),
            'studentnumber'            => $request->input('studentnumber'),
            'contact'                  => $request->input('contact'),
            'primary_school'           => $request->input('primary_school'),
            'primary_yeargraduated'    => $request->input('primary_yeargraduated'),
            'secondary_school'         => $request->input('secondary_school'),
            'secondary_yeargraduated'  => $request->input('secondary_yeargraduated'),
            'tertiary_course'          => $request->input('tertiary_course'),
            'tertiary_yeargraduated'   => $request->input('tertiary_yeargraduated'),
            'tertiary_school'          => $request->input('tertiary_school'),
            'tertiary_masters'         => $request->input('tertiary_masters'),
            'tertiary_doctors'         => $request->input('tertiary_doctors'),
        ]);

        return redirect()->back()->with('success', 'Graduate details updated successfully.');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);

        if ($user->tracer) {
            $user->tracer->delete();
        }

        $user->delete();

        return redirect()->back()->with('success', 'Graduate deleted successfully.');
    }

    public function index(Request $request)
    {
        $query = User::with('tracer');

        if ($search = $request->input('search')) {
            $query->whereHas('tracer', function ($q) use ($search) {
                $q->where('familyname', 'like', "%$search%")
                ->orWhere('firstname', 'like', "%$search%")
                ->orWhere('middlename', 'like', "%$search%")
                ->orWhere('studentnumber', 'like', "%$search%")
                ->orWhere('contact', 'like', "%$search%");
            })->orWhere('email', 'like', "%$search%");
        }

        $users = $query->paginate(10); // or use ->get() if you’re not paginating

        return view('graduates.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('tracer')->findOrFail($id);
        $tracer = $user->tracer;

        return view('profile.show', compact('user', 'tracer'));
    }





}
