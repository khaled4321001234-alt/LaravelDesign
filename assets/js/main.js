jQuery(function($) {
    'use strict';

    // Mean Menu — only init if .mean-menu exists (not used in new navbar)
    if ($('.mean-menu').length) {
        $('.mean-menu').meanmenu({
            meanScreenWidth: '991',
        });
    }

    // Sticky Nav
    $(window).on('scroll', function() {
        $(window).scrollTop() >= 100 ?
        $('.navbar-area').addClass('stickyadd') :
        $('.navbar-area').removeClass('stickyadd');
    });

    // Smooth Scrolling — only for hash links, skip external/page links
    $('a.nav-link[href^="#"]').on('click', function(e) {
        var target = $(this).attr('href');
        if ($(target).length) {
            $('html, body').stop().animate({
                scrollTop: $(target).offset().top - 60,
            }, 1000);
            e.preventDefault();
        }
    });

    // Search Popup
    $('.search-btn').on('click', function() {
        $('.search-popup').toggle(300);
    });

    // Popup Video
    if ($('.youtube-popup').length) {
        $('.youtube-popup').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
    }

    // Hero Slider
    if ($('.home-slider').length) {
        $('.home-slider').owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            smartSpeed: 950,
        });
    }

    // Team Slider
    if ($('.team-slider').length) {
        $('.team-slider').owlCarousel({
            loop: false,
            margin: 15,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsiveClass: true,
            responsive: {
                0:    { items: 1 },
                576:  { items: 2 },
                768:  { items: 2 },
                1000: { items: 3 },
                1400: { items: 4 },
            },
        });
    }

    // Gallery Slider
    if ($('.gallery-slider').length) {
        $('.gallery-slider').owlCarousel({
            loop: false,
            margin: 20,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsiveClass: true,
            responsive: {
                0:    { items: 1 },
                576:  { items: 2 },
                768:  { items: 3 },
                1000: { items: 3 },
            },
        });
    }

    // Testimonial Slider
    if ($('.testimonial-slider').length) {
        let testimonialSlider = $('.testimonial-slider').owlCarousel({
            items: 1,
            dots: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0:    { items: 1 },
                576:  { items: 1 },
                768:  { items: 1 },
                1000: { items: 1 },
            },
        });
        $('.dot').on('click', function() {
            testimonialSlider.trigger('to.owl.carousel', [$(this).index(), 300]);
            $('.dot').removeClass('active');
            $(this).addClass('active');
        });
    }

    // Client Slider
    if ($('.client-slider').length) {
        $('.client-slider').owlCarousel({
            loop: true,
            margin: 20,
            items: 1,
            smartSpeed: 950,
        });
    }

    // Partner Slider
    if ($('.partner-slider').length) {
        $('.partner-slider').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            smartSpeed: 2000,
            margin: 30,
            autoplayHoverPause: true,
            autoplay: true,
            responsive: {
                0:    { items: 2 },
                768:  { items: 3 },
                1024: { items: 4 },
                1200: { items: 5 },
            },
        });
    }

    // Back To Top
    $('body').append(`<div class='go-top'><i class='envy envy-angle-up'></i></div>`);
    $(window).on('scroll', function() {
        var scrolled = $(window).scrollTop();
        if (scrolled > 600) $('.go-top').addClass('active');
        if (scrolled < 600) $('.go-top').removeClass('active');
    });
    $('.go-top').on('click', function() {
        $('html, body').animate({ scrollTop: '0' }, 500);
    });

    // Preloader
    $(window).on('load', function() {
        $('.preloader-main').delay(500).queue(function() {
            $(this).fadeOut(400, function() { $(this).remove(); });
        });
    });

}(jQuery));