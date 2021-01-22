<header>
    <div id="eventmie_auth_app" class="lgx-header">
        <div id="navbar_vue" class="lgx-header-position lgx-header-position-white lgx-header-position-fixed">
            <div class="lgx-container-fluid" >
                <!-- GDPR -->
                <cookie-law theme="gdpr" button-text="@lang('eventmie-pro::em.accept')">
                    <div slot="message">
                        <gdpr-message></gdpr-message>
                    </div>
                </cookie-law>
                <!-- GDPR -->

                <!-- Vue Alert message -->
                @if ($errors->any())
                    <alert-message :errors="{{ json_encode($errors->all(), JSON_HEX_APOS) }}"></alert-message>    
                @endif

                @if (session('status'))
                    <alert-message :message="'{{ session('status') }}'"></alert-message>    
                @endif
                <!-- Vue Alert message -->

                <nav class="navbar navbar-default lgx-navbar navbar-expand-lg">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" @click="mobileMenu()">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="lgx-logo">
                            <a href="{{ eventmie_url() }}" class="lgx-scroll">
                                <img src="/storage/{{ setting('site.logo') }}" alt="{{ setting('site.site_name') }}"/>
                                <span class="brand-name">{{ setting('site.site_name') }}</span>
                                <span class="brand-slogan">{{ setting('site.site_slogan') }}</span>
                            </a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        
                        <div class="lgx-nav-right navbar-right">
                            <div class="lgx-cart-area">
                                <a class="lgx-btn lgx-btn-red" href="{{ eventmie_url('events') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.browse_events')</a>
                            </div>
                        </div>
                        <ul class="nav navbar-nav lgx-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                            <li>
                                <a class="lgx-scroll" href="{{ route('eventmie.login') }}"><i class="fas fa-fingerprint"></i> @lang('eventmie-pro::em.login')</a>
                            </li>
                            @else

                                @if(!\Auth::user()->hasRole('admin'))
                                <li>
                                    @php
                                        $data  = notifications();
                                    @endphp

                                    <a id="navbarDropdown" class="dropdown-toggle active" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-bell"> </i> 
                                        
                                        <span class="badge bg-red">{{$data['total_notify']}}</span> 
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(!empty($data['notifications']))      
                                            @foreach ($data['notifications'] as $notification) 
                                            <li>
                                                <a class="dropdown-item" href="{{route('eventmie.notify_read', [$notification->n_type])}}"> 
                                                    {{ $notification->total    }}
                                                    {{ $notification->n_type    }}
                                                </a>
                                            </li>
                                            @endforeach
                                        @else
                                        <li>
                                            <a class="dropdown-item" > @lang('eventmie-pro::em.no_notifications')</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                            
                            <li>
                                <a id="navbarDropdown" class="dropdown-toggle active" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->hasRole('customer'))
                                    <i class="fas fa-user-circle"></i> 
                                    @elseif(Auth::user()->hasRole('organiser'))
                                    <i class="fas fa-person-booth"></i> 
                                    @else
                                    <i class="fas fa-user-shield"></i> 
                                    @endif

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-level">

                                    {{-- for customers --}}
                                    @if(Auth::user()->hasRole('customer'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i> @lang('eventmie-pro::em.profile')</a>
                                    </li>
                                    
                                    @if(setting('multi-vendor.multi_vendor'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-person-booth"></i> @lang('eventmie-pro::em.become_organiser')</a>
                                    </li>
                                    @endif    

                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.mybookings_index') }}"><i class="fas fa-money-check-alt"></i> @lang('eventmie-pro::em.mybookings')</a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->hasRole('organiser'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i> @lang('eventmie-pro::em.profile')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.myevents_index') }}"><i class="fas fa-calendar-alt"></i> @lang('eventmie-pro::em.manage_events')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.obookings_index') }}"><i class="fas fa-money-check-alt"></i> @lang('eventmie-pro::em.manage_bookings')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.event_earning_index') }}"><i class="fas fa-wallet"></i> @lang('eventmie-pro::em.manage_earning')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.tags_form') }}"><i class="fas fa-user-tag"></i> @lang('eventmie-pro::em.manage_tags')</a>
                                    </li>
                                    
                                    @endif

                                    @if(Auth::user()->hasRole('admin'))
                                    <li>
                                        <a class="dropdown-item" href="{{ eventmie_url().'/'.config('eventmie.route.admin_prefix') }}">
                                        <i class="fas fa-tachometer-alt"></i>  @lang('eventmie-pro::em.admin_panel')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i> @lang('eventmie-pro::em.profile')</a>
                                    </li>
                                    @endif

                                    <li>
                                        <a class="dropdown-item" href="{{ route('eventmie.logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> @lang('eventmie-pro::em.logout')
                                        </a>
                                        <form id="logout-form" action="{{ route('eventmie.logout') }}" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>

                                </ul>
                            </li>

                                {{-- If user is admin then show admin panel link --}}
                                @if(Auth::user()->hasRole('admin'))
                                <li>
                                    <a class="lgx-scroll" href="{{ route('eventmie.ticket_scan') }}">
                                    <i class="fas fa-qrcode"></i> @lang('eventmie-pro::em.scan_ticket')</a>
                                </li>
                                <li>
                                    <a class="lgx-scroll" href="{{ route('eventmie.myevents_form') }}">
                                    <i class="fas fa-calendar-plus"></i> @lang('eventmie-pro::em.create_event')</a>
                                </li>
                                
                                @endif

                                {{-- If user is organiser then show create event link (only if multi-vendor is on) --}}
                                @if(Auth::user()->hasRole('organiser') && setting('multi-vendor.multi_vendor'))
                                <li>
                                    <a class="lgx-scroll" href="{{ route('eventmie.ticket_scan') }}">
                                    <i class="fas fa-qrcode"></i> @lang('eventmie-pro::em.scan_ticket')</a>
                                </li>
                                <li>
                                    <a class="lgx-scroll" href="{{ route('eventmie.myevents_form') }}">
                                    <i class="fas fa-calendar-plus"></i> @lang('eventmie-pro::em.create_event')</a>
                                </li>
                                @endif
                                
                                {{-- If user is customer then show my bookings link --}}
                                @if(Auth::user()->hasRole('customer'))
                                <li>
                                    <a class="lgx-scroll" href="{{ route('eventmie.mybookings_index') }}">
                                    <i class="fas fa-money-check-alt"></i> @lang('eventmie-pro::em.mybookings')</a>
                                </li>
                                @endif

                            @endguest
                              <li>
                                <a class="lgx-scroll" href="{{ route('eventmie.page', ['page' => 'about']) }}">@lang('eventmie-pro::em.about')</a>
                            </li>
                            <li>
                                <a class="lgx-scroll" href="{{ route('eventmie.page', ['page' => 'terms']) }}">@lang('eventmie-pro::em.terms')</a>

                            </li>
                            <li>
                                <a class="lgx-scroll" href="{{ route('eventmie.page', ['page' => 'privacy']) }}">@lang('eventmie-pro::em.privacy')</a>
                            </li>
                        
                            <li>
                                <a class="lgx-scroll" href="{{ env('APP_URL').'/events'}}">@lang('eventmie-pro::em.prodcuts')</a>
                            </li>
                            <li>
                                <a class="lgx-scroll" href="https://dabliu.typeform.com/to/zWz4sfQN" target="__blank">@lang('eventmie-pro::em.vendors')</a>
                            </li>
                            <li>
                                <a class="lgx-scroll" href="{{ route('eventmie.contact') }}">@lang('eventmie-pro::em.contact_us')</a>
                            </li>

                            <li>
                                @if (config('app.locale') == 'en')
                                <a class="dropdown-item {{ config('app.locale') ? 'active' : '' }}" href="{{ route('eventmie.change_lang', ['lang' => 'ar']) }}">@lang('eventmie-pro::em.lang_ar')</a>

                                @else
                                <a class="dropdown-item {{ config('app.locale') ? 'active' : '' }}" href="{{ route('eventmie.change_lang', ['lang' => 'en']) }}">@lang('eventmie-pro::em.lang_en')</a>
                                @endif
                              </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</header>