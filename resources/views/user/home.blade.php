@extends('layouts.clear')

@section('content')
@include('component.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        /* Modal styles */
        .modal {
            display: block; /* Show modal */
            position: fixed;
            z-index: 1050;
            padding-top: 100px;
            left: 0; top: 0; width: 100%; height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background: white;
            margin: auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
        }
        .modal-content h2 {
            margin-bottom: 15px;
        }
        .modal-content label {
            display: block;
            margin: 10px 0 5px;
        }
        .modal-content input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .modal-content button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }
        .modal-content button:hover {
            background-color: #0056b3;
        }
        .error-msg {
            color: red;
            margin-top: 8px;
        }
        .success-msg {
            color: green;
            margin-top: 8px;
        }
    </style>
</head>
<body style="background-color: white;">
    <div class="container vh-50 py-5">
        <div class="row align-middle">
            <div class="col-smd-6 col-lg-4 column">
                <!-- <div class="card gr-1">
                    <div class="txt">
                        <h1>Alumni</br>Tracer</h1>
                        <p>Online student form for Alumni students</p>
                    </div>
                    <a href="{{ route('termscondition') }}">Go to Alumni Tracer</a>
                    <div class="ico-card">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div> -->
            </div>
            <div class="col-md-6 col-lg-4 column">
                <div class="card gr-2">
                    <div class="txt">
                        <h1>My</br>Profile</h1>
                        <p>Design your profile</p>
                    </div>
                    <a href="{{ route('profile.index') }}">Go to Profile</a>
                    <div class="ico-card">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 column">
                <!-- Extra Space 1 -->
            </div>
        </div>
    </div>

    @if(auth()->check() && auth()->user()->password_reset_required && auth()->user()->role === 'user')
    <!-- Password Reset Modal -->
    <div class="modal" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
        <div class="modal-content">
            <h2>Reset Your Password</h2>

            <form method="POST" action="{{ route('password.reset.first') }}">
                @csrf

                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required minlength="6" autocomplete="new-password" />

                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required minlength="6" autocomplete="new-password" />

                @error('password')
                    <div class="error-msg">{{ $message }}</div>
                @enderror

                @if(session('success'))
                    <div class="success-msg">{{ session('success') }}</div>
                @endif

                <button type="submit">Update Password</button>
            </form>
        </div>
    </div>
    @endif
</body>
<script>
    if (window.history && window.history.pushState) {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };
    }
</script>
</html>

@endsection
