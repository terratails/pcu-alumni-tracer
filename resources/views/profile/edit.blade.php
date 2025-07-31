@extends('layouts.app')

@section('content')
@include('component.navbar')

<div class="container my-5" style="padding-bottom: 140px;">
    <div class="row justify-content-center my-4">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-auto mb-2">
                    <a class="btn btn-danger" href="{{ route('profile.index') }}">
                        <i class="bi bi-house"></i> Back
                    </a>
                </div>
                <div class="col-md-auto mb-2">
                    <button type="submit" form="profileForm" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm">
@csrf
@method('PUT')
        <div class="row justify-content-center">
            <!-- Profile Picture Section -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="text-primary">Profile Picture</h5>
                    </div>
                    <div class="card-body text-center">
                        <img id="profilePreview" class="img-account-profile rounded-circle mb-3" 
                             src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('defaultprofile.png') }}" 
                             alt="Profile Picture" height="160px" width="160px">
                        <div class="mb-3">
                            <input type="file" name="profile_picture" id="profilePictureInput" class="form-control" onchange="previewImage(event)">
                            @error('profile_picture')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Info and Other Sections -->
            <div class="col-md-9">

                <!-- Edit Profile Card -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Edit Profile</h5>
                        <p class="card-text text-muted">Mandatory information</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Surname</label>
                                <input type="text" 
                                       class="form-control @error('lastname') is-invalid @enderror" 
                                       name="lastname" 
                                       value="{{ old('lastname', $tracer->familyname ?? '') }}" 
                                       style="font-size: 13px;">
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">First Name</label>
                                <input type="text" 
                                       class="form-control @error('firstname') is-invalid @enderror" 
                                       name="firstname" 
                                       value="{{ old('firstname', $tracer->firstname ?? '') }}" 
                                       style="font-size: 13px;">
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Middle Initial</label>
                                <input type="text" 
                                       class="form-control @error('middlename') is-invalid @enderror" 
                                       name="middlename" 
                                       value="{{ old('middlename', $tracer && $tracer->middlename ? substr($tracer->middlename, 0, 1) . '.' : '') }}"
                                       style="font-size: 13px;">
                                @error('middlename')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" readonly>

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label class="form-label text-muted">Student Number</label>
                                <input type="number" name="studentnumber" class="form-control" value="{{ old('studentnumber', $tracer->studentnumber ?? '') }}" >

                                @error('studentnumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-muted">Contact Number</label>
                                <input type="text" 
                                       class="form-control @error('contact') is-invalid @enderror" 
                                       name="contact" 
                                       value="{{ old('contact', $tracer->contact ?? '') }}" 
                                       style="font-size: 13px;">
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>             
                        </div>

                        <div class="row my-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted">New Password</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="******" 
                                       style="font-size: 13px;">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Confirm Password</label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control" 
                                       placeholder="******" 
                                       style="font-size: 13px;">
                            </div>
                        </div>
                    </div>
                </div>

                @if ($tracer)
                <!-- Educational Background Card -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Educational Background</h5>
                        <hr>
                        <small class="lead">Primary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Primary School</label>
                                <input type="text" name="primary_school" class="form-control @error('primary_school') is-invalid @enderror" value="{{ old('primary_school', $tracer->primary_school) }}">
                                @error('primary_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" name="primary_yeargraduated" class="form-control @error('primary_yeargraduated') is-invalid @enderror" value="{{ old('primary_yeargraduated', $tracer->primary_yeargraduated) }}">
                                @error('primary_yeargraduated') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <small class="lead">Secondary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Secondary School</label>
                                <input type="text" name="secondary_school" class="form-control @error('secondary_school') is-invalid @enderror" value="{{ old('secondary_school', $tracer->secondary_school) }}">
                                @error('secondary_school') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" name="secondary_yeargraduated" class="form-control @error('secondary_yeargraduated') is-invalid @enderror" value="{{ old('secondary_yeargraduated', $tracer->secondary_yeargraduated) }}">
                                @error('secondary_yeargraduated') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <small class="lead">Tertiary</small>
                        <div class="row my-4">
                            @foreach ([
                                'tertiary_course' => 'Course',
                                'tertiary_yeargraduated' => 'Year Graduated',
                                'tertiary_masters' => "Master's",
                                'tertiary_doctors' => "Doctor's"
                            ] as $field => $label)
                            <div class="col-md-3">
                                <label class="form-label text-muted">{{ $label }}</label>
                                <input type="text" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" value="{{ old($field, $tracer->$field) }}">
                                @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Employment Background Card -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Employment Background</h5>
                        <hr>
                        <div class="row">
                            @foreach ([
                                'employer' => 'Employer',
                                'position' => 'Position',
                                'sector' => 'Sector',
                                'placeofwork' => 'Place of Work',
                                'typeofemployment' => 'Type of Employment',
                                'extentofemployment' => 'Extent of Employment',
                                'datehired' => 'Date Hired',
                                'averagemonthly' => 'Average Monthly Salary'
                            ] as $field => $label)
                            <div class="col-md-{{ in_array($field, ['sector', 'placeofwork', 'typeofemployment']) ? 4 : 6 }}">
                                <label class="form-label text-muted">{{ $label }}</label>
                                <input type="{{ $field === 'datehired' ? 'date' : 'text' }}" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" value="{{ old($field, $tracer->$field) }}">
                                @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-warning mt-4">Tracer information is not yet available.</div>
                @endif
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('profilePreview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
