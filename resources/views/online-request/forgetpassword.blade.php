@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 500px;">
        <h4 class="text-center mb-4">Forgot Password</h4>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- STEP 1: Enter Email --}}
        @if(!session('email_pending_verification') && !session('verified'))
            <form method="POST" action="{{ route('password.sendcode') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Enter your registered email</label>
                    <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Send Verification Code</button>
            </form>

        {{-- STEP 2: Enter Verification Code --}}
        @elseif(session('email_pending_verification') && !session('verified'))
            <form method="POST" action="{{ route('password.verifycode') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="verification_code">Enter the verification code sent to your email</label>
                    <input type="text" name="verification_code" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Verify Code</button>
            </form>

        {{-- STEP 3: Enter New Password --}}
        @elseif(session('verified'))
            <form method="POST" action="{{ route('password.reset.submit') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>
        @endif
    </div>
</div>

@endsection
