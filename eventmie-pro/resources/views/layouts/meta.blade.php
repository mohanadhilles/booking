<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>


<!-- Required Laravel CSRF -->
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<!-- Base URL -->
<meta name="base-url" content="{{ eventmie_url() }}"/>

<!-- Timezone default -->
<meta name="timezone_default" content="{{ setting('regional.timezone_default') }}"/>
<!-- The above meta tags *must* come first in the head -->

<!-- Google map key -->
<meta name="google_map_key" content="{{ setting('apps.google_map_key') }}"/>

<!-- The above meta tags *must* come first in the head -->

<meta name="google-site-verification" content="RSqvclQGRBvlEFuS9ybWLPjgFsADh_wJpcWZa1o3Djk"/>

<!-- SITE TITLE -->
<title>{{ setting('site.site_name') ? setting('site.site_name') : config('app.name') }} - @yield('title', __('eventmie-pro::em.home'))</title>

<!-- Facebook Meta -->
<meta property="og:url"           content="@yield('meta_url', eventmie_url())" />
<meta property="og:type"          content="article" />
<meta property="og:title"         content="@yield('meta_title', setting('seo.meta_title'))" />
<meta property="og:description"   content="@yield('meta_description', setting('seo.meta_description'))" />
<meta property="og:image"         content="@yield('meta_image', setting('site.logo'))" />
<meta property="og:image:width"   content="512" />
<meta property="og:image:height"  content="512" />

<!-- Twitter Meta -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ setting('social.twitter') }}" />
<meta name="twitter:creator" content="{{ setting('social.twitter') }}" />
<meta name="twitter:title" content="@yield('meta_title', setting('seo.meta_title'))">
<meta property="twitter:description" content="@yield('meta_description', setting('seo.meta_description'))" />

<!-- General Meta -->
<meta name="title" content="@yield('meta_title', setting('seo.meta_title'))">
<meta name="keywords" content="@yield('meta_keywords', setting('seo.meta_keywords'))">
<meta name="description" content="@yield('meta_description', setting('seo.meta_description'))">
<meta name="image" content="@yield('meta_image', setting('site.logo'))">
<meta name="url" content="@yield('meta_url', eventmie_url())" >
<meta name="author" content="@yield('meta_author', (setting('site.site_name') ? setting('site.site_name') : config('app.name')))">

<!-- Google Analytics (production only) -->
@if(config('app.env') == 'production' && setting('apps.google_analytics_code'))
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('apps.google_analytics_code') }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', "{{ setting('apps.google_analytics_code') }}");
</script>
@endif