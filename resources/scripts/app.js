/**
 * External Dependencies
 */
import 'jquery';

$(document).ready(() => {
    // windowLoad();
    // scroller();
    // animateOnScroll();

    // Run script on specific page
    // var url_pathname = window.location.pathname;
    // if (url_pathname == "/page-name/") {
    // yourScript();
    // }
    $('.collapse').collapse();

    window.onscroll = function () {
        scrollRotate();
    };

    function scrollRotate() {
        let images = document.querySelector(".spinning-logo");
        images.style.transform = "rotate(" + window.scrollY / 5 + "deg)";
    }

    mobileMenu();

    fixDiv();

});

/* MOBILE MENU */
function mobileMenu() {
    var $menu = document.querySelector('#mobile-menu');
    var html = document.querySelector('html');
    //hamburger
    var hamburger = document.querySelector('.js__slideout-toggle');
    hamburger.addEventListener('click', () => {
        html.classList.toggle('is--mobile-nav__active');
    });

    document.querySelector('.mobile-popout').addEventListener('click', () => {
        html.classList.remove('is--mobile-nav__active');
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
            });
        });
    });
}

/*
 * Removes loading animation when page load is completed
//  */
// function windowLoad() {
//     // var loader;
//     if (document.readyState == 'loading') {
//         // loader = requestAnimationFrame(animateLoaderScript);
//     }
//     $(".page-loader").fadeOut("slow");
//     $("body").removeClass("preload");
// }

/*
 * Any on scroll functionality should be placed here so only one window scroll is called
 */
// function scroller() {
//
//     // == Change Header on scroll ==
// //     var header = $(".js__header");
// //
// //     // ******* SCROLL ************\\
// //     $(window).on('scroll', function () {
// //
// //         // == Change Header on scroll ==
// //         scroll = $(window).scrollTop();
// //         // set scroll amount (px)
// //         if (scroll >= 60) {
// //             header.addClass("header--secondary");// if scroll is further than #px change class
// //             // splashBox.css("z-index", -100);
// //         } else {
// //             header.removeClass("header--secondary"); // if not (is at top) change class back
// //         }
// //
// //     });
// //
// //     // == Change Header on scroll ==
// //     var scroll = scroll;
// //     if (scroll >= 60) {
// //         header.addClass("header--secondary");// if scroll is further than #px change class
// //     } else {
// //         header.removeClass("header--secondary"); // if not (is at top) change class back
// //     }
// }

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

function fixDiv() {
    var $div = $(".blog-search");

    if ($(window).width() > 768) {

        if (($(window).scrollTop() > (($(window).height()) / 2) + 50)) {
            $div.css({'position': 'fixed', 'top': 'calc(50% + @header-height + 50px)'});
        } else {
            $div.css({'position': 'absolute', 'top': '50%', 'right': '0'});
        }
    }
}

$(window).scroll(fixDiv);

//SEARCH POP OUT

const $menu = $('.search-popout');

const onMouseUp = e => {
    if (!$menu.is(e.target) // If the target of the click isn't the container...
        && $menu.has(e.target).length === 0) // ... or a descendant of the container.
    {
        $menu.removeClass('search-popout__active');
        $('.sf-field-search').removeClass('display-search');
    }
};

$('.search-popout').on('click', () => {
    $('.sf-field-search').toggleClass('display-search') && $menu.toggleClass('search-popout__active').promise().done(() => {
        if ($menu.hasClass('search-popout__active')) {
            $(document).on('mouseup', onMouseUp); // Only listen for mouseup when menu is active...
        } else {
            $(document).off('mouseup', onMouseUp); // else remove listener.
        }
    });
});

