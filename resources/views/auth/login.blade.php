@extends('layouts.log')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
</head>
<body>
    <a href="https://front.codes/" class="logo" target="_blank">
        <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
    </a>

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"
                        @if(request()->is('admin/register') || old('name')) checked @endif />

                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Log In</h4>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Your Email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" required autocomplete="current-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        Remember Me
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn mt-4">Login</button>
                                                @if (Route::has('password.request'))
                                                    <p class="mb-0 mt-4 text-center">
                                                        <a href="{{ route('password.request') }}" class="link">Forgot your password?</a>
                                                    </p>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign Up</h4>
                                            <form method="POST" action="{{ route('admin.register') }}">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-style @error('name') is-invalid @enderror" placeholder="Your Full Name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    <i class="input-icon uil uil-user"></i>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style @error('email') is-invalid @enderror" placeholder="Your Email" id="register-email" value="{{ old('email') }}" required autocomplete="email">
                                                    <i class="input-icon uil uil-at"></i>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style @error('password') is-invalid @enderror" placeholder="Your Password" id="register-password" required autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password_confirmation" class="form-style" placeholder="Confirm Password" id="password-confirm" required autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <input type="hidden" name="role" value="admin" class="form-style" />
                                                </div>

                                                
                                                <button type="submit" class="btn mt-4">Sign Up</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
