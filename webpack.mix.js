let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    // common auth instance
    .js('eventmie-pro/resources/js/auth/index.js', 'assets/js/auth_v1.5.js')

    // events create seperate vue js
    .js('eventmie-pro/resources/js/events_manage/index.js', 'assets/js/events_manage_v1.5.js')

    // events show seperate vue js
    .js('eventmie-pro/resources/js/events_show/index.js', 'assets/js/events_show_v1.5.js')

    // events listing seperate vue js
    .js('eventmie-pro/resources/js/events_listing/index.js', 'assets/js/events_listing_v1.5.js')

    // events earning vue js
    .js('eventmie-pro/resources/js/event_earning/index.js', 'assets/js/event_earning_v1.5.js')

    // customer bookings seperate vue js
    .js('eventmie-pro/resources/js/bookings_customer/index.js', 'assets/js/bookings_customer_v1.5.js')

    // bookings_organiser
    .js('eventmie-pro/resources/js/bookings_organiser/index.js', 'assets/js/bookings_organiser_v1.5.js')

    // events welcome seperate vue js
.js('eventmie-pro/resources/js/welcome/index.js', 'assets/js/welcome_v1.5.js')

// compile sass files
.sass('eventmie-pro/resources/sass/app.scss', 'assets/css')
.options({
    processCssUrls: false,
    autoprefixer: {
        options: {
            browsers: [
                'last 6 versions',
            ]
        }
    }
})

// third-party css
.sass('eventmie-pro/resources/sass/vendor.scss', 'assets/css')

// compile node modules in seperate vendor.js file
.extract();
