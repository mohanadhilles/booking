<template>
    <div>
        <vue-confirm-dialog></vue-confirm-dialog>
        <ul class="nav nav-pills lgx-nav">
            <li :class="{ 'active': currentRouteName == 'detail' }">
                <router-link :to="{ name: 'detail' }">
                    <h3>{{ trans('em.details') }}</h3>
                    <p>{{ trans('em.title') }} & {{ trans('em.description') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'timing' }">
                <router-link :to="{ name: 'timing' }">
                    <h3>{{ trans('em.timings') }}</h3>
                    <p>{{ trans('em.dates') }} & {{ trans('em.schedules') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'tickets' }">
                <router-link :to="{ name: 'tickets' }">
                    <h3>{{ trans('em.tickets') }}</h3>
                    <p>{{ trans('em.event') }} {{ trans('em.prices') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'location' }">
                <router-link :to="{ name: 'location' }">
                    <h3>{{ trans('em.location') }}</h3>
                    <p>{{ trans('em.venue') }} & {{ trans('em.address') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'media' }">
                <router-link :to="{ name: 'media' }">
                    <h3>{{ trans('em.media') }}</h3>
                    <p>{{ trans('em.thumbnail') }} & {{ trans('em.poster') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'seo' }">
                <router-link :to="{ name: 'seo' }">
                    <h3>{{ trans('em.seo') }}</h3>
                    <p>{{ trans('em.meta') }} {{ trans('em.info') }}</p>
                </router-link>
            </li>
            <li :class="{ 'active': currentRouteName == 'publish' }">
                <router-link :to="{ name: 'publish' }">
                    <h3>{{ trans('em.publish') }}</h3>
                    <p>{{ trans('em.event') }}</p>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>

import { mapState, mapMutations, mapActions } from 'vuex';

import { VueRouter } from 'vue-router';

export default {
    props: [
        'event_id',
        'organiser_id'
    ],

    computed: {
        currentRouteName() {
            return this.$route.name;
        }
    },

    
    methods: {
        // update global variables
        ...mapMutations(['add', 'update']),

        updateEventId() {
            
            this.add({  
                event_id        : this.event_id,
                organiser_id    : this.organiser_id,
            });
        },

    },  
    mounted() {
        this.updateEventId();
    }
}
</script>