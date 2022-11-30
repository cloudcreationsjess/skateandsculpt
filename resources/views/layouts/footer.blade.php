<footer id="footer">
    <div class='footer__top'>
        <div class='footer__top__title'>
            {!! get_field('subscribe_title', 'option') !!}
        </div>
        <div class='footer__top__subscribe'>
            <input type='text' placeholder="email address">
            <button class="btn btn--pink-blue footer-subscribe-button" type="submit">{{ get_field('footer_subscribe_button', 'option')['call_to_action'] }}</button>
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
                                <li><a target="_blank" href='{{ $url }}'>{!! $label !!}</a></li>
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
                © <?php echo date('Y'); ?> {!! get_field('business_name', 'option') !!}.
                All Rights Reserved.
                <a href='/privacy'>Privacy Policy</a>.
                <a href='/legal-policies'>Terms of Use</a>.
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


    const swiperTestimonial = new Swiper('.swiper-testimonials', {
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

    const swiperCoaches = new Swiper('.swiper-coach', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: true,
        loop: true,
        autoplay: false,
        slidesPerView: 2.9,
        centeredSlides: true,
        spaceBetween: 115,

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


</script>
</body>
</html>
