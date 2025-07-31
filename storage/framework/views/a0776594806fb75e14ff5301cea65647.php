
<?php $__env->startSection('content'); ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 500px;">
        <h4 class="text-center mb-4">Forgot Password</h4>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <?php if(!session('email_pending_verification') && !session('verified')): ?>
            <form method="POST" action="<?php echo e(route('password.sendcode')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="email">Enter your registered email</label>
                    <input type="email" name="email" class="form-control" required autofocus value="<?php echo e(old('email')); ?>">
                </div>
                <button type="submit" class="btn btn-primary w-100">Send Verification Code</button>
            </form>

        
        <?php elseif(session('email_pending_verification') && !session('verified')): ?>
            <form method="POST" action="<?php echo e(route('password.verifycode')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="verification_code">Enter the verification code sent to your email</label>
                    <input type="text" name="verification_code" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Verify Code</button>
            </form>

        
        <?php elseif(session('verified')): ?>
            <form method="POST" action="<?php echo e(route('password.reset.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yhm5jv201rtg/public_html/alumni-manila/resources/views/online-request/forgetpassword.blade.php ENDPATH**/ ?>