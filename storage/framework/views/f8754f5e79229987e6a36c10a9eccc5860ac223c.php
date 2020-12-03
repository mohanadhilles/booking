<?php $__env->startSection('title'); ?>
    <?php if(empty($event)): ?> 
        <?php echo app('translator')->get('eventmie-pro::em.create_event'); ?>
    <?php else: ?>
        <?php echo app('translator')->get('eventmie-pro::em.update_event'); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

    
<?php $__env->startSection('content'); ?>

<main>
    <!--SCHEDULE-->
    <div class="lgx-post-wrapper">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-tab">
                            <tabs-component :event_id="<?php echo e(!empty($event) ? $event->id : 0); ?>"  :organiser_id="<?php echo e($organiser_id); ?>"></tabs-component>
                            
                            <div class="tab-content lgx-tab-content lgx-tab-content-event">
                                <router-view 
                                    :is_admin="<?php echo e(json_encode(Auth::user()->hasRole('admin'))); ?>"
                                    :organisers="<?php echo e(json_encode($organisers, JSON_HEX_APOS)); ?>" 
                                    :organiser_id="<?php echo e($organiser_id); ?>"
                                    :event_ck="<?php echo e(json_encode($event, JSON_HEX_APOS)); ?>"
                                    :selected_organiser="<?php echo e(json_encode($selected_organiser, JSON_HEX_APOS)); ?>" 
                                    
                                >
                                    
                                </router-view>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--SCHEDULE END-->
</main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>    
    var is_event_id    = <?php echo (!empty($event) ? $event->id : 0); ?>;
</script>
<script type="text/javascript" src="<?php echo e(eventmie_asset('js/events_manage_v1.5.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('eventmie::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/events/form.blade.php ENDPATH**/ ?>