<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <nav class="navbar" style="height: 40px;">
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="{{ url('home') }}" class="text-secondary" style="font-size: 14px;text-color:transparent;"></a></li>
            <li class="navbar-item"><a href="{{ route('profile.index') }}" class="text-secondary" style="font-size: 14px;text-color:transparent;"></a></li>
            <li class="navbar-item"><a href="{{ route('graduates.index') }}" class="text-secondary" style="font-size: 14px;text-color:transparent;"></a></li>
        </ul>
    </nav>
    <link rel="stylesheet" href="{{ asset('css/admin/consent.css') }}">
</head>
<body>
    
</body>
</html>