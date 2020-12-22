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
.js('eventmie-pro/resources/js/auth/index.js', 'eventmie-pro/assets/js/auth.js')

// events create seperate vue js
.js('eventmie-pro/resources/js/events_manage/index.js', 'eventmie-pro/assets/js/events_manage.js')

// events show seperate vue js
.js('eventmie-pro/resources/js/events_show/index.js', 'eventmie-pro/assets/js/events_show.js')

// events listing seperate vue js
.js('eventmie-pro/resources/js/events_listing/index.js', 'eventmie-pro/assets/js/events_listing.js')

// customer bookings seperate vue js
.js('eventmie-pro/resources/js/bookings_customer/index.js', 'eventmie-pro/assets/js/bookings_customer.js')

// events welcome seperate vue js
.js('eventmie-pro/resources/js/welcome/index.js', 'eventmie-pro/assets/js/welcome_v1.5.js')

// compile sass files
.sass('eventmie-pro/resources/sass/app.scss', 'eventmie-pro/assets/css')
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
.sass('eventmie-pro/resources/sass/vendor.scss', 'eventmie-pro/assets/css')

// compile node modules in seperate vendor.js file
.extract();
