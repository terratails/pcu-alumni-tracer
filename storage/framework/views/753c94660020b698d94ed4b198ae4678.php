
<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/consent.css')); ?>">
</head>
<body>
    <header class="page-header py-1" style="background-image: url('<?php echo e(asset('primary-bg.svg')); ?>');">
        <h1 class="page-header__title p-5 px-5">
            <p class="pl-5">Alumni Tracing Form</p>
        </h1>
    </header>

    <div class="container mt-5">
        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-body m-5">

                
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

                
                <form method="POST" action="<?php echo e(route('verification.submit')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="verification_code">Verification Code</label>
                        <input type="text" name="verification_code" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Verify</button>
                </form>

                
                <?php if(session('verification_attempts') && session('verification_attempts') > 0): ?>
                    <form method="POST" action="<?php echo e(route('verification.resend')); ?>" class="mt-3">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-secondary">Resend Code</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

    
    <?php if(session('max_attempt_reached')): ?>
        <div id="maxAttemptModal" style="display:block; position:fixed; z-index:1050; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);">
            <div style="background:#fff; margin:15% auto; padding:30px; width:400px; border-radius:5px; text-align:center; box-shadow:0 5px 15px rgba(0,0,0,.5);">
                <h2>Maximum attempts has been reached, Session expired.</h2>
                <p>You will be redirected in <span id="countdown">5</span> seconds.</p>
            </div>
        </div>

        <script>
            let seconds = 5;
            const countdownElem = document.getElementById('countdown');

            const countdown = setInterval(() => {
                seconds--;
                countdownElem.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(countdown);
                    window.location.href = "<?php echo e(url('/')); ?>";
                }
            }, 1000);
        </script>
    <?php endif; ?>

</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/online-request/verification.blade.php ENDPATH**/ ?>