<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <?php echo $__env->make('eventmie::layouts.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('eventmie::layouts.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('eventmie::layouts.include_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('stylesheet'); ?>
</head>

<body class="home" <?php echo is_rtl() ? 'dir="rtl"' : ''; ?>>

    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->

    
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>

    
    <div class="lgx-container">
    
        <?php echo $__env->make('eventmie::layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php 
            $no_breadcrumb = [
                'eventmie.welcome', 
                'eventmie.events_show',
                'eventmie.login', 
                'eventmie.register', 
                'eventmie.register_show', 
                'eventmie.password.request', 
                'eventmie.password.reset',
            ]    
        ?>
        <?php if(!in_array(Route::currentRouteName(), $no_breadcrumb)): ?>
            <?php echo $__env->make('eventmie::layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <section class="main-wrapper" id="eventmie_app">
        
            
            <?php echo $__env->yieldContent('content'); ?>

            
            <vue-progress-bar></vue-progress-bar>
        </section>

        <?php echo $__env->make('eventmie::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!--Main wrapper end-->

    <?php echo $__env->make('eventmie::layouts.include_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <?php echo $__env->yieldContent('javascript'); ?>

</body>
</html>
<?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/layouts/app.blade.php ENDPATH**/ ?>