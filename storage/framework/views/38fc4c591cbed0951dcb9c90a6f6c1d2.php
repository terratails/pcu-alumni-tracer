<?php $__env->startSection('content'); ?>
<div class="container-fluid d-flex vh-100 p-0">
  <div class="login-section" style="margin-left: -5%;margin-right: -5%">
    <div class="branding" style="margin-left: 20%;margin-right: 20%">
      <div class="row d-flex justify-content-center">
        <div class="col-6 mt-2">
          <h1>
            <span class="d-flex justify-content-start">PCU MANILA</span>
            <span class="mt-2 d-flex justify-content-center">ALUMNI TRACER</span>
          </h1>
        </div>
        <div class="col-2">
          <img src="PCULogo.png" alt="PCU Logo" class="logo" />
        </div>
      </div>
    </div>

    <div class="form-box" style="margin-left: 20%;margin-right: 20%">
      <h2>Login to your account</h2>
      <p>Let's get started!</p>

      
      <?php if(session('status')): ?>
        <div style="color: green; margin-bottom: 10px;">
          <?php echo e(session('status')); ?>

        </div>
      <?php endif; ?>

      
      <?php if(session('error')): ?>
        <div style="color: red; margin-bottom: 10px;">
          <?php echo e(session('error')); ?>

        </div>
      <?php endif; ?>

      <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>

        <label>Email</label>
        <input type="email" name="email" placeholder="Your Email" id="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="invalid-feedback" role="alert" style="color: red;">
            <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label>Password</label>
        <div class="password-box">
          <input type="password" name="password" placeholder="Your Password" id="password" required autocomplete="current-password">
          <span class="eye">👁️</span>
        </div>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="invalid-feedback" role="alert" style="color: red;">
            <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button type="submit">Login</button>
      </form>

      <p class="signup-text">No Account? click here to <a href="<?php echo e(url('/terms&condition')); ?>">Signup</a></p>
    </div>
  </div>

      <div class="image-section" style="
        width: 60%;
        background-image: url('<?php echo e(asset('image/background.png')); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      ">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /volume1/web/htdocs/Alumni-Tracer/resources/views/welcome.blade.php ENDPATH**/ ?>