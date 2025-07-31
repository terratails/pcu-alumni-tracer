

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Request - Tables</title>
    <style>
        .card-text:last-child {
         margin-bottom: 0;
         color
        }
    </style>
</head>
<body>
    <div class="container my-5" style="padding-bottom: 170px;">
        <div class="card shadow-lg my-5">
            <div class="card-header">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <h4 class="mb-1 text-primary">Online Request</h4>
                        <p class="text-muted">This is where Online Request goes to</p>
                    </div>
                    <div class="col-md-6 text-end mt-4 d-flex justify-content-end">
                        <form action="<?php echo e(route('request.index')); ?>" method="GET" class="d-flex" role="search">
                            <input 
                                class="form-control me-2" 
                                type="search" 
                                 name="search" 
                                placeholder="Search requests..." 
                                aria-label="Search"
                                value="<?php echo e(request('search')); ?>"
                            >
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-5">
                    <table class="table table-hover align-middle mb-0" style="min-width: 900px;">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4">Full name</th>
                                <th class="px-4">Student Number</th>
                                <th class="px-4">Course</th>
                                <th class="px-4">Email</th>
                                <!-- <th class="px-4">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $tracers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tracer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-4"><?php echo e($tracer->familyname); ?>, <?php echo e($tracer->firstname); ?> <?php echo e($tracer->middlename); ?></td>
                                    <td class="px-4"><?php echo e($tracer->studentnumber); ?></td>
                                    <td class="px-4"><?php echo e($tracer->tertiary_course); ?></td>
                                    <td class="px-4"><?php echo e($tracer->email); ?></td>
                                    <!-- <td class="px-4">
                                        <a href="mailto:<?php echo e($tracer->contact); ?>" class="btn btn-sm btn-outline-primary">Email</a>
                                    </td> -->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No requests found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>                    
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/online-request/view.blade.php ENDPATH**/ ?>