@extends('layouts.app')

@section('content')
@include('component.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-color: white;">
    <div class="container" style="margin-bottom: 390px;">
        <div class="row align-middle">
<!--             <div class="col-smd-6 col-lg-4 column">
                <div class="card gr-1">
                    <div class="txt">
                        <h1>Alumni</br>Tracer</h1>
                        <p>Online student form for Alumni students</p>
                    </div>
                    <a href="{{ route('termscondition') }}">Go to Alumni Tracer</a>
                    <div class="ico-card">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
            </div> -->
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
                <div class="card gr-3">
                    <div class="txt">
                        <h1>List of</br>Graduates</h1>
                        <p>This is where you can see the list of graduates in the present year</p>
                    </div>
                    <a href="{{ route('graduates.index') }}">Go to List of Graduates</a>
                    <div class="ico-card">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 column">
                <!-- Extra Space 1 -->
            </div>
            <div class="col-md-6 col-lg-4 column">
                <!-- <div class="card gr-4">
                    <div class="txt">
                        <h1>Online</br>Request</h1>
                        <p>List of student request online</p>
                    </div>
                    <a href="{{ route('request.index') }}">Go to Online Request</a>
                    <div class="ico-card">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                </div> -->
            </div>
            <div class="col-md-6 col-lg-4 column">
                <!-- Extra Space 2 -->
            </div>
        </div>
    </div>
</body>
</html>
@endsection
