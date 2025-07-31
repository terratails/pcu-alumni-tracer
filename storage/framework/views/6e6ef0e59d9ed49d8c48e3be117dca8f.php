

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container d-flex justify-content-center align-items-center mt-5" style="padding-top: 150px;padding-bottom: 80px;">
    <div class="card shadow-lg p-4 text-center">
        <div class="card-body mt-5">
            <h1 class="text-success fw-bold">THANK YOU!</h1>
            <i class="fa fa-check-circle text-success display-1 mb-3"></i>
            <p class="lead">
                Thanks a bunch for filling that out. It means a lot to us, just like you do! 
                We really appreciate you giving us a moment of your time today. Thanks for being you. 🎉
            </p>
            <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/page/thankyou.blade.php ENDPATH**/ ?>