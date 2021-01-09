
{{-- Load third party plugins in seperate file (node modules) --}}
<script type="text/javascript" src="{{eventmie_asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{eventmie_asset('js/vendor.js') }}"></script>

{{-- localization --}}
<script type="text/javascript" src="{{route('eventmie.eventmie_lang') }}"></script>

{{-- Common Auth instance --}}
<script type="text/javascript" src="{{eventmie_asset('js/auth_v1.5.js') }}"></script>

<script type="text/javascript">
    var my_lang = {!! json_encode(session('my_lang', 'en')) !!};
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6HX6816DQT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-6HX6816DQT');
</script>
