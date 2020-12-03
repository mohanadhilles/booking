
/**
 * This is a page specific seperate vue instance initializer
 */

// include vue common libraries, plugins and components
require('../vue_common');

/**
 * Below are the page specific plugins and components
  */

// for using time
window.moment   = require('moment-timezone');


// add Veevalidate for auto validation
window.VeeValidate = require('vee-validate');
Vue.use(VeeValidate)

// add Vuex for global variables management across components
window.Vuex = require('vuex');
Vue.use(Vuex);

Vue.component('tabs-component', require('./components/Tabs.vue').default);

// import Vuerouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Vue Confirm dialog
import VueConfirmDialog from 'vue-confirm-dialog'

Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default);

// import component for vue routes
import Detail from './components/Detail';
import Media from './components/Media';
import Location from './components/Location';
import Timing from './components/Timing';
import Tickets from './components/Tickets';
import Poweredby from './components/Poweredby';
import Seo from './components/Seo';

// vue routes
const routes = new VueRouter({
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'detail',
            component: Detail,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/media',
            name: 'media',
            component: Media,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/seo',
            name: 'seo',
            component: Seo,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/location',
            name: 'location',
            component: Location,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/timing',
            name: 'timing',
            component: Timing,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/tickets',
            name: 'tickets',
            component: Tickets,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
        {
            path: '/publish',
            name: 'publish',
            component: Poweredby,
            props: true,
            beforeEnter(to, from, next) {
                routeBeforeEnter(to, from, next);
            },
        },
    ],
});

function routeBeforeEnter(to, from, next) {
    // except refresh
    if(from.name !== null) {
        // don't switch if no is_event_id
        if(is_event_id == 0) {
            Vue.$confirm({
                title: trans('em.required'),
                message: trans('em.please_fill_details'),
                button: {
                    yes: trans('em.cancel'),
                },
                callback: confirm => {
                    next(false);
                }
            });
            
            next(false);

            // in case of force loading other than detail
            if(to.name == "detail") {
                window.location.href = route('eventmie.myevents_form');
            }
            
        } else {
            Vue.$confirm({
                title: trans('em.ask_saved_changes'),
                message: trans('em.save_before_switch'),
                button: {
                    yes: trans('em.yes'),
                    no: trans('em.cancel')
                },
                callback: confirm => {
                    if(confirm) next();
                    else next(false);
                }
            });
        }
    } else {
        next();
    }
};


// declare a global store object
const store = new Vuex.Store({
    state: {
        event        : [],
        
        tickets      : [],
        tags         : [],
        event_id     : null,
        
        v_sch_index         : 0,
        v_repetitive        : 0,
        v_repetitive_days   : [],
        v_repetitive_dates  : [],
        v_from_time         : [],
        v_to_time           : [],
        organiser_id        : null,

    },
    mutations: {
        add(state, {tickets, tags, event_id, v_repetitive, v_repetitive_days, v_repetitive_dates, v_from_time, v_to_time, organiser_id, event}) {
            if(typeof tickets !== "undefined") {
                state.tickets   = tickets;
            }

            if(typeof tags !== "undefined") {
                state.tags   = tags;
            }

            if(typeof event_id !== "undefined") {
                state.event_id   = event_id;
            }

            if(typeof v_repetitive !== "undefined") {
                state.v_repetitive   = v_repetitive;
            }

            if(typeof v_repetitive_days !== "undefined") {
                state.v_repetitive_days = v_repetitive_days;
            }

            if(typeof v_repetitive_dates !== "undefined") {
                state.v_repetitive_dates = v_repetitive_dates;
            }

            if(typeof v_from_time !== "undefined") {
                state.v_from_time = v_from_time;
            }

            if(typeof v_to_time !== "undefined") {
                state.v_to_time = v_to_time;
            }

            if(typeof organiser_id !== "undefined") {
                state.organiser_id = organiser_id;
            }

            if(typeof event !== "undefined") {
                state.event = event;
            }

            

        },
        update(state,{ v_sch_index, v_repetitive_days, v_repetitive_dates, v_from_time, v_to_time}){

            if(typeof v_repetitive_days !== "undefined" && typeof v_sch_index !== "undefined"  ) {
                state.v_repetitive_days[v_sch_index] = v_repetitive_days;
            }

            if(typeof v_repetitive_dates !== "undefined" && typeof v_sch_index !== "undefined"  ) {
                state.v_repetitive_dates[v_sch_index] = v_repetitive_dates;
            }

            if(typeof v_from_time !== "undefined" && typeof v_sch_index !== "undefined"  ) {
                state.v_from_time[v_sch_index] = v_from_time;
            }

            if(typeof v_to_time !== "undefined" && typeof v_sch_index !== "undefined"  ) {
                state.v_to_time[v_sch_index] = v_to_time;
            }
        },
    },
});

/**
 * This is where we finally create a page specific
 * vue instance with required configs
 * element=app will remain common for all vue instances
 * 
 */
window.app = new Vue({
    el: '#eventmie_app',
    store: store,
    router: routes

});