<?php $__env->startSection('content'); ?>
<style>
  /* Mobile-specific layout override */
  @media (max-width: 768px) {
    .login-section {
      width: 100% !important;
      margin: 0 !important;
      padding: 20px !important;
    }

    .image-section {
      display: none !important;
    }
  }
    .password-box {
    position: relative;
  }

  .password-box input {
    width: 100%;
    padding-right: 40px; /* space for the eye icon */
    box-sizing: border-box;
  }

  .password-box .eye {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    user-select: none;
  }
</style>

<div class="container-fluid d-flex vh-100 p-0">
  <!-- Login Section -->
  <div class="login-section" style="width: 40%; margin-left: -5%; margin-right: -5%; background-color: #121f45; color: white;">
    <div class="branding" style="margin-left: 20%; margin-right: 20%">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-6 mt-2">
          <h1>
            <span class="d-flex justify-content-start">PCU MANILA</span>
            <span class="mt-2 d-flex justify-content-center">ALUMNI TRACER</span>
          </h1>
        </div>
        <div class="col-2">
          <img src="<?php echo e(asset('PCULogo.png')); ?>" alt="PCU Logo" class="logo" />
        </div>
      </div>
    </div>

    <div class="form-box" style="margin-left: 20%; margin-right: 20%">
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

        <div class="password-box position-relative">
          <input type="password" name="password" placeholder="Your Password" id="password" required autocomplete="current-password" style="width: 100%; padding-right: 30px;">
          <span class="eye" onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
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
        <p class="signup-text my-0">Forgot your password? Click here to <a href="<?php echo e(url('/forget-password')); ?>">Reset Password</a></p>
        <button type="submit">Login</button>
      </form>

      <p class="signup-text">No Account? click here to <a href="<?php echo e(url('/terms&condition')); ?>">Signup</a></p>
    </div>
  </div>

  <!-- Image Section (hidden on mobile) -->
  <div class="image-section" style="
    width: 60%;
    background-image: url('<?php echo e(asset('image/background.png')); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  ">
  </div>
<script>
  function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.querySelector(".eye");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.textContent = "🙈";
    } else {
      passwordInput.type = "password";
      eyeIcon.textContent = "👁️";
    }
  }
</script>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yhm5jv201rtg/repositories/alumni-tracer/resources/views/welcome.blade.php ENDPATH**/ ?>