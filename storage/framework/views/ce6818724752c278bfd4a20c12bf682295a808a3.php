<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('eventmie-pro::em.events'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main>
    <div class="lgx-page-wrapper">
        <router-view ></router-view>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script>    
    var path    = <?php echo json_encode($path, JSON_HEX_TAG); ?>;
</script>
<script type="text/javascript" src="<?php echo e(eventmie_asset('js/events_listing_v1.5.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('eventmie::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/events/index.blade.php ENDPATH**/ ?>