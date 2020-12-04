<header>
    <div id="eventmie_auth_app" class="lgx-header">
        <div id="navbar_vue" class="lgx-header-position lgx-header-position-white lgx-header-position-fixed">
            <div class="lgx-container-fluid" >
                <!-- GDPR -->
                <cookie-law theme="gdpr" button-text="<?php echo app('translator')->get('eventmie-pro::em.accept'); ?>">
                    <div slot="message">
                        <gdpr-message></gdpr-message>
                    </div>
                </cookie-law>
                <!-- GDPR -->

                <!-- Vue Alert message -->
                <?php if($errors->any()): ?>
                    <alert-message :errors="<?php echo e(json_encode($errors->all(), JSON_HEX_APOS)); ?>"></alert-message>    
                <?php endif; ?>

                <?php if(session('status')): ?>
                    <alert-message :message="'<?php echo e(session('status')); ?>'"></alert-message>    
                <?php endif; ?>
                <!-- Vue Alert message -->

                <nav class="navbar navbar-default lgx-navbar navbar-expand-lg">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" @click="mobileMenu()">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="lgx-logo">
                            <a href="<?php echo e(eventmie_url()); ?>" class="lgx-scroll">
                                <img src="/storage/<?php echo e(setting('site.logo')); ?>" alt="<?php echo e(setting('site.site_name')); ?>"/>
                                <span class="brand-name"><?php echo e(setting('site.site_name')); ?></span>
                                <span class="brand-slogan"><?php echo e(setting('site.site_slogan')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        
                        <div class="lgx-nav-right navbar-right">
                            <div class="lgx-cart-area">
                                <a class="lgx-btn lgx-btn-red" href="<?php echo e(eventmie_url('events')); ?>"><i class="fas fa-calendar-day"></i> <?php echo app('translator')->get('eventmie-pro::em.browse_events'); ?></a>
                            </div>
                        </div>
                        <ul class="nav navbar-nav lgx-nav navbar-right">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                            <li>
                                <a class="lgx-scroll" href="<?php echo e(route('eventmie.login')); ?>"><i class="fas fa-fingerprint"></i> <?php echo app('translator')->get('eventmie-pro::em.login'); ?></a>
                            </li>
                            <?php else: ?>

                                <?php if(!\Auth::user()->hasRole('admin')): ?>
                                <li>
                                    <?php
                                        $data  = notifications();
                                    ?>

                                    <a id="navbarDropdown" class="dropdown-toggle active" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-bell"> </i> 
                                        
                                        <span class="badge bg-red"><?php echo e($data['total_notify']); ?></span> 
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if(!empty($data['notifications'])): ?>      
                                            <?php $__currentLoopData = $data['notifications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <li>
                                                <a class="dropdown-item" href="<?php echo e(route('eventmie.notify_read', [$notification->n_type])); ?>"> 
                                                    <?php echo e($notification->total); ?>

                                                    <?php echo e($notification->n_type); ?>

                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <li>
                                            <a class="dropdown-item" > <?php echo app('translator')->get('eventmie-pro::em.no_notifications'); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            
                            <li>
                                <a id="navbarDropdown" class="dropdown-toggle active" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php if(Auth::user()->hasRole('customer')): ?>
                                    <i class="fas fa-user-circle"></i> 
                                    <?php elseif(Auth::user()->hasRole('organiser')): ?>
                                    <i class="fas fa-person-booth"></i> 
                                    <?php else: ?>
                                    <i class="fas fa-user-shield"></i> 
                                    <?php endif; ?>

                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-level">

                                    
                                    <?php if(Auth::user()->hasRole('customer')): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.profile')); ?>"><i class="fas fa-id-card"></i> <?php echo app('translator')->get('eventmie-pro::em.profile'); ?></a>
                                    </li>
                                    
                                    <?php if(setting('multi-vendor.multi_vendor')): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.profile')); ?>"><i class="fas fa-person-booth"></i> <?php echo app('translator')->get('eventmie-pro::em.become_organiser'); ?></a>
                                    </li>
                                    <?php endif; ?>    

                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.mybookings_index')); ?>"><i class="fas fa-money-check-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.mybookings'); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Auth::user()->hasRole('organiser')): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.profile')); ?>"><i class="fas fa-id-card"></i> <?php echo app('translator')->get('eventmie-pro::em.profile'); ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.myevents_index')); ?>"><i class="fas fa-calendar-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.manage_events'); ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.obookings_index')); ?>"><i class="fas fa-money-check-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.manage_bookings'); ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.event_earning_index')); ?>"><i class="fas fa-wallet"></i> <?php echo app('translator')->get('eventmie-pro::em.manage_earning'); ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.tags_form')); ?>"><i class="fas fa-user-tag"></i> <?php echo app('translator')->get('eventmie-pro::em.manage_tags'); ?></a>
                                    </li>
                                    
                                    <?php endif; ?>

                                    <?php if(Auth::user()->hasRole('admin')): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(eventmie_url().'/'.config('eventmie.route.admin_prefix')); ?>">
                                        <i class="fas fa-tachometer-alt"></i>  <?php echo app('translator')->get('eventmie-pro::em.admin_panel'); ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.profile')); ?>"><i class="fas fa-id-card"></i> <?php echo app('translator')->get('eventmie-pro::em.profile'); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('eventmie.logout')); ?>"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.logout'); ?>
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('eventmie.logout')); ?>" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </form>
                                    </li>

                                </ul>
                            </li>

                                
                                <?php if(Auth::user()->hasRole('admin')): ?>
                                <li>
                                    <a class="lgx-scroll" href="<?php echo e(route('eventmie.ticket_scan')); ?>">
                                    <i class="fas fa-qrcode"></i> <?php echo app('translator')->get('eventmie-pro::em.scan_ticket'); ?></a>
                                </li>
                                <li>
                                    <a class="lgx-scroll" href="<?php echo e(route('eventmie.myevents_form')); ?>">
                                    <i class="fas fa-calendar-plus"></i> <?php echo app('translator')->get('eventmie-pro::em.create_event'); ?></a>
                                </li>
                                
                                <?php endif; ?>

                                
                                <?php if(Auth::user()->hasRole('organiser') && setting('multi-vendor.multi_vendor')): ?>
                                <li>
                                    <a class="lgx-scroll" href="<?php echo e(route('eventmie.ticket_scan')); ?>">
                                    <i class="fas fa-qrcode"></i> <?php echo app('translator')->get('eventmie-pro::em.scan_ticket'); ?></a>
                                </li>
                                <li>
                                    <a class="lgx-scroll" href="<?php echo e(route('eventmie.myevents_form')); ?>">
                                    <i class="fas fa-calendar-plus"></i> <?php echo app('translator')->get('eventmie-pro::em.create_event'); ?></a>
                                </li>
                                <?php endif; ?>
                                
                                
                                <?php if(Auth::user()->hasRole('customer')): ?>
                                <li>
                                    <a class="lgx-scroll" href="<?php echo e(route('eventmie.mybookings_index')); ?>">
                                    <i class="fas fa-money-check-alt"></i> <?php echo app('translator')->get('eventmie-pro::em.mybookings'); ?></a>
                                </li>
                                <?php endif; ?>

                            <?php endif; ?>

                            <li>
                                <?php if(config('app.locale') == 'en'): ?>
                                <a class="dropdown-item <?php echo e(config('app.locale') ? 'active' : ''); ?>" href="<?php echo e(route('eventmie.change_lang', ['lang' => 'ar'])); ?>"><?php echo app('translator')->get('eventmie-pro::em.lang_ar'); ?></a>
                                <i class="fas fa-globe"></i> 

                                <?php else: ?>
                                <a class="dropdown-item <?php echo e(config('app.locale') ? 'active' : ''); ?>" href="<?php echo e(route('eventmie.change_lang', ['lang' => 'en'])); ?>"><?php echo app('translator')->get('eventmie-pro::em.lang_en'); ?></a>
                                <i class="fas fa-globe"></i> 

                                <?php endif; ?>
                              </li>

                            

                        </ul>
                    </div><!--/.nav-collapse -->
                </nav>
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</header><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/layouts/header.blade.php ENDPATH**/ ?>