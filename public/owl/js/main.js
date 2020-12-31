/*global $, jQuery, console, alert, prompt */
$(window).on('load',function() {
    // Animate loader off screen
    $(".se-pre-con,.pre-loader").delay(500).fadeOut("slow");
    new WOW().init(
    {
        mobile:       false,
        live:         true
    });
});
$(document).ready(function () {
    "use strict";
    // Public Elemnts
    // new WOW().init();

    $('[placeholder]').focus(function () { // Placeholder
        $(this).attr('data-place', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-place'));
    });

    // $("#scrollDown").click(function() {
    //     $('html, body').animate({
    //         scrollTop: $(window).height()
    //     }, 1500);
    // });

    // $('#openMenu').click(function(e) {
    //     e.preventDefault();
    //     $('.mobile-menu').slideDown();
    //     $('#closeMenu').click(function(e){
    //         e.preventDefault();
    //         $('.mobile-menu').slideUp();
    //     });
    // });
    $('#openMenu').click(function (e) {
        e.preventDefault();
        $('.side-menu').css("right", 0).css("opacity", 1);
        $('.side-overlay').fadeIn();
        $('body, html').css("overflow-y", "hidden");
        $('.side-overlay, #closeMenu').click(function () {
            $('.side-menu').css("right", "-900px").css("opacity", 0);
            $('.side-overlay').fadeOut();
            $('body, html').css("overflow-y", "auto");
        });
    });

    // $('.calculation-tabs .nav a').click(function(e){
    //     e.preventDefault();
    //     $(this).addClass('active').siblings().removeClass('active');
    //     var target = $(this).attr('data-target');
    //     $('.tabs-holder > div').slideUp();
    //     $('.tabs-holder > div'+target).slideDown();
    // });

     // simple radio - sets up shop

    //  $('.simple-radio li').each(function(index) {
    //     if ($('input', this).prop('checked')) {
    //         $(this).addClass('checked');
    //     }
    // });

    // simple radio - listen for click
    // $('.simple-radio li').click(function() {

    //     $('.simple-radio input').removeAttr('checked');
    //     $('input', this).attr('checked', 'checked');
    //     $('input', this).prop({
    //         checked: true
    //     });
    //     $(this).parent().find('li').removeAttr('class');
    //     $(this).addClass('checked');

    // });

    // $('.shop-control .plus').click(function () {
    //     var qty = $(this).parent().find('.quantity').html();
    //     $(this).parent().find('.quantity').html(parseInt(qty) + 1);
    //     console.log(parseInt(qty));
    // });

    // $('.shop-control .minus').click(function () {
    //     var qty = $(this).parent().find('.quantity').html();
    //     if(parseInt(qty) <= 0){
    //         $(this).parent().find('.quantity').html(0);
    //     } else {
    //         $(this).parent().find('.quantity').html(parseInt(qty) - 1);
    //     }
    //     console.log(parseInt(qty));
    // });

    // $('.go-top a').click(function (e) {
    //     e.preventDefault();
    //     $('html, body').stop().animate({scrollTop: 0}, 500);
    //   });

    //   $('#openSearh').click(function(){
    //       $('.search-holder').slideToggle()
    //   });

    //   $("#upload").click(function(){
    //     $("button#upload").addClass("active");
    //     $(".rest").addClass("active");
    //     $(".icon").addClass("active");
    // });

});