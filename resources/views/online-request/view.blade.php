@extends('layouts.app')

@section('content')
@include('component.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Request - Tables</title>
    <style>
        .card-text:last-child {
         margin-bottom: 0;
         color
        }
    </style>
</head>
<body>
    <div class="container my-5" style="padding-bottom: 170px;">
        <div class="card shadow-lg my-5">
            <div class="card-header">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <h4 class="mb-1 text-primary">Online Request</h4>
                        <p class="text-muted">This is where Online Request goes to</p>
                    </div>
                    <div class="col-md-6 text-end mt-4 d-flex justify-content-end">
                        <form action="{{ route('request.index') }}" method="GET" class="d-flex" role="search">
                            <input 
                                class="form-control me-2" 
                                type="search" 
                                 name="search" 
                                placeholder="Search requests..." 
                                aria-label="Search"
                                value="{{ request('search') }}"
                            >
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-5">
                    <table class="table table-hover align-middle mb-0" style="min-width: 900px;">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4">Full name</th>
                                <th class="px-4">Student Number</th>
                                <th class="px-4">Course</th>
                                <th class="px-4">Email</th>
                                <!-- <th class="px-4">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tracers as $tracer)
                                <tr>
                                    <td class="px-4">{{ $tracer->familyname }}, {{ $tracer->firstname }} {{ $tracer->middlename }}</td>
                                    <td class="px-4">{{ $tracer->studentnumber }}</td>
                                    <td class="px-4">{{ $tracer->tertiary_course }}</td>
                                    <td class="px-4">{{ $tracer->email }}</td>
                                    <!-- <td class="px-4">
                                        <a href="mailto:{{ $tracer->contact }}" class="btn btn-sm btn-outline-primary">Email</a>
                                    </td> -->
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>                    
                </div>

            </div>
        </div>
    </div>
</body>
</html>
@endsection