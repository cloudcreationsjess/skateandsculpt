/**
 * External Dependencies
 */
import 'jquery';

$(document).ready(() => {
    // windowLoad();
    scroller();
    // animateOnScroll();

    // Run script on specific page
    // var url_pathname = window.location.pathname;
    // if (url_pathname == "/page-name/") {
    // yourScript();
    // }
    mobileMenu();


});

/* MOBILE MENU */
function mobileMenu() {

    const $mobile = $('.js__slideout-toggle');
    const $popout = $('.mobile-popout');
    const $ham = $('.hamburger')

    const onMouseUp = e => {
        if (!$mobile.is(e.target) // If the target of the click isn't the container...
            && $mobile.has(e.target).length === 0) // ... or a descendant of the container.
        {
            $popout.removeClass('is--mobile-nav__active');
            $ham.removeClass('is--mobile-nav__active');
        }
    };

    $('.js__slideout-toggle').on('click', () => {
      $ham.toggleClass('is--mobile-nav__active') && $('.mobile-popout').toggleClass('is--mobile-nav__active').promise().done(() => {
            if ($popout.hasClass('is--mobile-nav__active')) {
                $(document).on('mouseup', onMouseUp); // Only listen for mouseup when menu is active...
            } else {
                $(document).off('mouseup', onMouseUp); // else remove listener.
            }
        });
    });
}


/*
 * Any on scroll functionality should be placed here so only one window scroll is called
 */
function scroller() {

    // == Change Header on scroll ==
    var header = $(".js__header");

    // ******* SCROLL ************\\
    $(window).on('scroll', function () {

        // == Change Header on scroll ==
        scroll = $(window).scrollTop();
        // set scroll amount (px)
        if (scroll >= 120) {
            header.addClass("header--secondary");// if scroll is further than #px change class
            // splashBox.css("z-index", -100);
        } else {
            header.removeClass("header--secondary"); // if not (is at top) change class back
        }

    });

    // == Change Header on scroll ==
    var scroll = scroll;
    if (scroll >= 120) {
        header.addClass("header--secondary");// if scroll is further than #px change class
    } else {
        header.removeClass("header--secondary"); // if not (is at top) change class back
    }
}

/*
 * Adds scroll to animation functionality
 * add class="animation-element" to an element you want to be triggered when scrolled to,
 * then your animation found in animation.less
 */
// function animateOnScroll() {
//     var $animation_elements = $('.animation-element');
//     var $tab_animation_elements = $('.tab-animation-element');
//     var $force_in_view = $('.force-in-view');
//     var $window = $(window);
//
//     function check_if_in_view() {
//         var window_height = $window.height() - 200;
//         var window_top_position = $window.scrollTop();
//         var window_bottom_position = (window_top_position + window_height);
//
//         if ($animation_elements) {
//             $.each($animation_elements, function () {
//                 var $element = $(this);
//                 var element_height = $element.outerHeight();
//                 var element_top_position = $element.offset().top;
//                 var element_bottom_position = (element_top_position + element_height);
//
//                 //check to see if this current container is within viewport
//                 if ((element_bottom_position >= window_top_position) &&
//                     (element_top_position <= window_bottom_position)) {
//                     $element.addClass('in-view');
//                 }
//             });
//         }
//         if ($force_in_view) {
//             $.each($force_in_view, function () {
//                 $(this).addClass('in-view');
//             });
//         }
//     }
//
//     $(window).load(function () {
//         setTimeout(function () {
//             $window.on('scroll resize', check_if_in_view);
//             $window.trigger('scroll');
//         }, 600);
//     });
// }

