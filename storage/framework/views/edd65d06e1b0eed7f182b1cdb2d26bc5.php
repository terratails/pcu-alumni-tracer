

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container my-5" style="padding-bottom: 140px;">
    <div class="row justify-content-center my-4">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-ms-4">
                    <a class="btn btn-primary" href="<?php echo e(Auth::user()->role === 'user' ? route('user.home') : route('admin.home')); ?>">
                        <i class="bi bi-house"></i> Home
                    </a>

                    <?php if(Auth::user()->role !== 'admin'): ?>
                        <a class="btn btn-secondary mx-2" href="<?php echo e(route('profile.edit')); ?>">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">
        <!-- Profile Picture -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="text-primary">Profile Picture</h5>
                </div>
                <div class="card-body text-center">
                    <img src="<?php echo e($user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('defaultprofile.png')); ?>"
                        alt="Profile Picture" class="rounded-circle mb-3" height="160" width="160">

                    <h5 class="mt-2 mb-1">
                        <?php if($tracer && $tracer->familyname && $tracer->firstname && $tracer->middlename): ?>
                            <?php echo e($tracer->familyname); ?>, <?php echo e($tracer->firstname); ?> <?php echo e(substr($tracer->middlename, 0, 1)); ?>.
                        <?php else: ?>
                            <?php echo e($user->name); ?>

                        <?php endif; ?>
                    </h5>

                    <p class="text-muted mb-0">
                        <?php echo e($tracer->studentnumber ?? 'No contact info available'); ?>

                    </p>
                </div>
            </div>
        </div>




        <!-- Tracer Info -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">General Information</h5>
                    <p class="card-text text-muted">About me</p>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label text-muted">Surname</label>
                            <input type="text" class="form-control" value="<?php echo e($tracer->familyname ?? ''); ?>" style="font-size: 13px;" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">First Name</label>
                            <input type="text" class="form-control" value="<?php echo e($tracer->firstname ?? ''); ?>" style="font-size: 13px;" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Middle Initial</label>
                            <input type="text" class="form-control" value="<?php echo e($tracer ? substr($tracer->middlename, 0, 1) . '.' : ''); ?>" style="font-size: 13px;" disabled>
                        </div>                                          
                    </div>

                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted">Email Address</label>
                            <input type="text" class="form-control" value="<?php echo e(Auth::user()->email); ?>" style="font-size: 13px;" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Student Number</label>
                            <input type="text" class="form-control" value="<?php echo e($tracer->studentnumber ?? ''); ?>" style="font-size: 13px;" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Contact Number</label>
                            <input type="text" class="form-control" value="<?php echo e($tracer->contact ?? ''); ?>" style="font-size: 13px;" disabled>
                        </div>             
                    </div>
                </div>
            </div>
            <!-- Educational Background -->
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h5 class="card-title text-primary">Educational Background</h5>
                    <p class="card-text text-muted">Mandatory information</p>
                    <hr>
                    <?php if($tracer): ?>
                        <small class="lead mt-5">Primary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Primary School</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->primary_school); ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->primary_yeargraduated); ?>" disabled>
                            </div>
                        </div>

                        <small class="lead mt-5">Secondary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Secondary School</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->secondary_school); ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->secondary_yeargraduated); ?>" disabled>
                            </div>
                        </div>

                        <small class="lead mt-5">Tertiary</small>
                        <div class="row my-4">
                            <div class="col-md-3">
                                <label class="form-label text-muted">Course</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->tertiary_course); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->tertiary_yeargraduated); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-muted">Master's</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->tertiary_masters); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-muted">Doctor's</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->tertiary_doctors); ?>" disabled>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mt-3 text-center">
                            Educational background is not yet available.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Employment Background Section -->
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title text-primary">Employment Background</h5>
                    <p class="card-text text-muted">Information about your Employment</p>
                    <hr>

                    <?php if($tracer): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Employer</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->employer); ?>" style="font-size: 13px;" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Position</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->position); ?>" style="font-size: 13px;" disabled>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Sector</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->sector); ?>" style="font-size: 13px;" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Place of Work</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->placeofwork); ?>" style="font-size: 13px;" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Type of Employment</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->typeofemployment); ?>" style="font-size: 13px;" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Extent of Employment</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->extentofemployment); ?>" style="font-size: 13px;" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Date Hired</label>
                                <input type="text" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($tracer->datehired)->toFormattedDateString()); ?>" style="font-size: 13px;" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Average Monthly Salary</label>
                                <input type="text" class="form-control" value="<?php echo e($tracer->averagemonthly); ?>" style="font-size: 13px;" disabled>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mt-3 text-center">
                            Employment background is not yet available.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/profile/view.blade.php ENDPATH**/ ?>