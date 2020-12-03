
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
Vue.use(VeeValidate);

/**
 * This is where we finally create a page specific
 * vue instance with required configs
 * element=app will remain common for all vue instances
 * 
 */
Vue.component('ticket-scan', require('./components/TicketScan.vue').default);
window.app = new Vue({
    el: '#eventmie_app',
    
});