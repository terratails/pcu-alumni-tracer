<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container my-5" style="padding-bottom: 140px;">
    <div class="row justify-content-center my-4">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-auto mb-2">
                    <a class="btn btn-danger" href="<?php echo e(route('profile.index')); ?>">
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

<form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data" id="profileForm">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>
        <div class="row justify-content-center">
            <!-- Profile Picture Section -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="text-primary">Profile Picture</h5>
                    </div>
                    <div class="card-body text-center">
                        <img id="profilePreview" class="img-account-profile rounded-circle mb-3" 
                             src="<?php echo e(Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('defaultprofile.png')); ?>" 
                             alt="Profile Picture" height="160px" width="160px">
                        <div class="mb-3">
                            <input type="file" name="profile_picture" id="profilePictureInput" class="form-control" onchange="previewImage(event)">
                            <?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                       class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="lastname" 
                                       value="<?php echo e(old('lastname', $tracer->familyname ?? '')); ?>" 
                                       style="font-size: 13px;">
                                <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">First Name</label>
                                <input type="text" 
                                       class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="firstname" 
                                       value="<?php echo e(old('firstname', $tracer->firstname ?? '')); ?>" 
                                       style="font-size: 13px;">
                                <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Middle Initial</label>
                                <input type="text" 
                                       class="form-control <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="middlename" 
                                       value="<?php echo e(old('middlename', $tracer && $tracer->middlename ? substr($tracer->middlename, 0, 1) . '.' : '')); ?>"
                                       style="font-size: 13px;">
                                <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email', Auth::user()->email)); ?>" readonly>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="form-label text-muted">Student Number</label>
                                <input type="number" name="studentnumber" class="form-control" value="<?php echo e(old('studentnumber', $tracer->studentnumber ?? '')); ?>" >

                                <?php $__errorArgs = ['studentnumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-muted">Contact Number</label>
                                <input type="text" 
                                       class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="contact" 
                                       value="<?php echo e(old('contact', $tracer->contact ?? '')); ?>" 
                                       style="font-size: 13px;">
                                <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>             
                        </div>

                        <div class="row my-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted">New Password</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       placeholder="******" 
                                       style="font-size: 13px;">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                <?php if($tracer): ?>
                <!-- Educational Background Card -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Educational Background</h5>
                        <hr>
                        <small class="lead">Primary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Primary School</label>
                                <input type="text" name="primary_school" class="form-control <?php $__errorArgs = ['primary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('primary_school', $tracer->primary_school)); ?>">
                                <?php $__errorArgs = ['primary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" name="primary_yeargraduated" class="form-control <?php $__errorArgs = ['primary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('primary_yeargraduated', $tracer->primary_yeargraduated)); ?>">
                                <?php $__errorArgs = ['primary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <small class="lead">Secondary</small>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Secondary School</label>
                                <input type="text" name="secondary_school" class="form-control <?php $__errorArgs = ['secondary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('secondary_school', $tracer->secondary_school)); ?>">
                                <?php $__errorArgs = ['secondary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Year Graduated</label>
                                <input type="text" name="secondary_yeargraduated" class="form-control <?php $__errorArgs = ['secondary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('secondary_yeargraduated', $tracer->secondary_yeargraduated)); ?>">
                                <?php $__errorArgs = ['secondary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <small class="lead">Tertiary</small>
                        <div class="row my-4">
                            <?php $__currentLoopData = [
                                'tertiary_course' => 'Course',
                                'tertiary_yeargraduated' => 'Year Graduated',
                                'tertiary_masters' => "Master's",
                                'tertiary_doctors' => "Doctor's"
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <label class="form-label text-muted"><?php echo e($label); ?></label>
                                <input type="text" name="<?php echo e($field); ?>" class="form-control <?php $__errorArgs = [$field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old($field, $tracer->$field)); ?>">
                                <?php $__errorArgs = [$field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <!-- Employment Background Card -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Employment Background</h5>
                        <hr>
                        <div class="row">
                            <?php $__currentLoopData = [
                                'employer' => 'Employer',
                                'position' => 'Position',
                                'sector' => 'Sector',
                                'placeofwork' => 'Place of Work',
                                'typeofemployment' => 'Type of Employment',
                                'extentofemployment' => 'Extent of Employment',
                                'datehired' => 'Date Hired',
                                'averagemonthly' => 'Average Monthly Salary'
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-<?php echo e(in_array($field, ['sector', 'placeofwork', 'typeofemployment']) ? 4 : 6); ?>">
                                <label class="form-label text-muted"><?php echo e($label); ?></label>
                                <input type="<?php echo e($field === 'datehired' ? 'date' : 'text'); ?>" name="<?php echo e($field); ?>" class="form-control <?php $__errorArgs = [$field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old($field, $tracer->$field)); ?>">
                                <?php $__errorArgs = [$field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="alert alert-warning mt-4">Tracer information is not yet available.</div>
                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yhm5jv201rtg/repositories/alumni-tracer/resources/views/profile/edit.blade.php ENDPATH**/ ?>