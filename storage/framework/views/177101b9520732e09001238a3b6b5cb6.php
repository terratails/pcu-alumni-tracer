<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


        <nav class="navbar" style="height: 40px;">
            <ul class="navbar-menu">
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role === 'admin'): ?>
                <li class="navbar-item">
                    <a href="<?php echo e(route('admin.home')); ?>" class="text-muted" style="font-size: 14px;">Home</a>
                </li>
                <li class="navbar-item">
                    <a href="<?php echo e(route('profile.index')); ?>" class="text-muted" style="font-size: 14px;">Profile</a>
                </li>
                <li class="navbar-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-muted" style="font-size: 14px;">Dashboard</a>
                </li>
                <?php endif; ?>
            <?php endif; ?>
            </ul>
        </nav>


    <link rel="stylesheet" href="<?php echo e(asset('css/admin/consent.css')); ?>">
</head>
<body>

</body>
</html>
<?php /**PATH /home/yhm5jv201rtg/repositories/alumni-tracer/resources/views/component/navbar.blade.php ENDPATH**/ ?>