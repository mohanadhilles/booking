
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

// add Vue-router with SEO friendly configurations
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// add Veevalidate for auto validation
window.VeeValidate = require('vee-validate');
Vue.use(VeeValidate);

// import component for vue routes
import OrganiserBooking from './components/OrganiserBooking';

// // vue routes
const routes = new VueRouter({
    mode: 'history',
    base: '/',
    linkExactActiveClass: 'there',
    routes: [
        {
            path: path ? '/'+path+'/bookings' : '/bookings',
            // Inject  props based on route.query values for pagination
            props: (route) => ({
                page: route.query.page,
               
            }),
            name: 'organiserbooking',
            component: OrganiserBooking,

        },
    ],
});


/**
 * This is where we finally create a page specific
 * vue instance with required configs
 * element=app will remain common for all vue instances
 *
 * make sure to use window.app to make new Vue instance
 * so that we can access vue instance from anywhere
 * e.g interceptors 
 */
window.app = new Vue({
    el: '#eventmie_app',
    router: routes,
    
});