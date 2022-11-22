<footer id="footer">
    <div class='footer__top'>
        <div class='footer__top__title'>
            {!! get_field('subscribe_title', 'option') !!}
        </div>
        <div class='footer__top__subscribe'>
            <input type='text' placeholder="email address">
            <button class="btn btn--pink-blue footer-subscribe-button" type="submit">we won't bug you</button>
        </div>
    </div>
    <div class='footer__bottom'>
        <div class='footer__bottom__container'>
            <div class='footer__bottom__logo'>
                <img src='{{ get_field('site_branding_logo', 'option') }}' alt='Skate & Sculpt Logo'></div>
            <div class='footer__bottom__menus'>
                <div class='footer__bottom__menus--info footer__bottom__menus__content'>
                    <div class='footer-menus-title'>Info</div>
                    {!! wp_nav_menu(['menu' => 'footer-info', 'echo' => false]) !!}
                </div>
                <div class='footer__bottom__menus--follow footer__bottom__menus__content'>
                    <div class='footer-menus-title'>Follow Us</div>
                    <ul>
                        @while (have_rows('follow_us_menu', 'option'))
                            @php the_row() @endphp
                            @php( $label = get_sub_field('social_label', 'option'))
                            @php($url = get_sub_field('social_url', 'option') )
                            @if ( $url )
                                <li><a href='{{ $url }}'>{!! $label !!}</a></li>
                            @else
                                <p class="disabled-footer-link">{!! $label !!} <span>(Coming Soon)</span></p>
                            @endif
                        @endwhile
                    </ul>
                </div>
                <div class='footer__bottom__menus--explore footer__bottom__menus__content'>
                    <div class='footer-menus-title'>Explore</div>
                    {!! wp_nav_menu(['menu' => 'footer-explore', 'echo' => false]) !!}
                </div>
            </div>
            <div class='footer__bottom__button'>
                <?php if (have_rows('footer_button', 'option')): while (have_rows('footer_button', 'option')): the_row();
                    $cta = get_sub_field('call_to_action', 'option');
                    $url = get_sub_field('url', 'option'); ?>
                <a class="btn btn--blue-white" href='{{ $url }}'>{!! $cta !!}</a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer__bottom__copyright">
        <div class='footer__bottom__copyright__container'>
            <div class='footer__bottom__copyright__content'>
                © <?php echo date('Y'); ?> {!! the_field('business_name', 'options') !!}.
                All Rights Reserved.
                <a href='/privacy'>Privacy Policy</a>.
                <a href='/terms-of-use'>Terms of Use</a>.
            </div>
        </div>
    </div>
</footer>
</div> <!-- #panel ends -->
</div><!-- #app end -->

@php(do_action('get_footer'))
@php(wp_footer())
@stack('footer.scripts')
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

<script>

    //
    //    //swiper////////////////////////////////
    //
    //    // init Swiper:
    //
    const swiper1 = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: true,
        loop: true,
        autoplay: false,
        slidesPerView: 1.6,
        // centeredSlides: true,
        spaceBetween: 114,

        on: {
            init: function() {
                var city = document.querySelector('.swiper-slide-active').getAttribute('data-city');
                document.querySelector('.js__city').innerHTML = city + '!';
                var citySlug = city.toLowerCase().replace(' ', '-');
                document.querySelector('.js__city').href = citySlug;
            },
            slideChangeTransitionStart: function() {
                document.querySelector('.js__city').style.opacity = '1';
                var city = document.querySelector('.swiper-slide-active').getAttribute('data-city');
                document.querySelector('.js__city').innerHTML = city + '!';
                var citySlug = city.toLowerCase().replace(' ', '-');
                document.querySelector('.js__city').href = citySlug;
            },

            slideChange: function() {
                document.querySelector('.js__city').style.opacity = '0';
            },
        },

        navigation: {
            nextEl: '.swiper-button-next',
        },

        //accessible
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },

        a11y: {
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
        },
    });

    const swiper2 = new Swiper('.swiper-testimonials', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: false,
        loop: true,
        autoplay: false,

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        //fade
        effect: 'fade',
        speed: 300,
        fadeEffect: {
            crossFade: true,
        },

        //accessible
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },

        a11y: {
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
        },
    });

    // let detailSwiper = document.querySelectorAll('.swiper-about');
    // let sliderCount = 1;
    // for(swipe of detailSwiper) {
    //     swipe.classList.add('instance-' + sliderCount);
    //     document.querySelector('.js__slider-count-' + sliderCount + ' .swiper-button-prev').classList.add('btn-prev-' + sliderCount);
    //     document.querySelector('.js__slider-count-' + sliderCount + ' .swiper-button-next').classList.add('btn-next-' + sliderCount);
    //
    //     new Swiper('.instance-' + sliderCount, {
    //         // your settings ...
    //         direction: 'horizontal',
    //         clickable: true,
    //         watchOverflow: true,
    //         loop: false,
    //         autoplay: false,
    //         slidesPerView: 1.5,
    //         spaceBetween: 14,
    //         centeredSlides: false,
    //
    //         on: {
    //             init: function() {
    //                 let currentSwiper = document.querySelector('.instance-' + sliderCount);
    //                 let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
    //                 let count = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-count');
    //                 let element = document.querySelector('#content-' + id + '-' + count);
    //                 element.classList.add('content-active');
    //             },
    //             slideChangeTransitionEnd: function() {
    //                 console.log('item------');
    //                 console.log(sliderCount);
    //                 let currentSwiper = document.querySelector('.instance-' + sliderCount);
    //                 let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
    //                 console.log('id: ' + id);
    //                 let count = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-count');
    //                 console.log('count: ' + count);
    //
    //                 let element = document.querySelector('#content-' + id + '-' + count);
    //                 element.classList.add('content-active');
    //             },
    //
    //         },
    //
    //         navigation: {
    //             nextEl: 'btn-next-' + sliderCount,
    //             prevEl: 'btn-prev-' + sliderCount,
    //         },
    //
    //         //accessible
    //         keyboard: {
    //             enabled: true,
    //             onlyInViewport: true,
    //         },
    //
    //         a11y: {
    //             prevSlideMessage: 'Previous slide',
    //             nextSlideMessage: 'Next slide',
    //         },
    //     });
    //
    //     sliderCount = sliderCount + 1;
    //
    // }


</script>
</body>
</html>
