<!--FOOTER-->
<footer>
    <div id="lgx-footer" class="lgx-footer-black"> <!--lgx-footer-white-->
        <div class="lgx-inner-footer">
            <div class="container">
                <div class="lgx-footer-area">
                    <div class="lgx-footer-single footer-brand  wow fadeInUp mt-5 owl-rtl owl-loaded owl-drag" data-wow-duration="1.5s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <img class="footer-brand-logo" src="/storage/{{ setting('site.logo') }}" alt="{{ (setting('site.site_name') ? setting('site.site_name') : config('app.name')) }}"/>
                        <p class="footer-brand-name">{{ (setting('site.site_name') ? setting('site.site_name') : config('app.name')) }}</p>
                        <p class="footer-brand-slogan">{{ setting('site.site_slogan') }}</p>
                    </div> <!--//footer-area-->
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">@lang('eventmie-pro::em.useful_links')</h3>
                        <ul class="list-unstyled">
                            <li><a class="col-grey" href="{{ route('eventmie.page', ['page' => 'about']) }}">@lang('eventmie-pro::em.about')</a></li>
                            <li><a class="col-grey" href="{{ eventmie_url('events') }}">@lang('eventmie-pro::em.events')</a></li>
                            <li><a class="col-grey" href="{{ route('eventmie.get_posts') }}">@lang('eventmie-pro::em.blogs')</a></li>
                            <li><a class="col-grey" href="{{ route('eventmie.page', ['page' => 'terms']) }}">@lang('eventmie-pro::em.terms')</a></li>
                            <li><a class="col-grey" href="{{ route('eventmie.page', ['page' => 'privacy']) }}">@lang('eventmie-pro::em.privacy')</a></li>
                            
                            
                        </ul>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">@lang('eventmie-pro::em.contact')</h3>
                        <a href="{{ route('eventmie.contact') }}">
                            <h4 class="date">@lang('eventmie-pro::em.contact_send_message')</h4>
                        </a>
                        <address>{{ setting('contact.address') }}</address>
                        <a href="{{ route('eventmie.contact') }}" class="map-link">
                            <i class="fas fa-map-marked-alt" aria-hidden="true"></i> 
                            @lang('eventmie-pro::em.contact_find_us')
                        </a>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">@lang('eventmie-pro::em.social')</h3>
                        <p class="text">@lang('eventmie-pro::em.social_find')</p>
                        <ul class="list-inline lgx-social-footer">
                            <li><a href="{{ 'https://www.snapchat.com/add/'.setting('social.facebook') }}" target="_blank"><i class="fab fa-snapchat" aria-hidden="true"></i></a></li>
                            <li><a href="{{ 'https://twitter.com/'.setting('social.twitter') }}" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="{{ setting('social.instagram') }}" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="{{ setting('social.linkedin') }}" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                  
                </div>
                
                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p> 
                            <span>©</span> {{ date('Y') }} 
                            <a href="{{ eventmie_url() }}">{{ (setting('site.site_name') ? setting('site.site_name') : config('app.name')) }}</a><br>

                            @if(!empty(setting('site.site_footer'))) 
                            {!! setting('site.site_footer') !!}
                            @endif
                        </p>
                    </div>
                </div>

            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>
<!--FOOTER END-->