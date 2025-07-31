<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container d-flex justify-content-center align-items-center mt-5" style="padding-top: 150px;padding-bottom: 80px;">
    <div class="card shadow-lg p-4 text-center">
        <div class="card-body mt-5">
            <h1 class="text-success fw-bold">THANK YOU!</h1>
            <i class="fa fa-check-circle text-success display-1 mb-3"></i>
            <p class="lead">
                Note: Your username and password will be sent to the email you used during registration. Please be advised that the credentials email may take 1 to 5 minutes to arrive in your inbox. Thank you!
            </p>
            <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yhm5jv201rtg/public_html/alumni-manila/resources/views/page/thankyou.blade.php ENDPATH**/ ?>