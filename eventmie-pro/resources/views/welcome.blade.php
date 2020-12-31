@extends('eventmie::layouts.app')

@section('title') @lang('eventmie-pro::em.home') @endsection

@section('content')

<!--Banner slider start-->
<section>
    <div class="lgx-slider welcome-slider">
        <div class="lgx-banner-style">
            <div class="lgx-inner">
                <div id="lgx-main-slider" class="owl-carousel lgx-slider-navbottom">
                    <!--Vue slider-->
                    @guest
                    <banner-slider
                        :banners="{{ json_encode($banners, JSON_HEX_APOS) }}"
                        :is_logged="{{ 0 }}"
                        :is_customer="{{ 0 }}"
                        :is_organiser="{{ 0 }}"
                        :is_admin="{{ 0 }}"
                        :is_multi_vendor="{{ setting('multi-vendor.multi_vendor') ? 1 : 0 }}"
                    ></banner-slider>
                    @else
                    <banner-slider
                        :banners="{{ json_encode($banners, JSON_HEX_APOS) }}"
                        :is_logged="{{ 1 }}"
                        :is_customer="{{ Auth::user()->hasRole('customer') ? 1 : 0 }}"
                        :is_organiser="{{ Auth::user()->hasRole('organiser') ? 1 : 0 }}"
                        :is_admin="{{ Auth::user()->hasRole('admin') ? 1 : 0 }}"
                        :is_multi_vendor="{{ setting('multi-vendor.multi_vendor') ? 1 : 0 }}"
                    ></banner-slider>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner slider end-->
