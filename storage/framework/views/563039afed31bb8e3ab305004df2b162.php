<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/dashboard.css')); ?>">
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
                    <a href="<?php echo e(route('termscondition')); ?>">Go to Alumni Tracer</a>
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
                    <a href="<?php echo e(route('profile.index')); ?>">Go to Profile</a>
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
                    <a href="<?php echo e(route('graduates.index')); ?>">Go to List of Graduates</a>
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
                    <a href="<?php echo e(route('request.index')); ?>">Go to Online Request</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yhm5jv201rtg/repositories/alumni-tracer/resources/views/admin/home.blade.php ENDPATH**/ ?>