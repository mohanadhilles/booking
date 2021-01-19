@extends('eventmie::layouts.app')

@section('title')
    @lang('eventmie-pro::em.mybookings')
@endsection

@section('content')

<main>
    <div class="lgx-post-wrapper">
        <section>
            <router-view :is_success="{{ json_encode($is_success, JSON_HEX_APOS) }}" ></router-view>
        </section>
    </div>
</main>

@endsection

@section('javascript')


<script>
    var path = {!! json_encode($path, JSON_HEX_TAG) !!};
</script>

<script type="text/javascript" src="{{ eventmie_asset('js/bookings_customer_v1.5.js') }}"></script>
@stop
