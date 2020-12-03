
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


Vue.component('select-dates', require('./components/SelectDates.vue').default);

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'


Vue.component('g-component',require('./components/GMap.vue').default);


Vue.use(VueGoogleMaps, {
    load: {
        key: google_map_key,
        
        
        libraries: "places" // necessary for places input
    }
});

// declare a global store object
const store = new Vuex.Store({
    state: {
        tickets             : [],
        booking_date        : null,
        booking_end_date    : null,
        start_time          : null,
        end_time            : null,
        booked_date_server  : null,
    },
    mutations: {
        add(state, {tickets, booking_date, start_time, end_time, booking_end_date, booked_date_server}) {

            if(typeof booking_date !== "undefined") {
                state.booking_date   = booking_date;
            }

            if(typeof booking_end_date !== "undefined") {
                state.booking_end_date   = booking_end_date;
            }

            if(typeof start_time !== "undefined") {
                state.start_time  = start_time;
            } 
            
            if(typeof end_time !== "undefined") {
                state.end_time   = end_time;
            }

            if(typeof tickets !== "undefined") {
                state.tickets   = tickets;
            }
            
            if(typeof booked_date_server !== "undefined") {
                state.booked_date_server   = booked_date_server;
            }

        },
        update(state,{ tickets}){
            
            if(typeof tickets !== "undefined") {
                // in case of multiple items
                if(tickets.length > 1) 
                    state.tickets.push(...tickets);
                else
                    state.tickets.push(tickets);
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
});