/*------------------------------------------------------------------
* Project:        Travelin - Travel Tour Booking HTML Templates
* Author:         bizberg_themes
* URL:            https://themeforest.net/user/bizberg_themes
* Created:        06/27/2022
-------------------------------------------------------------------
*/

 (function($) {
     "use strict";

var _host = window.location.host;
var _base_path = (_host == 'localhost') ? '/ceylontravellanka/' : '';

      /*======== Doucument Ready Function =========*/
    jQuery(document).ready(function () {
     //CACHE JQUERY OBJECTS
      $("#status").fadeOut();
      $("#preloader").delay(200).fadeOut("slow");
      $("body").delay(200).css({ "overflow": "visible" });

      
      /* Init Wow Js */
      new WOW().init();

    });

     /* ------------------------------------------------------------------------ */
     /* BACK TO TOP
    /* ------------------------------------------------------------------------ */
     $(document).on('click', '#back-to-top, .back-to-top', () => {
         $('html, body').animate({
             scrollTop: 0
         }, '500');
         return false;
     });
     $(window).on('scroll', () => {
         if ($(window).scrollTop() > 500) {
             $('#back-to-top').fadeIn(200);
         } else {
             $('#back-to-top').fadeOut(200);
         }
     });

     // Slick SLider
     $('.slider-store').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         direction: 'vertical',
         arrows: false,
         dots: false,
         fade: true,
         autoplay: true,
         asNavFor: '.slider-thumbs'
     });
    

     $('.slider-thumbs').slick({
         slidesToShow: 5,
         slidesToScroll: 1,
         asNavFor: '.slider-store',
         dots: false,
         arrows: false,
         autoplay: true,
         direction: 'vertical',
         centerMode: true,
         focusOnSelect: true,
         responsive: [{
             breakpoint: 800,
             settings: {
                 arrows:false,
             }
         }]

     });


     $('.review-slider').slick({
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         rows:0,
         autoplay: true,
         speed: 2000,
         loop:true,
         responsive: [{
             breakpoint: 991,
             settings: {
                 slidesToShow: 1,
                 arrows: false,
             }
         }]
     });

     $('.review-slider1').slick({
         infinite: true,
         slidesToShow: 2,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         rows:0,
         autoplay: true,
         speed: 5000,
         loop:true,
         responsive: [{
             breakpoint: 1100,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

     $('.about-slider').slick({
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         rows:0,
         speed: 4000,
         loop:true,
         responsive: [{
             breakpoint: 700,
             settings: {
                 arrows:false
             }
         }]
     });

     $('.side-slider').slick({
         infinite: true,
         slidesToShow: 6,
         slidesToScroll: 1,
         arrows: false,
         rows:0,
         dots: false,
         autoplay: true,
         speed: 4000,
         loop:true,
          responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 3
             }
         }, 
         {
             breakpoint: 811,
             settings: {
                 slidesToShow: 2
            }
         }, 
         {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

      $('.attract-slider').slick({
         infinite: true,
         slidesToShow: 8,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         speed: 2000,
         rows:0,
         autoplay: true,
         draggable:false,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 4
             }
         }, 
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 3
            }
         }, 
         {
             breakpoint: 500,
             settings: {
                 slidesToShow: 2
             }
         }]
     });

    
     $('.team-slider').slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: false,
         dots: true,
         autoplay: true,
         speed: 1000,
         rows:0,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 750,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

     $('.item-slider').slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         autoplay: true,
         speed: 2000,
         rows:0,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2,
                 arrows: false,
             }
         }, {
             breakpoint: 750,
             settings: {
                 slidesToShow: 1,
                 arrows: false,
             }
         }]
     });

     $('.item-slider1').slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         speed: 2000,
         rows:0,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 1,
                 arrows: false,
             }
         }, {
             breakpoint: 750,
             settings: {
                 slidesToShow: 1,
                 arrows: false,
             }
         }]
     });

     $('.banner-slider').slick({
         infinite: true,
         slidesToShow: 4,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         autoplay: true,
         speed: 2000,
         rows:0,
         cursor: false,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 800,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

     $('.shop-slider').slick({
         infinite: true,
         slidesToShow: 4,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         speed: 2000,
         rows:0,
         cursor: false,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 800,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

     // Slick Testimonial Slider
        $('.sl-testimonial-slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          vertical: true,
          verticalSwiping: true,
          autoplay: true,
          Speed: 8000,
          rows:0,
          infinite: true,
          arrows: false,
          dots: false,
          adaptiveHeight: true
        });

     $('.partner-slider').slick({
         infinite: true,
         slidesToShow: 5,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         speed: 2000,
         rows:0,
         loop:true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 3
             }
         }, {
             breakpoint: 800,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

    $(document).on('keyup', '#enquiry_form input', function () {
        if ($(this).val().length > 0) {
            $(this).removeClass('error');
        }
    });

    $('#enquiry-submit').on('click', function(event){
        event.preventDefault();

        var first_name = $('input[name="first_name"]').val(),
            last_name = $('input[name="last_name"]').val(),
            country = $('select[name="country"]').val(),
            mobile = $('input[name="mobile"]').val(),
            email = $('input[name="email"]').val();

        var interests = []
        $("input[name='interests[]']:checked").each(function (){
            interests.push( $(this).val() );
        });

        var hotel_type = []
        $("input[name='hotel_type[]']:checked").each(function (){
            hotel_type.push( $(this).val() );
        });

        var hotel_rating = []
        $("input[name='hotel_rating[]']:checked").each(function (){
            hotel_rating.push( $(this).val() );
        });

        var adults = $('[name="adults"]').val(),
            childrens = $('[name="childrens"]').val(),
            start_date = $('[name="start_date"]').val(),
            end_date = $('[name="end_date"]').val(),
            other_requirements = $('[name="other_requirements"]').val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
            email = email.replace(/^\s\s*/, '').replace(/\s\s*$/, '');

        if(first_name && mobile && (email && !filter.test(email))){

            $("#enquiry_form").hide();

            $.ajax({
                url : _base_path + 'js/ajax/enquiry.php',
                type : 'POST',
                data : {
                    first_name : first_name,
                    last_name : last_name,
                    country : country,
                    mobile : mobile,
                    email : email,
                    interests : interests,
                    hotel_type : hotel_type,
                    hotel_rating : hotel_rating,
                    adults : adults,
                    childrens : childrens,
                    start_date : start_date,
                    end_date : end_date,
                    other_requirements : other_requirements,
                },
                success : function( result ){
                    $('.contactform-msg').html( result );
                    $("#enquiry_form")[0].reset();

                    $('html, body').animate({
                        scrollTop: $('.contactform-msg').offset().top - 200
                    }, '500');

                    setTimeout(function(){
                        $('.contactform-msg').html( '' );
                        $("#enquiry_form").show();
                    },1000);
                }     
            });

            $.ajax({
                url : _base_path + 'js/ajax/user.php',
                type : 'POST',
                data : {
                    first_name : first_name,
                    last_name : last_name,
                },
                success : function( result ){
                    $('.contactform-msg').html( result );
                    $("#enquiry_form")[0].reset();
                }     
            });
        } else {
            if(!first_name){
                $('input[name="first_name"]').addClass('error');
            }
            if(!mobile){
                $('input[name="mobile"]').addClass('error');
            }
            if(!email || !filter.test(email)){
                $('input[name="email"]').addClass('error');
            }

            $('html, body').animate({
                scrollTop: $("#enquiry_form").first('error').offset().top - 150
            }, 500);
        }
        
    });
    
     /*-----------------------------------------------------------------------------------*/
    /*  COUNTDOWN
    /*-----------------------------------------------------------------------------------*/

     $(document).ready(() => {
         loopcounter('coming-counter');
     });

    /*-----------------------------------------------------------------------------------*/
    /*  COUNTER UP
    /*-----------------------------------------------------------------------------------*/
    $('.value').counterUp({
        delay: 50,
        time: 1000
    });
    /*-----------------------------------------------------------------------------------*/
    /*  MASONRY
    /*-----------------------------------------------------------------------------------*/
    
     $('.blog-main').masonry({
         // options
         itemSelector: '.mansonry-item',
     });

     $('.trend-box1').masonry({
         // options
         itemSelector: '.mansonry-item1',
     });

     // Nice Select JS
     $('.niceSelect').niceSelect();

     $('a[href="#search1"]').on('click', function(event) {
         event.preventDefault();
         $('#search1').addClass('open');
         $('#search1 > form > input[type="search"]').focus();
     });
     $('#search1, #search1 button.close').on('click keyup', function(event) {
         if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
             $(this).removeClass('open');
         }
     });
     //Do not include! This prevents the form from submitting for DEMO purposes only!
     $('form').submit(function(event) {
         event.preventDefault();
         return false;
     });

 })(jQuery);


 jQuery(window).on('resize load', () => {
     resize_eb_slider();
 }).resize();
 /**
  * Resize slider
  */
 function resize_eb_slider() {
     var bodyheight = jQuery(window).height();
     if (jQuery(window).width() > 1400) {
        bodyheight = bodyheight - $('.main_header_area').height();
         jQuery('.slider').css('height', `${bodyheight}px`);
     }
 }
