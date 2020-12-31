/*global $, jQuery, console, alert, prompt */
$(document).ready(function () {
    "use strict";
    //WOW
    new WOW().init();
    //lozad.js
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
    //Change navbar background Color when Scroll
    $(window).scroll(function(){
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 30);
    });
    //Add padding top to body

    // $(window).resize(function (){
    //     $('body').css('padding-top', $('.fixed-top').css("height"));
    // });
    // $(window).on("load", function (e) {
    //     $('body').css('padding-top', $('.fixed-top').css("height"));
    // });
    //open & close btn
    $('#open').click(function(e) {
        e.preventDefault();
        // $('.navbar-collapse').slideDown();
        $('.navbar-collapse').slideDown();
        $('#close').click(function(e){
            e.preventDefault();
            $('.navbar-collapse').slideUp();
        });
    });


    //Course OWL
    var owlCourse = $('.owl-course').owlCarousel({
        rtl:true,
        autoplay:true,
        loop:false,
        dots:false,
        margin:10,
        nav:true,
        animateOut:'fadeOut',
        animateIn:'fadeIn',
        responsive:{
            0:{
                items:1,
                nav:false
            },
            575.98:{
                items:2
            },
            767.98:{
                items:3
            },
            991.98:{
                items:5
            }
        }
    });
    // owl.owlcarousel2_filter( '.blue' );
    $( '.course-filter-bar' ).on( 'click', '.item', function() {
        var $item = $(this);
        var filter = $item.data( 'owl-filter' );
        $item.addClass( 'current' ).siblings().removeClass( 'current' );
        owlCourse.owlcarousel2_filter( filter );
    } );

    //Work OWL
    var owlWork = $('.owl-work').owlCarousel({
        rtl:true,
        autoplay:true,
        loop:false,
        dots:false,
        margin:10,
        nav:true,
        animateOut:'fadeOut',
        animateIn:'fadeIn',
        responsive:{
            0:{
                items:1,
                nav:false
            },
            575.98:{
                items:2
            },
            991.98:{
                items:3
            }
        }
    });
    // owl.owlcarousel2_filter( '.work1' );
    $( '.work-filter-bar' ).on( 'click', '.item', function() {
        var $item1 = $(this);
        var filter1 = $item1.data( 'owl-filter' );
        $item1.addClass( 'current' ).siblings().removeClass( 'current' );
        owlWork.owlcarousel2_filter( filter1 );
    } );

    //Partners OWL
    var owlpartners = $('.owl-partners').owlCarousel({
        rtl:true,
        autoplay:true,
        loop:true,
        dots:false,
        margin:10,
        nav:true,
        animateOut:'fadeOut',
        animateIn:'fadeIn',
        items:4,
        responsive:{
            0:{
                items:2,
                nav:false
            },
            575:{
                items:3,
                nav:false
            },
            991:{
                items:4
            }
        }
    });

    //Like / Heart
    $(".heart").click(function(){
        if($(this).hasClass("liked")){
            $(this).html('<i class="far fa-heart"></i>');
            $(this).removeClass("liked");
        }else{
            $(this).html('<i class="fa fa-heart red-heart"></i>');
            $(this).addClass("liked");
        }
    });

});