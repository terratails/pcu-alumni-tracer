@extends('layouts.app')

@section('content')
@include('component.navbar')

<div class="container" style="margin-top: 80px;margin-bottom: 440px;">

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- Card -->
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="text-primary mb-0">List of Alumni</h4>
                        <small class="text-muted">A list of Alumni graduates from PCU</small>
                    </div>
                    <!-- <button class="btn btn-primary">+ Manual Entry</button> -->
                </div>

                <div class="card-body">
                    <!-- Table Controls -->
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <label for="entriesPerPage" class="me-2 text-muted">Show</label>
                            <select id="entriesPerPage" class="form-select form-select-sm me-2" style="width: 80px;">
                                <option>5</option>
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                            </select>
                            <span class="text-muted small">entries per page</span>
                        </div>

                        <form method="GET" action="{{ route('graduates.index') }}" class="d-flex">
                            <input type="search" name="search" class="form-control form-control-sm me-2" placeholder="Search..." value="{{ request('search') }}" style="width: 250px;">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                    </div>


                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th><input type="checkbox" class="form-check-input"></th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Student No.</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td><input type="checkbox" class="form-check-input" name="selected_users[]" value="{{ $user->id }}"></td>
                                    <td>
                                        {{ $user->tracer->familyname ?? '' }},
                                        {{ $user->tracer->firstname ?? '' }}
                                        {{ $user->tracer ? substr($user->tracer->middlename, 0, 1) . '.' : '' }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->tracer->studentnumber ?? 'N/A' }}</td>
                                    <td>{{ $user->tracer->contact ?? 'N/A' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('graduates.show', $user->id) }}" class="btn btn-sm btn-outline-secondary me-1" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal-{{ $user->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="{{ route('graduates.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this graduate? This action cannot be undone.')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No graduates found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination Links with Search Query Preserved -->
                        <div class="d-flex justify-content-center">
                            {{ $users->appends(['search' => request('search')])->links() }}
                        </div>

                        @foreach($users as $user)
                        <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <form action="{{ route('graduates.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Graduate: {{ $user->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            {{-- GENERAL INFORMATION --}}
                                            <h5 class="text-primary">General Information</h5>
                                            <p class="text-muted">Basic graduate details</p>
                                            <hr>

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" name="familyname" value="{{ $user->tracer->familyname ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="firstname" value="{{ $user->tracer->firstname ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" name="middlename" value="{{ $user->tracer->middlename ?? '' }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Student Number</label>
                                                    <input type="text" name="studentnumber" value="{{ $user->tracer->studentnumber ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" name="contact" value="{{ $user->tracer->contact ?? '' }}" class="form-control">
                                                </div>
                                            </div>

                                            {{-- EDUCATIONAL BACKGROUND --}}
                                            <h5 class="text-primary mt-4">Educational Background</h5>
                                            <p class="text-muted">School history of the graduate</p>
                                            <hr>

                                            <small class="lead">Primary</small>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Primary School</label>
                                                    <input type="text" name="primary_school" value="{{ $user->tracer->primary_school ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Year Graduated</label>
                                                    <input type="text" name="primary_yeargraduated" value="{{ $user->tracer->primary_yeargraduated ?? '' }}" class="form-control">
                                                </div>
                                            </div>

                                            <small class="lead">Secondary</small>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Secondary School</label>
                                                    <input type="text" name="secondary_school" value="{{ $user->tracer->secondary_school ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Year Graduated</label>
                                                    <input type="text" name="secondary_yeargraduated" value="{{ $user->tracer->secondary_yeargraduated ?? '' }}" class="form-control">
                                                </div>
                                            </div>

                                            <small class="lead">Tertiary</small>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Course</label>
                                                    <input type="text" name="tertiary_course" value="{{ $user->tracer->tertiary_course ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Year Graduated</label>
                                                    <input type="text" name="tertiary_yeargraduated" value="{{ $user->tracer->tertiary_yeargraduated ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">College/University</label>
                                                    <input type="text" name="tertiary_school" value="{{ $user->tracer->tertiary_school ?? '' }}" class="form-control">
                                                </div>
                                            </div>

                                            <small class="lead">Graduate Studies</small>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Master's Degree</label>
                                                    <input type="text" name="tertiary_masters" value="{{ $user->tracer->tertiary_masters ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Doctorate Degree</label>
                                                    <input type="text" name="tertiary_doctors" value="{{ $user->tracer->tertiary_doctors ?? '' }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection