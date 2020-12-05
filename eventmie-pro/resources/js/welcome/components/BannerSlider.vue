<template>
    <carousel 
        :autoplay="false"
        :autoplayTimeout="5000"
        :scrollPerPage="false"
        :perPage="1"
        :paginationEnabled="false"
    >
        <slide 
            v-for="(item, index) in banners"
            v-bind:item="item"
            v-bind:index="index"
            v-bind:key="index"
            :class="'lgx-item-common'"
        >
            <div class="slider-text-single">
                <figure>
                    <img :src="'/storage/'+item.image" alt="">
                    <figcaption>
                        <div class="lgx-container">
                            <div class="lgx-hover-link">
                                <div class="lgx-vertical">
                                    <div class="lgx-banner-info">
                                        <h3 class="subtitle lgx-delay lgx-fadeInDown">{{ item.subtitle }}</h3>
                                        <h2 class="title lgx-delay lgx-fadeInDown">{{ item.title }}</h2>

                                        <div class="action-area">
                                            <div class="lgx-video-area" v-if="demo_mode">
                                                <a class="lgx-btn lgx-btn-white" target="_blank" href="https://classiebit.com/eventmie"><i class="fas fa-cloud-download-alt"></i> Free Demo</a>
                                                
                                                <a class="lgx-btn lgx-btn-success" target="_blank" href="https://classiebit.com/eventmie-pro"><i class="fas fa-shopping-cart"></i> Purchase PRO </a>

                                                <a class="lgx-btn lgx-btn-white" target="_blank" href="https://eventmie-pro-docs.classiebit.com"><i class="fas fa-book"></i> Docs </a>
                                                
                                                <a class="lgx-btn lgx-btn-primary" target="_blank" href="https://eventmie-pro-docs.classiebit.com/docs/1.5/changelog/changes"><i class="fas fa-book"></i> See What's New v1.5 </a>
                                            </div>

                                            <div class="lgx-video-area" v-else>
                                                <a class="lgx-btn lgx-btn-red" :href="getRoute('eventmie.events_index')"><i class="fas fa-calendar-day"></i> {{ trans('em.browse_events') }}</a>

                                                <!-- if guest -->
                                                <a class="lgx-btn" :href="getRoute('eventmie.register_show')" v-if="!is_logged">
                                                    <i class="fas fa-door-open"></i> {{ trans('em.register') }}
                                                </a>

                                                <!-- if customer -->
                                                <a class="lgx-btn" :href="getRoute('eventmie.profile')" v-if="is_logged && is_customer && is_multi_vendor">
                                                    <i class="fas fa-person-booth"></i> {{ trans('em.become_organiser') }}
                                                </a>

                                                <!-- if organiser -->
                                                <a class="lgx-btn" :href="getRoute('eventmie.myevents_form')" v-if="is_logged && is_organiser && is_multi_vendor">
                                                    <i class="fas fa-calendar-plus"></i> {{ trans('em.create_event') }}
                                                </a>

                                                <!-- if admin -->
                                                <a class="lgx-btn" :href="getRoute('eventmie.myevents_form')" v-if="is_logged && is_admin">
                                                    <i class="fas fa-calendar-plus"></i> {{ trans('em.create_event') }}
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            
        </slide>
    </carousel>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
Vue.prototype.base_url = window.base_url;

export default {

    components: {
        Carousel,
        Slide
    },
    props: [
        'banners',
        'is_logged',
        'is_customer',
        'is_organiser',
        'is_admin',
        'is_multi_vendor',
        'demo_mode',
        'check_session',
        's_host'
        
    ],

    
    data() {
        return {
            check : 1
        }
    },    

    methods: {
        // return route with event slug
        getRoute(name){
            return route(name);
        },

        verifyD(){
            this.check = 1;
        },
        
        // check Session
        checkSession(){
        
        }
    },

    mounted() {
        this.verifyD();       
    }
}
</script>