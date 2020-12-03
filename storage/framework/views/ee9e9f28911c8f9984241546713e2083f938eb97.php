<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('eventmie-pro::em.login'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('authcontent'); ?>


<h2 class="title"><?php echo app('translator')->get('eventmie-pro::em.login'); ?></h2>

<?php if(config('voyager.demo_mode')): ?>
<div class="alert alert-info">
    <a href="https://eventmie-pro-docs.classiebit.com/docs/1.4/demo-accounts" target="_blank">Visit here for Demo Accounts</a>    
</div>
<?php endif; ?>

<div class="lgx-registration-form">
    <form method="POST" action="<?php echo e(route('eventmie.login_post')); ?>">
        
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input id="email" type="email" class="wpcf7-form-control form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="<?php echo app('translator')->get('eventmie-pro::em.email'); ?>">
        <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>

        <input id="password" type="password" class="wpcf7-form-control form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="<?php echo app('translator')->get('eventmie-pro::em.password'); ?>">
        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
        
        <div class="form-check text-left">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" checked value="1">
            <label class="form-check-label" for="remember"><?php echo app('translator')->get('eventmie-pro::em.remember'); ?></label>
        </div>
        
        <button type="submit" class="lgx-btn lgx-btn-white btn-block"><i class="fas fa-sign-in-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.login'); ?></button>

        <div class="row">
            <div class="col-md-12">
                <div class="lgx-links">
                    <a class="btn btn-link pull-left" href="<?php echo e(route('eventmie.password.request')); ?>"><?php echo app('translator')->get('eventmie-pro::em.forgot_password'); ?></a>
                    <a class="btn btn-link pull-right" href="<?php echo e(route('eventmie.register_show')); ?>"><?php echo app('translator')->get('eventmie-pro::em.register'); ?></a>
                </div>
            </div>
        </div>
        
        <hr style="border-top: 2px solid #eee;">
        <div class="row">
            <div class="col-md-4 text-left">
                <h4 class="col-white"><?php echo app('translator')->get('eventmie-pro::em.continue_with'); ?></h4>
            </div>
            <div class="col-md-8 text-right">
                <a href="<?php echo e(route('eventmie.oauth_login', ['social' => 'facebook'])); ?>" class="lgx-btn lgx-btn-white lgx-btn-sm"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="<?php echo e(route('eventmie.oauth_login', ['social' => 'google'])); ?>" class="lgx-btn lgx-btn-white lgx-btn-sm"><i class="fab fa-google"></i> Google</a>
            </div>
        </div>
            
        
    </form>
</div>    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('eventmie::auth.authapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/auth/login.blade.php ENDPATH**/ ?>