<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


        <nav class="navbar" style="height: 40px;">
            <ul class="navbar-menu">
            @auth
                @if(Auth::user()->role === 'admin')
                <li class="navbar-item">
                    <a href="{{ route('admin.home') }}" class="text-muted" style="font-size: 14px;">Home</a>
                </li>
                <li class="navbar-item">
                    <a href="{{ route('profile.index') }}" class="text-muted" style="font-size: 14px;">Profile</a>
                </li>
                <li class="navbar-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted" style="font-size: 14px;">Dashboard</a>
                </li>
                @endif
            @endauth
            </ul>
        </nav>


    <link rel="stylesheet" href="{{ asset('css/admin/consent.css') }}">
</head>
<body>

</body>
</html>
