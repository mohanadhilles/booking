<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($mail_data->mail_subject); ?>


<?php echo e($mail_data->mail_message); ?>


<?php $__currentLoopData = $extra_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
- <?php echo e($val); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->startComponent('mail::button', ['url' => $mail_data->action_url]); ?>
<?php echo e($mail_data->action_title); ?>

<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php echo e(__('eventmie-pro::em.thank_you')); ?><br>
<?php echo e((setting('site.site_name') ? setting('site.site_name') : config('app.name'))); ?> - [<?php echo e(trim(eventmie_url(), '/')); ?>](<?php echo e(eventmie_url()); ?>)
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/mail/common.blade.php ENDPATH**/ ?>