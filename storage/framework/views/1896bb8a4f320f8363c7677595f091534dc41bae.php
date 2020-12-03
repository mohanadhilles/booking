 <!--Page breadcrumb-->
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner-breadcrumb" style="background-image: url(<?php echo e(eventmie_asset('img/bg-pattern.png')); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <div class="breadcrumb-heading-area">
                                <h2 class="breadcrumb-heading"><?php echo $__env->yieldContent('title'); ?></h2>
                            </div>

                            <ol class="breadcrumb">
                                <li>
                                    <a href="<?php echo e(route('eventmie.welcome')); ?>"><i class="fas fa-home"></i></a>
                                </li>

                                <?php 
                                    $i_count = 1;
                                    if(config('eventmie.route.prefix')) 
                                    {
                                        $i_count = 2;
                                        $prefix_count = count(explode('/', config('eventmie.route.prefix')));
                                        if($prefix_count > 1)
                                            $i_count = $prefix_count+1;
                                    }
                                ?>
                                
                                <?php for($i = $i_count; $i <= count(Request::segments()); $i++): ?>
                                    <?php if($i != count(Request::segments()) ): ?>
                                        <li>
                                            <a href="<?php echo e(URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))); ?>">
                                                
                                                <?php if(\Lang::has('eventmie-pro::em.'.strtolower(Request::segment($i)))): ?> 
                                                    <?php echo app('translator')->get('eventmie-pro::em.'.strtolower(Request::segment($i))); ?>
                                                <?php else: ?> 
                                                    <?php echo e(strtoupper(Request::segment($i))); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="active">
                                            
                                            <?php if(\Lang::has('eventmie-pro::em.'.strtolower(Request::segment($i)))): ?> 
                                                <?php echo app('translator')->get('eventmie-pro::em.'.strtolower(Request::segment($i))); ?>
                                            <?php else: ?> 
                                                <?php echo e(strtoupper(Request::segment($i))); ?>

                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>    
                                <?php endfor; ?>
                            </ol>
                        </div>
                    </div>
                </div><!--//.ROW-->
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section> <!--//.Banner Inner--><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/layouts/breadcrumb.blade.php ENDPATH**/ ?>