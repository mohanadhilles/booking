

{{-- Load third party plugins in seperate file (node modules) --}}
<script type="text/javascript" src="{{ eventmie_asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ eventmie_asset('js/vendor_v1.5.js') }}"></script>

{{-- localization --}}
<script type="text/javascript" src="{{ route('eventmie.eventmie_lang') }}"></script>

{{-- Common Auth instance --}}
<script type="text/javascript" src="{{ eventmie_asset('js/auth_v1.5.js') }}"></script>

<script type="text/javascript">
    var my_lang = {!! json_encode(session('my_lang', 'en')) !!};
</script>