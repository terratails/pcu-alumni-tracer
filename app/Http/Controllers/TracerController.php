<?php

namespace App\Http\Controllers;

use App\Models\Tracer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TracerController extends Controller
{
    public function index_agree()
    {
        return view('page.agree');
    }

    public function tracer_submit()
    {
        return view('page.thankyou');
    }

    public function terms_condition_index()
    {
        return view('page.termscondition');
    }

    public function index()
    {
        //
    }

    public function verification()
    {
        return view('online-request.verification');
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->is_verified) {
            auth()->logout();
            return redirect()->route('login')->withErrors([
                'email' => 'You must verify your account first.',
            ]);
        }
    }

    public function resendCode(Request $request)
    {
        $userData = session('user_data');
        if (!$userData) {
            return redirect()->route('verification.form')->with('error', 'Session expired. Please start again.');
        }

        $newCode = rand(100000, 999999);
        session(['verification_code' => $newCode]);
        // Do NOT reset attempts count to persist previous attempts

        Mail::raw(
            "Here is your new verification code: {$newCode}",
            function ($message) use ($userData) {
                $message->to($userData['email'])->subject('New Verification Code - Alumni Tracer');
            }
        );

        return back()->with('success', 'A new verification code has been sent to your email.');
    }

    private function generateUniqueId()
    {
        $yearPrefix = date('Y');
        do {
            $uniqueId = $yearPrefix . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Tracer::where('id', $uniqueId)->exists());

        return $uniqueId;
    }

    public function store(Request $request)
    {
        $request->validate([
            'familyname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'contact' => ['required', 'regex:/^\d+$/', 'min:7', 'max:15'],
            'email' => 'required|email|unique:users,email',
            'civil' => 'required|string|max:255',
            'employer' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'studentnumber' => 'nullable|string|max:255',
            'placeofwork' => 'required|string|max:255',
            'typeofemployment' => 'required|in:Full-time,Part-time',
            'extentofemployment' => 'required|string|max:255',
            'datehired' => 'required|date',
            'averagemonthly' => 'required|string|max:255',
            'resourcespeaker' => 'required|in:yes,no',
            'fieldofexpertise' => 'required|string|max:255',
            'employmentstatus' => 'required|in:Employed,Self-Employed,Unemployed',

            'primary_school' => 'required|string|max:255',
            'primary_yeargraduated' => 'required|digits:4',
            'secondary_school' => 'required|string|max:255',
            'secondary_yeargraduated' => 'required|digits:4',
            'tertiary_course' => 'required|string|max:255',
            'tertiary_yeargraduated' => 'required|digits:4',
            'tertiary_masters' => 'required|string|max:255',
            'tertiary_doctors' => 'required|string|max:255',
        ]);

        $exists = Tracer::whereRaw('LOWER(TRIM(familyname)) = ?', [strtolower(trim($request->familyname))])
            ->whereRaw('LOWER(TRIM(firstname)) = ?', [strtolower(trim($request->firstname))])
            ->whereRaw('LOWER(TRIM(middlename)) = ?', [strtolower(trim($request->middlename))])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'familyname' => 'This full name is already registered.',
                'firstname' => 'This full name is already registered.',
                'middlename' => 'This full name is already registered.',
            ])->withInput();
        }

        $tracer = new Tracer();
        $tracer->familyname = trim($request->input('familyname'));
        $tracer->firstname = trim($request->input('firstname'));
        $tracer->middlename = trim($request->input('middlename'));
        $tracer->contact = $request->input('contact');
        $tracer->email = $request->input('email');
        $tracer->civil = $request->input('civil');
        $tracer->employer = $request->input('employer');
        $tracer->position = $request->input('position');
        $tracer->sector = $request->input('sector');
        $tracer->studentnumber = $request->input('studentnumber');
        $tracer->placeofwork = $request->input('placeofwork');
        $tracer->typeofemployment = $request->input('typeofemployment');
        $tracer->extentofemployment = $request->input('extentofemployment');
        $tracer->datehired = $request->input('datehired');
        $tracer->averagemonthly = $request->input('averagemonthly');
        $tracer->resourcespeaker = $request->input('resourcespeaker') === "yes";
        $tracer->fieldofexpertise = $request->input('fieldofexpertise');
        $tracer->employmentstatus = $request->input('employmentstatus');

        $tracer->primary_school = $request->input('primary_school');
        $tracer->primary_yeargraduated = $request->input('primary_yeargraduated');
        $tracer->secondary_school = $request->input('secondary_school');
        $tracer->secondary_yeargraduated = $request->input('secondary_yeargraduated');
        $tracer->tertiary_course = $request->input('tertiary_course');
        $tracer->tertiary_yeargraduated = $request->input('tertiary_yeargraduated');
        $tracer->tertiary_masters = $request->input('tertiary_masters');
        $tracer->tertiary_doctors = $request->input('tertiary_doctors');

        $tracer->save();

        $verificationCode = rand(100000, 999999);

        session([
            'email_to_verify' => $request->input('email'),
            'verification_code' => $verificationCode,
            'verification_attempts' => 0,
            'user_data' => [
                'name' => $request->input('firstname') . ' ' . $request->input('familyname'),
                'email' => $request->input('email'),
            ],
        ]);

        Mail::raw(
            "Thank you for registering with us.\n\nYour verification code is: {$verificationCode}",
            function ($message) use ($request) {
                $message->to($request->input('email'))
                        ->subject('Your Verification Code - Alumni Tracer');
            }
        );

        return redirect()->route('verification.form')->with('success', 'Verification code sent to your email.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|digits:6',
        ]);

        $expectedCode = session('verification_code');
        $userData = session('user_data');

        if (!$expectedCode || !$userData) {
            return redirect()->route('verification.form')->with('error', 'Session expired. Please try again.');
        }

        $attempts = session('verification_attempts', 0) + 1;
        session(['verification_attempts' => $attempts]);

        if ($request->verification_code == $expectedCode) {
            $defaultPassword = 'pcumanila';

            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = Hash::make($defaultPassword);
            $user->is_verified = true;
            $user->save();

            session()->forget(['verification_code', 'email_to_verify', 'user_data', 'verification_attempts']);

            Mail::raw(
                "Your account is now verified.\n\nLogin:\nUsername: {$user->email}\nPassword: {$defaultPassword}",
                function ($message) use ($user) {
                    $message->to($user->email)->subject('Your Alumni Tracer Login Credentials');
                }
            );

            return view('page.thankyou')->with('success', 'Verification successful! Check your email for your login credentials.');
        }

        if ($attempts >= 3) {
            session()->forget(['verification_code', 'email_to_verify', 'user_data', 'verification_attempts']);
            // Redirect with a special flag to show modal in blade
            return redirect()->route('verification.form')
                ->withErrors(['max_attempts' => 'Maximum attempts has been reached, Session expired.'])
                ->with('max_attempt_reached', true);
        }

        $remaining = 3 - $attempts;
        return back()->with('error', "Invalid code. You have {$remaining} attempt(s) left.");
    }


    public function show(Tracer $tracer)
    {
        //
    }

    public function edit(Tracer $tracer)
    {
        //
    }

    public function update(Request $request, Tracer $tracer)
    {
        //
    }

    public function destroy(Tracer $tracer)
    {
        //
    }
}