<!--TRAVEL INFO-->
<section>
    <div id="lgx-travelinfo" class="lgx-travelinfo  wow fadeInUp mt-5 owl-rtl owl-loaded owl-drag" data-wow-duration="1.5s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.3s; animation-name: fadeInUp;">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h3 class="subheading">@lang('eventmie-pro::em.how_it_works')</h3>
                            <h2 class="heading">@lang('eventmie-pro::em.for_customers')</h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content">
                             <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-alt fa-4x"></i>
                                <h3 class="title">1. @lang('eventmie-pro::em.customer_1')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_1_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-ticket-alt fa-4x"></i>
                                <h3 class="title">2. @lang('eventmie-pro::em.customer_2')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_2_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-walking fa-4x"></i>
                                <h3 class="title">3. @lang('eventmie-pro::em.customer_3')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_3_info')</p>
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
<section class="main-search-container">
    <div >
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-star"></i>@lang('eventmie-pro::em.best_place')</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp mt-5 owl-rtl owl-loaded owl-drag" data-wow-duration="1.5s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/WnNfN1a6o34" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Event Search start-->
{{-- <section class="main-search-container">
    <div >
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-search">
                            <form class="form-inline" type="GET" action="{{route('eventmie.events_index')}}">
                                <div class="form-group input-group event-search">
                                    <span class="input-group-addon"><i class="fas fa-calendar-day"></i></span>
                                    <input type="text" class="form-control" name="search" placeholder="@lang('eventmie-pro::em.search_event_by')">
                                </div>
                                <button type="submit" class="lgx-btn lgx-btn-black"><i class="fas fa-search"></i> @lang('eventmie-pro::em.search_event')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--Event Search end-->
<section>
    <div>
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-plus"></i> @lang('eventmie-pro::em.activity')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10 section-m">
                        <section class="our-team-section">
                            <div class="team_slider owl-carousel wow fadeInUp mt-5" data-wow-duration="1.5s" data-wow-delay=".3s">
                                @foreach($activitis as $activity)
                                <div class="item">
                                    <div class="team-item">
                                        <div class="img">
                                            <img src="{{env('APP_URL/storage/') . $activity->image }}" class="img-fluid" alt="">
                                        </div>
                                        <h3>{{$activity->title}}</h3>
                                        <p>{{$activity->subtitle}}</p>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </section> 
                    </div>
                </div>
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>


<!--Event Featured Start-->
@if(!empty($featured_events))
<section>
    <div>
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-star"></i> @lang('eventmie-pro::em.featured_events')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10 section-m  wow fadeInUp mt-5 owl-rtl owl-loaded owl-drag" data-wow-duration="1.5s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <event-listing :events="{{ json_encode($featured_events, JSON_HEX_APOS) }}"
                                        :currency="{{ json_encode($currency, JSON_HEX_APOS) }}"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="{{ eventmie_url('events') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.view_all_events')</a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif
<!--Event Featured END-->

<!--Event Top-selling Start-->
{{-- @if(!empty($top_selling_events))
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner" style="background-image: url({{ eventmie_asset('img/bg-pattern.png') }});">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading"><i class="fas fa-bolt"></i> @lang('eventmie-pro::em.top_selling_events')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10 section-m">
                        <event-listing :events="{{ json_encode($top_selling_events, JSON_HEX_APOS) }}"
                            :currency="{{ json_encode($currency, JSON_HEX_APOS) }}"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="{{ eventmie_url('events') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.view_all_events')</a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif --}}
<!--Event Top-selling END-->

<!--Event Upcoming Start-->
{{-- @if(!empty($upcomming_events))
<section>
    <div>
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-hourglass-half"></i> @lang('eventmie-pro::em.upcoming_events')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10 section-m">
                        <event-listing :events="{{ json_encode($upcomming_events, JSON_HEX_APOS) }}"
                            :currency="{{ json_encode($currency, JSON_HEX_APOS) }}"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="{{ eventmie_url('events') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.view_all_events')</a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif --}}
<!--Event Upcoming END-->


<!--Categories-->
{{-- @if(!empty($categories))
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-light lgx-schedule lgx-schedule-categories">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading">@lang('eventmie-pro::em.event_categories')</h2>
                        </div>
                    </div>
                </div>
                <!--//main row-->
                <div class="row">
                    <div class="col-12">
                        <div class="sponsors-area sponsors-area-colorfull-border">
                            @foreach($categories as $key => $item)
                            <div class="single">
                                <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">
                                    <img src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}"/>
                                    <span class="single-name">{{ $item['name'] }}</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->
        </div>
    </div>
</section>
@endif    --}}
<!--Categories END-->

<!--cities_events-->
{{-- @if(!empty($cities_events))
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark lgx-schedule-cities_events">
        <div class="lgx-inner" style="background-image: url({{ eventmie_asset('img/bg-pattern.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading">@lang('eventmie-pro::em.cities_events')</h2>
                        </div>
                    </div>
                </div>
                <!--//main row-->
                <div class="row">
                    <div class="col-12">
                        <div class="sponsors-area sponsors-area-colorfull cities">
                            @foreach($cities_events as $key => $item)
                            <div class="single">
                                <a href="{{route('eventmie.events_index', ['search' => urlencode($item->city)])}}">
                                    <img src="/storage/{{ $item->poster }}" alt="{{ $item->city }}"/>
                                    <span class="single-name">{{ $item->city }}</span>
                                    <span class="single-name-sub">@lang('eventmie-pro::em.total_events') {{ $item->cities }}</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->
        </div>
    </div>
</section>
@endif    --}}
<!--cities_events END-->


<!--Blogs-->
{{-- @if(!empty($posts))
<section>
    <div>
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-blog"></i> @lang('eventmie-pro::em.blogs')</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="{{route('eventmie.post_view', $item['slug'])}}">
                                    <img src="/storage/{{ $item['image'] }}" alt="">
                                </a>
                            </figure>
                            <div class="single-news-info">
                                <div class="meta-wrapper hidden">
                                    <span>{{\Carbon\Carbon::parse($item['updated_at'])->translatedFormat('M j, Y')}}</span>
                                </div>
                                <h3 class="title"><a href="{{route('eventmie.post_view', $item['slug'])}}">{{$item['title']}}</a></h3>
                                <div class="meta-wrapper">
                                    <span>{{ $item['excerpt'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="section-btn-area">
                    <a class="lgx-btn" href="{{route('eventmie.get_posts')}}"><i class="fas fa-blog"></i> @lang('eventmie-pro::em.view_all_blogs')</a>
                </div>
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif     --}}
<!--Blogs END-->

<!--Organiser section-->
{{-- <section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-dark">
        <div class="lgx-inner" style="background-image: url({{ eventmie_asset('img/bg-pattern.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h3 class="subheading">@lang('eventmie-pro::em.how_it_works')</h3>
                            <h2 class="heading"><i class="fas fa-person-booth"></i> @lang('eventmie-pro::em.for_event_organisers')</h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content lgx-content-white">
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-plus fa-4x"></i>
                                <h3 class="title">1. @lang('eventmie-pro::em.organiser_1')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_1_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-check fa-4x"></i>
                                <h3 class="title">2. @lang('eventmie-pro::em.organiser_2')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_2_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-money-check-alt fa-4x"></i>
                                <h3 class="title">3. @lang('eventmie-pro::em.organiser_3')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_3_info')</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section> --}}
<!--TRAVEL INFO END-->




@endsection

@section('javascript')
<script type="text/javascript">
    var google_map_key = {!! json_encode(setting('apps.google_map_key')) !!};
</script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@stop
