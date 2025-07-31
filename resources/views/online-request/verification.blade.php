@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    @include('component.navbar')
    <link rel="stylesheet" href="{{ asset('css/admin/consent.css') }}">
</head>
<body>
    <header class="page-header py-1" style="background-image: url('{{ asset('primary-bg.svg') }}');">
        <h1 class="page-header__title p-5 px-5">
            <p class="pl-5">Alumni Tracing Form</p>
        </h1>
    </header>

    <div class="container mt-5">
        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-body m-5">

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

                {{-- Verification Form --}}
                <form method="POST" action="{{ route('verification.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="verification_code">Verification Code (Note:It may take 1 to 5 minutes to receive the verification code in your email.)</label>
                        <input type="text" name="verification_code" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Verify</button>
                </form>

                {{-- Show Resend Code button only after at least one attempt --}}
                @if(session('verification_attempts') && session('verification_attempts') > 0)
                    <form method="POST" action="{{ route('verification.resend') }}" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">Resend Code</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

    {{-- Modal for max attempts --}}
    @if(session('max_attempt_reached'))
        <div id="maxAttemptModal" style="display:block; position:fixed; z-index:1050; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);">
            <div style="background:#fff; margin:15% auto; padding:30px; width:400px; border-radius:5px; text-align:center; box-shadow:0 5px 15px rgba(0,0,0,.5);">
                <h2>Maximum attempts has been reached, Session expired.</h2>
                <p>You will be redirected in <span id="countdown">5</span> seconds.</p>
            </div>
        </div>

        <script>
            let seconds = 5;
            const countdownElem = document.getElementById('countdown');

            const countdown = setInterval(() => {
                seconds--;
                countdownElem.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(countdown);
                    window.location.href = "{{ url('/') }}";
                }
            }, 1000);
        </script>
    @endif

</body>
</html>

@endsection
