
/**
 * This is a page specific seperate vue instance initializer
 */

// include vue common libraries, plugins and components
require('../vue_common');

/**
 * Below are the page specific plugins and components
  */

// add Veevalidate for auto validation
window.VeeValidate = require('vee-validate');
Vue.use(VeeValidate)

// add Vue-router with SEO friendly configurations
import VueRouter from 'vue-router';
Vue.use(VueRouter);


// import component for vue routes
import Tags from './components/Tags';

// // vue routes
const routes = new VueRouter({
    mode: 'history',
    base: '/',
    linkExactActiveClass: 'there',
    routes: [
        {
            path: path ? '/'+path+'/mytags' : '/mytags',
            // Inject  props based on route.query values for pagination
            props: (route) => ({
                page: route.query.page,
                
            }),
            name: 'Tags',
            component: Tags,

        },
    ],
});

/**
 * This is where we finally create a page specific
 * vue instance with required configs
 * element=app will remain common for all vue instances
 * 
 */
window.app = new Vue({
    el: '#eventmie_app',
    router: routes,
});