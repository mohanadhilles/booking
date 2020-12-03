<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('eventmie-pro::em.scan_ticket'); ?>
<?php $__env->stopSection(); ?>

    
<?php $__env->startSection('content'); ?>

<main>
    <!--SCHEDULE-->
    <div class="lgx-post-wrapper">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-3 col-md-6">

                        <ticket-scan></ticket-scan>
                        
                        <form id="form" action="<?php echo e(route('eventmie.verify_ticket')); ?>"  method="POST" enctype="multipart/form-data" class="lgx-contactform">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="booking_id" id="booking_id">
                            <input type="hidden" name="order_number" id="order_number" >
                            
                            <button type="submit" id="check_in_button" class="btn lgx-btn btn-block lgx-btn-success" style="display: none;"><?php echo app('translator')->get('eventmie-pro::em.verify_n_checkin'); ?></button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--SCHEDULE END-->
</main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="<?php echo e(eventmie_asset('js/ticket_scan_v1.5.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('eventmie::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/ticket_scan/index.blade.php ENDPATH**/ ?>