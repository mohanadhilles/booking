/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/** 
 * This is the default file for initiating a Vue instance
 * All the common vue components and common plugins will be 
 * declared here except auth
 */

require('./bootstrap');

// for using time
window.moment   = require('moment-timezone');

moment.locale(my_lang); 


window.Vue = require('vue');


import lodash from 'lodash';
Vue.use(lodash);
window.trans = (string) => _.get(window.i18n, string);
Vue.prototype.trans = string => _.get(window.i18n, string);

Vue.prototype.base_url = window.base_url;

// Vue Global Config
Vue.config.productionTip = true;
Vue.config.devtools = true;

window.VueProgressBar = require('vue-progressbar');
const options = {
    color: '#ec398b',
    failedColor: '#1b89ef',
    thickness: '4px',
    transition: {
        speed: '1s',
        opacity: '1s',
        termination: 900
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}

Vue.use(VueProgressBar, options)

// import custom helpers
import helpers from './helpers';
const plugin = {
    install () {
        Vue.helpers = helpers
        Vue.prototype.$helpers = helpers
    }
}
Vue.use(plugin);

// vue2 datepicker lang
// const vue2_datepicker_lang = {
Vue.prototype.$vue2_datepicker_lang = {
    // the locale of formatting and parsing function
    formatLocale: {
        // MMMM
        months: [trans('em.january'), trans('em.february'), trans('em.march'), trans('em.april'), trans('em.may'), trans('em.june'), trans('em.july'), trans('em.august'), trans('em.september'), trans('em.october'), trans('em.november'), trans('em.december')],
        // MMM
        monthsShort: [trans('em.jan'), trans('em.feb'), trans('em.mar'), trans('em.apr'), trans('em.may'), trans('em.jun'), trans('em.jul'), trans('em.aug'), trans('em.sep'), trans('em.oct'), trans('em.nov'), trans('em.dec')],
        // dddd
        weekdays: [trans('em.sunday'), trans('em.monday'), trans('em.tuesday'), trans('em.wednesday'), trans('em.thursday'), trans('em.friday'), trans('em.saturday')],
        // ddd
        weekdaysShort: [trans('em.sun'), trans('em.mon'), trans('em.tue'), trans('em.wed'), trans('em.thu'), trans('em.fri'), trans('em.sat')],
        // dd
        weekdaysMin: [trans('em.su'), trans('em.mo'), trans('em.tu'), trans('em.we'), trans('em.th'), trans('em.fr'), trans('em.sa')],
        // format 'a', 'A'
        meridiem: (h, _, isLowercase) => {
            let word = h < 12 ? trans('em.am') : trans('em.pm');
            return isLowercase ? word.toLocaleLowerCase() : word;
        },
    },
};

/**
 * Axios Interceptors 
 * just include the file
 */
require('./interceptors');