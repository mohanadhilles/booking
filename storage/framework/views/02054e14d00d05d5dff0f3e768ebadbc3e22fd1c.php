<!--FOOTER-->
<footer>
    <div id="lgx-footer" class="lgx-footer-black"> <!--lgx-footer-white-->
        <div class="lgx-inner-footer">
            <div class="container">
                <div class="lgx-footer-area">
                    <div class="lgx-footer-single footer-brand">
                        <img class="footer-brand-logo" src="/storage/<?php echo e(setting('site.logo')); ?>" alt="<?php echo e((setting('site.site_name') ? setting('site.site_name') : config('app.name'))); ?>"/>
                        <p class="footer-brand-name"><?php echo e((setting('site.site_name') ? setting('site.site_name') : config('app.name'))); ?></p>
                        <p class="footer-brand-slogan"><?php echo e(setting('site.site_slogan')); ?></p>
                    </div> <!--//footer-area-->
                    <div class="lgx-footer-single">
                        <h3 class="footer-title"><?php echo app('translator')->get('eventmie-pro::em.useful_links'); ?></h3>
                        <ul class="list-unstyled">
                            <li><a class="col-grey" href="<?php echo e(route('eventmie.page', ['page' => 'about'])); ?>"><?php echo app('translator')->get('eventmie-pro::em.about'); ?></a></li>
                            <li><a class="col-grey" href="<?php echo e(eventmie_url('events')); ?>"><?php echo app('translator')->get('eventmie-pro::em.events'); ?></a></li>
                            <li><a class="col-grey" href="<?php echo e(route('eventmie.get_posts')); ?>"><?php echo app('translator')->get('eventmie-pro::em.blogs'); ?></a></li>
                            <li><a class="col-grey" href="<?php echo e(route('eventmie.page', ['page' => 'terms'])); ?>"><?php echo app('translator')->get('eventmie-pro::em.terms'); ?></a></li>
                            <li><a class="col-grey" href="<?php echo e(route('eventmie.page', ['page' => 'privacy'])); ?>"><?php echo app('translator')->get('eventmie-pro::em.privacy'); ?></a></li>
                            
                            
                        </ul>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title"><?php echo app('translator')->get('eventmie-pro::em.contact'); ?></h3>
                        <a href="<?php echo e(route('eventmie.contact')); ?>">
                            <h4 class="date"><?php echo app('translator')->get('eventmie-pro::em.contact_send_message'); ?></h4>
                        </a>
                        <address><?php echo e(setting('contact.address')); ?></address>
                        <a href="<?php echo e(route('eventmie.contact')); ?>" class="map-link">
                            <i class="fas fa-map-marked-alt" aria-hidden="true"></i> 
                            <?php echo app('translator')->get('eventmie-pro::em.contact_find_us'); ?>
                        </a>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title"><?php echo app('translator')->get('eventmie-pro::em.social'); ?></h3>
                        <p class="text"><?php echo app('translator')->get('eventmie-pro::em.social_find'); ?></p>
                        <ul class="list-inline lgx-social-footer">
                            <li><a href="<?php echo e('https://www.facebook.com/'.setting('social.facebook')); ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo e('https://twitter.com/'.setting('social.twitter')); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo e(setting('social.instagram')); ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo e(setting('social.linkedin')); ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                  
                </div>
                
                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p> 
                            <span>©</span> <?php echo e(date('Y')); ?> 
                            <a href="<?php echo e(eventmie_url()); ?>"><?php echo e((setting('site.site_name') ? setting('site.site_name') : config('app.name'))); ?></a><br>

                            <?php if(!empty(setting('site.site_footer'))): ?> 
                            <?php echo setting('site.site_footer'); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div>

            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>
<!--FOOTER END--><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/layouts/footer.blade.php ENDPATH**/ ?>