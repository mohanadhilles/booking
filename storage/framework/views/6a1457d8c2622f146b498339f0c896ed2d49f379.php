<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('eventmie-pro::em.home'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Banner slider start-->
<section>
    <div class="lgx-slider welcome-slider">
        <div class="lgx-banner-style">
            <div class="lgx-inner">
                <div id="lgx-main-slider" class="owl-carousel lgx-slider-navbottom">
                    <!--Vue slider-->
                    <?php if(auth()->guard()->guest()): ?>
                    <banner-slider 
                        :banners="<?php echo e(json_encode($banners, JSON_HEX_APOS)); ?>" 
                        :is_logged="<?php echo e(0); ?>" 
                        :is_customer="<?php echo e(0); ?>"
                        :is_organiser="<?php echo e(0); ?>"
                        :is_admin="<?php echo e(0); ?>"
                        :is_multi_vendor="<?php echo e(setting('multi-vendor.multi_vendor') ? 1 : 0); ?>"
                        :demo_mode="<?php echo e(config('voyager.demo_mode')); ?>"
                        :check_session="<?php echo e(json_encode(session('verify'), JSON_HEX_TAG)); ?>"
                        :s_host="<?php echo e(json_encode($_SERVER['REMOTE_ADDR'], JSON_HEX_TAG)); ?>"
                    ></banner-slider>
                    <?php else: ?>
                    <banner-slider 
                        :banners="<?php echo e(json_encode($banners, JSON_HEX_APOS)); ?>" 
                        :is_logged="<?php echo e(1); ?>" 
                        :is_customer="<?php echo e(Auth::user()->hasRole('customer') ? 1 : 0); ?>"
                        :is_organiser="<?php echo e(Auth::user()->hasRole('organiser') ? 1 : 0); ?>"
                        :is_admin="<?php echo e(Auth::user()->hasRole('admin') ? 1 : 0); ?>"
                        :is_multi_vendor="<?php echo e(setting('multi-vendor.multi_vendor') ? 1 : 0); ?>"
                        :demo_mode="<?php echo e(config('voyager.demo_mode')); ?>"
                        :check_session="<?php echo e(json_encode(session('verify'), JSON_HEX_TAG)); ?>"
                        :s_host="<?php echo e(json_encode($_SERVER['REMOTE_ADDR'], JSON_HEX_TAG)); ?>"
                    ></banner-slider>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner slider end-->

<!--Event Search start-->
<section class="main-search-container">
    <div >
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-search">
                            <form class="form-inline" type="GET" action="<?php echo e(route('eventmie.events_index')); ?>">
                                <div class="form-group input-group event-search">
                                    <span class="input-group-addon"><i class="fas fa-calendar-day"></i></span>
                                    <input type="text" class="form-control" name="search" placeholder="<?php echo app('translator')->get('eventmie-pro::em.search_event_by'); ?>">
                                </div>
                                <button type="submit" class="lgx-btn lgx-btn-black"><i class="fas fa-search"></i> <?php echo app('translator')->get('eventmie-pro::em.search_event'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Event Search end-->





<!--Event Featured Start-->
<?php if(!empty($featured_events)): ?>
<section>
    <div >
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-star"></i> <?php echo app('translator')->get('eventmie-pro::em.featured_events'); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10">
                        <event-listing :events="<?php echo e(json_encode($featured_events, JSON_HEX_APOS)); ?>"
                                        :currency="<?php echo e(json_encode($currency, JSON_HEX_APOS)); ?>"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="<?php echo e(eventmie_url('events')); ?>"><i class="fas fa-calendar-day"></i> <?php echo app('translator')->get('eventmie-pro::em.view_all_events'); ?></a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<?php endif; ?>
<!--Event Featured END-->

<!--Event Top-selling Start-->
<?php if(!empty($top_selling_events)): ?>
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner" style="background-image: url(<?php echo e(eventmie_asset('img/bg-pattern.png')); ?>);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading"><i class="fas fa-bolt"></i> <?php echo app('translator')->get('eventmie-pro::em.top_selling_events'); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10">
                        <event-listing :events="<?php echo e(json_encode($top_selling_events, JSON_HEX_APOS)); ?>"
                            :currency="<?php echo e(json_encode($currency, JSON_HEX_APOS)); ?>"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="<?php echo e(eventmie_url('events')); ?>"><i class="fas fa-calendar-day"></i> <?php echo app('translator')->get('eventmie-pro::em.view_all_events'); ?></a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<?php endif; ?>
<!--Event Top-selling END-->

<!--Event Upcoming Start-->
<?php if(!empty($upcomming_events)): ?>
<section>
    <div>
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-hourglass-half"></i> <?php echo app('translator')->get('eventmie-pro::em.upcoming_events'); ?></h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10">
                        <event-listing :events="<?php echo e(json_encode($upcomming_events, JSON_HEX_APOS)); ?>" 
                            :currency="<?php echo e(json_encode($currency, JSON_HEX_APOS)); ?>"    
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="<?php echo e(eventmie_url('events')); ?>"><i class="fas fa-calendar-day"></i> <?php echo app('translator')->get('eventmie-pro::em.view_all_events'); ?></a>
                </div>
                
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<?php endif; ?>
<!--Event Upcoming END-->


<!--Categories-->
<?php if(!empty($categories)): ?>
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner" style="background-image: url(<?php echo e(eventmie_asset('img/bg-pattern.png')); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading"><?php echo app('translator')->get('eventmie-pro::em.event_categories'); ?></h2>
                        </div>
                    </div>
                </div>
                <!--//main row-->
                <div class="row">
                    <div class="col-12">
                        <div class="sponsors-area sponsors-area-colorfull-border">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single">
                                <a href="<?php echo e(route('eventmie.events_index', ['category' => urlencode($item['name'])])); ?>">
                                    <img src="/storage/<?php echo e($item['thumb']); ?>" alt="<?php echo e($item['slug']); ?>"/>
                                    <span class="single-name"><?php echo e($item['name']); ?></span>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->
        </div>
    </div>
</section>
<?php endif; ?>   
<!--Categories END-->

<!--cities_events-->
<?php if(!empty($cities_events)): ?>
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-light">
        <div class="lgx-inner" style="background-image: url(<?php echo e(eventmie_asset('img/bg-pattern.png')); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><?php echo app('translator')->get('eventmie-pro::em.cities_events'); ?></h2>
                        </div>
                    </div>
                </div>
                <!--//main row-->
                <div class="row">
                    <div class="col-12">
                        <div class="sponsors-area sponsors-area-colorfull cities">
                            <?php $__currentLoopData = $cities_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single">
                                <a href="<?php echo e(route('eventmie.events_index', ['search' => urlencode($item->city)])); ?>">
                                    <img src="/storage/<?php echo e($item->poster); ?>" alt="<?php echo e($item->city); ?>"/>
                                    <span class="single-name"><?php echo e($item->city); ?></span>
                                    <span class="single-name-sub"><?php echo app('translator')->get('eventmie-pro::em.total_events'); ?> <?php echo e($item->cities); ?></span>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->
        </div>
    </div>
</section>
<?php endif; ?>   
<!--cities_events END-->

    
<!--Blogs-->
<?php if(!empty($posts)): ?>
<section>
    <div>
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-blog"></i> <?php echo app('translator')->get('eventmie-pro::em.blogs'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="<?php echo e(route('eventmie.post_view', $item['slug'])); ?>">
                                    <img src="/storage/<?php echo e($item['image']); ?>" alt="">
                                </a>
                            </figure>
                            <div class="single-news-info">
                                <div class="meta-wrapper hidden">
                                    <span><?php echo e(\Carbon\Carbon::parse($item['updated_at'])->translatedFormat('M j, Y')); ?></span>
                                </div>
                                <h3 class="title"><a href="<?php echo e(route('eventmie.post_view', $item['slug'])); ?>"><?php echo e($item['title']); ?></a></h3>
                                <div class="meta-wrapper">
                                    <span><?php echo e($item['excerpt']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="section-btn-area">
                    <a class="lgx-btn" href="<?php echo e(route('eventmie.get_posts')); ?>"><i class="fas fa-blog"></i> <?php echo app('translator')->get('eventmie-pro::em.view_all_blogs'); ?></a>
                </div>
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<?php endif; ?>    
<!--Blogs END-->

<!--Organiser section-->
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner" style="background-image: url(<?php echo e(eventmie_asset('img/bg-pattern.png')); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h3 class="subheading"><?php echo app('translator')->get('eventmie-pro::em.how_it_works'); ?></h3>
                            <h2 class="heading"><i class="fas fa-person-booth"></i> <?php echo app('translator')->get('eventmie-pro::em.for_event_organisers'); ?></h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content lgx-content-white">
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-plus fa-4x"></i>
                                <h3 class="title">1. <?php echo app('translator')->get('eventmie-pro::em.organiser_1'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.organiser_1_info'); ?></p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-check fa-4x"></i>
                                <h3 class="title">2. <?php echo app('translator')->get('eventmie-pro::em.organiser_2'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.organiser_2_info'); ?></p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-money-check-alt fa-4x"></i>
                                <h3 class="title">3. <?php echo app('translator')->get('eventmie-pro::em.organiser_3'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.organiser_3_info'); ?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section>
<!--TRAVEL INFO END-->

<!--TRAVEL INFO-->
<section>
    <div id="lgx-travelinfo" class="lgx-travelinfo">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h3 class="subheading"><?php echo app('translator')->get('eventmie-pro::em.how_it_works'); ?></h3>
                            <h2 class="heading"><?php echo app('translator')->get('eventmie-pro::em.for_customers'); ?></h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content">
                             <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-alt fa-4x"></i>
                                <h3 class="title">1. <?php echo app('translator')->get('eventmie-pro::em.customer_1'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.customer_1_info'); ?></p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-ticket-alt fa-4x"></i>
                                <h3 class="title">2. <?php echo app('translator')->get('eventmie-pro::em.customer_2'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.customer_2_info'); ?></p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-walking fa-4x"></i>
                                <h3 class="title">3. <?php echo app('translator')->get('eventmie-pro::em.customer_3'); ?></h3>
                                <p class="info"><?php echo app('translator')->get('eventmie-pro::em.customer_3_info'); ?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section>
<!--TRAVEL INFO END-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
    var google_map_key = <?php echo json_encode(setting('apps.google_map_key')); ?>;
</script>
<script type="text/javascript" src="<?php echo e(eventmie_asset('js/welcome_v1.5.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('eventmie::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/welcome.blade.php ENDPATH**/ ?>