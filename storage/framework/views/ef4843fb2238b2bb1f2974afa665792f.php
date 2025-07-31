
<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php echo $__env->make('component.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/consent.css')); ?>">
    <style>
        .agree-btn, .disagree-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            font-size: 16px;
            border-radius: 6px;
            width: 100%;
            text-decoration: none;
            font-weight: bold;
        }

        .agree-btn {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .disagree-btn {
            background-color: white;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .button-section {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header class="page-header py-1" style="background-image: url('<?php echo e(asset('primary-bg.svg')); ?>');">
        <h1 class="page-header__title p-5 px-5"><p class="pl-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alumni Tracing Form</p></h1>
    </header>
    <div class="container mt-5">
        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-body m-5">
                <p>Dear PCU Alumni,</p>
                <p class="text-align: justify;">
                    <span style="font-family: Calibri; font-size: 13pt;">
                        The Philippine Christian University is establishing a system of tracing its graduates and getting feedback regarding the type of work, educational experiences, employability and promotion status. This is useful for planning future educational needs. Results of this tracer study will only be presented in summary form and individual responses will be kept <b><i>strictly confidential.</i></b>
                    </span>
                </p>
                <p style="text-indent: 36pt; text-align: justify;">
                    <span style="font-family: Calibri; font-size: 13pt;">
                        May we therefore request your precious time to please answer the questionnaire sincerely. There is no right or wrong answer. We would appreciate if you could complete the following questionnaire and return to us, at your earliest convenience.
                    </span>
                </p>
                <p style="text-indent: 36pt;">
                    Thank you for your copperation and God bless.
                </p>

                <br>
                <p>
                    <span style="font-family: Calibri; font-size: 11pt;">
                        Sincerely,
                    </span>
                </p>
                <p style="padding-left: 360px;">
                    <span style="font-family: Calibri; font-size: 11pt;">

                    </span>
                </p>

                <p style="margin-top: 2px; margin-bottom: 0pt; text-align: justify;">
                    <span style="font-family: Calibri; font-size: 11pt;">
                        Glen Paul D. Choco, MIT
                    </span>
                </p>
                <p>
                    <span style="font-family: Calibri; font-size: 11pt; text-align: justify;">
                        Web Application Developer
                    </span>
                </p>
                <p style="margin-bottom: 0pt;">
                    <span style="font-family: Calibri; font-size: 11pt;">
                        Mobile: 0976 128 1876
                    </span>
                </p>
                <p style="margin-bottom: 0pt;">
                    <span style="font-family: Calibri; font-size: 11pt;">
                        Email: <a href="mailto:glenpaul.choco@pcu.edu.ph">glenpaul.choco@pcu.edu.ph</a>
                    </span>
                </p>
               
                <p class="lead mt-5">GENERAL INFORMATION</p>
                <hr class="my-2">
                <?php if(session('success')): ?>
                    <div style="color: green;">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('tracer.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="familyname">Surname</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="familyname" id="familyname" 
                                class="form-control <?php $__errorArgs = ['familyname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('familyname')); ?>" required>
                            <?php $__errorArgs = ['familyname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="firstname">First Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="firstname" id="firstname" 
                                class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('firstname')); ?>" required>
                            <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="middlename">Middle Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="middlename" id="middlename" 
                                class="form-control <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('middlename')); ?>">
                            <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="contact">Contact Number</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="contact" id="contact" 
                                class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('contact')); ?>">
                            <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email Address</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" id="email" 
                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="civil">Civil Status</label>
                        </div>
                        <div class="col-md-4">
                            <select name="civil" id="civil" 
                                    class="form-control <?php $__errorArgs = ['civil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option disabled <?php echo e(old('civil') ? '' : 'selected'); ?>>Select an option</option>
                                <option value="Single" <?php echo e(old('civil') == 'Single' ? 'selected' : ''); ?>>Single</option>
                                <option value="Married" <?php echo e(old('civil') == 'Married' ? 'selected' : ''); ?>>Married</option>
                                <option value="Widow/Widower" <?php echo e(old('civil') == 'Widow/Widower' ? 'selected' : ''); ?>>Widow/Widower</option>
                            </select>
                            <?php $__errorArgs = ['civil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- EDUCATIONAL BACKGROUND -->
                    <p class="lead mt-5">EDUCATIONAL BACKGROUND</p>
                    <hr class="my-2">

                    <div class="row my-3">
                        <div class="col-md-6">
                            <label class="form-label" for="studentnumber">Student Number (Optional)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="studentnumber" id="studentnumber" 
                                class="form-control <?php $__errorArgs = ['studentnumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('studentnumber')); ?>">
                            <?php $__errorArgs = ['studentnumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <small class="lead mt-5">Primary</small>

                    <div class="row mt-3">
                        <div class="row align-items-center mb-3 ml-5">
                            <!-- School Attended -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">School Attended</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="primary_school" 
                                    class="form-control <?php $__errorArgs = ['primary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('primary_school')); ?>">
                                <?php $__errorArgs = ['primary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3 ml-5">
                            <!-- Year Graduated -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">Year Graduated</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="primary_yeargraduated" 
                                    class="form-control <?php $__errorArgs = ['primary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('primary_yeargraduated')); ?>">
                                <?php $__errorArgs = ['primary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>                        
                        </div>                    
                    </div>          
                    <p class="lead mt-5">Secondary</p>

                    <div class="row mt-3">
                        <div class="row align-items-center mb-3 ml-5">
                            <!-- School Attended -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">School Attended</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="secondary_school" 
                                    class="form-control <?php $__errorArgs = ['secondary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('secondary_school')); ?>">
                                <?php $__errorArgs = ['secondary_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3 ml-5">
                            <!-- Year Graduated -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">Year Graduated</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="secondary_yeargraduated" 
                                    class="form-control <?php $__errorArgs = ['secondary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('secondary_yeargraduated')); ?>">
                                <?php $__errorArgs = ['secondary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>                        
                        </div>                    
                    </div>

                    <p class="lead mt-5">Tertiary</p>

                    <div class="row mt-3">
                        <div class="row align-items-center mb-3 ml-5">
                            <!-- College Course -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">College Course</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="tertiary_course" 
                                    class="form-control <?php $__errorArgs = ['tertiary_course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('tertiary_course')); ?>">
                                <?php $__errorArgs = ['tertiary_course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row align-items-center mb-3 ml-5">
                            <!-- Year Graduated -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">Year Graduated</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="tertiary_yeargraduated" 
                                    class="form-control <?php $__errorArgs = ['tertiary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('tertiary_yeargraduated')); ?>">
                                <?php $__errorArgs = ['tertiary_yeargraduated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>                        
                        </div>        

                        <div class="row align-items-center mb-3 ml-5">
                            <!-- Master's Degree -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">Master's Degree</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="tertiary_masters" 
                                    class="form-control <?php $__errorArgs = ['tertiary_masters'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('tertiary_masters')); ?>">
                                <?php $__errorArgs = ['tertiary_masters'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>                        
                        </div> 

                        <div class="row align-items-center mb-3 ml-5">
                            <!-- Doctoral Degree -->
                            <div class="col-md-6" style="padding-left: 5%;">
                                <label class="form-label">Doctoral Degree</label>
                            </div>
                            <div class="col-md-4" style="padding-left: 2%;">
                                <input type="text" name="tertiary_doctors" 
                                    class="form-control <?php $__errorArgs = ['tertiary_doctors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    value="<?php echo e(old('tertiary_doctors')); ?>">
                                <?php $__errorArgs = ['tertiary_doctors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>                        
                        </div>             
                    </div>

                    <!-- EMPLOYMENT BACKGROUND -->
                    <p class="lead mt-5">CURRENT EMPLOYMENT BACKGROUND</p>
                    <hr class="my-2">
                    <!-- END -->

                   <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Name of Employer</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="employer" id="employer" class="form-control <?php $__errorArgs = ['employer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('employer')); ?>" class="form-control">
                            <?php $__errorArgs = ['employer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div> 

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="position" class="form-label">Position</label>
                        </div>
                        <div class="col-md-4">
                            <input 
                                type="text" 
                                name="position" 
                                id="position" 
                                class="form-control <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('position')); ?>"
                            >
                            <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Sector</label>
                        </div>
                        <div class="col-md-6">
                            <select name="sector" id="sector" class="form-control <?php $__errorArgs = ['sector'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option disabled selected>Select a Sector</option>
                                <option value="Private">Private</option>
                                <option value="Government">Government</option>
                                <option value="Non-Government">Non-Government</option>
                                <option value="Non-Industry">Non-Industry</option>
                                <option value="Accounting - Administration and Office Support">Accounting - Administration and Office Support</option>
                                <option value="Advertising">Advertising</option>
                                <option value="Arts and Media">Arts and Media</option>
                                <option value="Banking and Financial Services">Banking and Financial Services</option>
                                <option value="Call Center and Customer Service">Call Center and Customer Service</option>
                                <option value="Community Services and Development">Community Services and Development</option>
                                <option value="Construction">Construction</option>
                                <option value="Consulting and Strategy">Consulting and Strategy</option>
                                <option value="Design and Architecture">Design and Architecture</option>
                                <option value="Education and Training">Education and Training</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Farming - Animals and Conservation">Farming - Animals and Conservation</option>
                                <option value="Government and Defense">Government and Defense</option>
                                <option value="Healthcare and Medical">Healthcare and Medical</option>
                                <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                <option value="Human Resources and Recruitment">Human Resources and Recruitment</option>
                                <option value="Information and Communication Technology">Information and Communication Technology</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Legal">Legal</option>
                                <option value="Manufacturing - Transport and Logistics">Manufacturing - Transport and Logistics</option>
                                <option value="Marketing and Communication">Marketing and Communications</option>
                                <option value="Mining - Resources and Energy">Mining - Resources and Energy</option>
                                <option value="Real Estate and Property">Real Estate and Property</option>
                                <option value="Retail and Consumer Products">Retail and Consumer Products</option>
                                <option value="Sales">Sales</option>
                                <option value="Science and Technology">Science and Technology</option>
                                <option value="Sports and Recreation">Sports and Recreation</option>
                                <option value="Trades and Services">Trades and Services</option>
                            </select>
                            <?php $__errorArgs = ['sector'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Place of Work</label>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input <?php $__errorArgs = ['placeofwork'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            type="radio" 
                                            name="placeofwork" 
                                            id="placeofwork_local" 
                                            value="Local" 
                                            <?php echo e(old('placeofwork') == 'Local' ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="placeofwork_local">Local</label>
                                    </div>
                                </div>
                                <div class="col-auto mx-3">
                                    <div class="form-check">
                                        <input class="form-check-input <?php $__errorArgs = ['placeofwork'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            type="radio" 
                                            name="placeofwork" 
                                            id="placeofwork_abroad" 
                                            value="Abroad" 
                                            <?php echo e(old('placeofwork') == 'Abroad' ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="placeofwork_abroad">Abroad</label>
                                    </div>
                                </div>
                            </div>

                            <?php $__errorArgs = ['placeofwork'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Type of Employment</label>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['typeofemployment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="radio"
                                        name="typeofemployment"
                                        value="Full-time"
                                        id="employment_full_time"
                                        <?php echo e(old('typeofemployment') == 'Full-time' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="employment_full_time">Full-time</label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input <?php $__errorArgs = ['typeofemployment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="radio"
                                        name="typeofemployment"
                                        value="Part-time"
                                        id="employment_part_time"
                                        <?php echo e(old('typeofemployment') == 'Part-time' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="employment_part_time">Part-time</label>
                                </div>
                            </div>
                            <?php $__errorArgs = ['typeofemployment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="extentofemployment">Extent of Employment</label>
                        </div>
                        <div class="col-md-6">
                            <select name="extentofemployment"
                                    id="extentofemployment"
                                    class="form-select <?php $__errorArgs = ['extentofemployment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option disabled <?php echo e(old('extentofemployment') ? '' : 'selected'); ?>>Select option...</option>
                                <option value="Permanent" <?php echo e(old('extentofemployment') == 'Permanent' ? 'selected' : ''); ?>>Permanent</option>
                                <option value="Contractual / Temporary" <?php echo e(old('extentofemployment') == 'Contractual / Temporary' ? 'selected' : ''); ?>>Contractual / Temporary</option>
                                <option value="Project-based" <?php echo e(old('extentofemployment') == 'Project-based' ? 'selected' : ''); ?>>Project-based</option>
                                <option value="Other" <?php echo e(old('extentofemployment') == 'Other' ? 'selected' : ''); ?>>Other...</option>
                            </select>
                            <?php $__errorArgs = ['extentofemployment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="datehired">
                                Date Hired in Current Job or Date Your Business Was Established
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="date"
                                name="datehired"
                                id="datehired"
                                class="form-control <?php $__errorArgs = ['datehired'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('datehired')); ?>">
                            <?php $__errorArgs = ['datehired'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="averagemonthly">
                                Average Monthly Salary or Income (in Philippine Pesos)
                            </label>
                        </div>
                        <div class="col-md-4">
                            <select name="averagemonthly" id="averagemonthly"
                                    class="form-select <?php $__errorArgs = ['averagemonthly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option disabled <?php echo e(old('averagemonthly') ? '' : 'selected'); ?>>Select option...</option>
                                <option value="Less than 15,000" <?php echo e(old('averagemonthly') == 'Less than 15,000' ? 'selected' : ''); ?>>Less than 15,000</option>
                                <option value="15,000 - 24,999" <?php echo e(old('averagemonthly') == '15,000 - 24,999' ? 'selected' : ''); ?>>15,000 - 24,999</option>
                                <option value="25,000 - 34,999" <?php echo e(old('averagemonthly') == '25,000 - 34,999' ? 'selected' : ''); ?>>25,000 - 34,999</option>
                                <option value="35,000 - 44,999" <?php echo e(old('averagemonthly') == '35,000 - 44,999' ? 'selected' : ''); ?>>35,000 - 44,999</option>
                                <option value="45,000 - 54,999" <?php echo e(old('averagemonthly') == '45,000 - 54,999' ? 'selected' : ''); ?>>45,000 - 54,999</option>
                                <option value="55,000 - 64,999" <?php echo e(old('averagemonthly') == '55,000 - 64,999' ? 'selected' : ''); ?>>55,000 - 64,999</option>
                                <option value="65,000 - 74,999" <?php echo e(old('averagemonthly') == '65,000 - 74,999' ? 'selected' : ''); ?>>65,000 - 74,999</option>
                                <option value="75,000 - 84,999" <?php echo e(old('averagemonthly') == '75,000 - 84,999' ? 'selected' : ''); ?>>75,000 - 84,999</option>
                                <option value="85,000 - 94,999" <?php echo e(old('averagemonthly') == '85,000 - 94,999' ? 'selected' : ''); ?>>85,000 - 94,999</option>
                                <option value="Above 95,000" <?php echo e(old('averagemonthly') == 'Above 95,000' ? 'selected' : ''); ?>>Above 95,000</option>
                                <option value="Rather not Disclose" <?php echo e(old('averagemonthly') == 'Rather not Disclose' ? 'selected' : ''); ?>>Rather not Disclose</option>
                            </select>
                            <?php $__errorArgs = ['averagemonthly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- Employment BACKGROUND -->
                        <p class="lead mt-5">Misc</p>
                        <hr class="my-2">
                    <!-- END -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Would you like to be invited as a resource speaker in one of our events?</label>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="form-check">
                                <input class="form-check-input <?php $__errorArgs = ['resourcespeaker'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="radio" name="resourcespeaker" value="yes"
                                    id="resourcespeaker_yes" <?php echo e(old('resourcespeaker') == 'yes' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="resourcespeaker_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input <?php $__errorArgs = ['resourcespeaker'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="radio" name="resourcespeaker" value="no"
                                    id="resourcespeaker_no" <?php echo e(old('resourcespeaker', 'no') == 'no' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="resourcespeaker_no">
                                    No
                                </label>
                            </div>
                        </div>
                        <?php $__errorArgs = ['resourcespeaker'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="col-md-6 offset-md-6">
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="fieldofexpertise">Field of Expertise</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="fieldofexpertise" id="fieldofexpertise" placeholder="Your answer" class="form-control <?php $__errorArgs = ['fieldofexpertise'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['fieldofexpertise'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Present Employment Status</label>
                        </div>
                        <div class="col-md-6 d-flex flex-wrap align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input <?php $__errorArgs = ['employmentstatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="employmentstatus" value="Employed" id="employment_employed">
                                <label class="form-check-label" for="employment_employed">Employed</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input <?php $__errorArgs = ['employmentstatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="employmentstatus" value="Self-Employed" id="employment_self">
                                <label class="form-check-label" for="employment_self">Self-employed</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?php $__errorArgs = ['employmentstatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="employmentstatus" value="Unemployed" id="employment_unemployed">
                                <label class="form-check-label" for="employment_unemployed">Unemployed</label>
                            </div>

                            <?php $__errorArgs = ['employmentstatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block w-100">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center p-3">
                    <div class="row">
                        <div class="col-md-3 col-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- Uncomment if you want the reset button -->
                        <!-- 
                        <div class="col-md-3 col-5">
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div> 
                        -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/page/agree.blade.php ENDPATH**/ ?>