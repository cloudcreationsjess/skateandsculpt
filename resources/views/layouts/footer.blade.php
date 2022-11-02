<footer id="footer">
    {{--  @php(dynamic_sidebar('sidebar-footer'))--}}
    <div class="footer-container">
        <div class='footer__top'>
            <div class="row">
                <div class="col-lg col-12 align-self-center">
                    <div class="content">
                        <div class="basic-heading">{{ the_field('italic_title', 'option') }}</div>
                        <div class="subscribe-text">{{ the_field('subscribe_text', 'option') }}</div>
                        <div class="socials">
                            <?php while (have_rows('socials', 'option')): the_row(); ?>
                            <a target="_blank" href="{{ get_sub_field('url') }}">
                                <img src="{{ get_sub_field('icon') }}" alt=""></a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 align-self-start">
                    <div class="form">
                        <div id="fd-form-635c7e168ee4395073b536cd"></div>
                        <script>
                            window.fd('form', {
                                formId: '635c7e168ee4395073b536cd',
                                containerEl: '#fd-form-635c7e168ee4395073b536cd'
                            });
                        </script>
                    </div>
                </div>
                <div class="col-lg-3 col-12 align-self-center">
                    <div class='footer__top__logo'>
                        <img src="{{ the_field('logo', 'option') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <ul class='footer__top__links'>
                        <?php while (have_rows('footer_links', 'option')): the_row(); ?>
                        <li><a href="{{ get_sub_field('url') }}">{{ get_sub_field('label') }}</a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class='footer__bottom'>
            <div class="container">
                <div class="content">
                    <div class="copyright">©
                        Copyright <?php echo date('Y'); ?> {!! the_field('business_name', 'options') !!}</div>
                    <div class="dot-hide"> &bull;</div>
                    <div class="terms">
                        <a href="/privacy-policy/">Privacy</a>
                        &bull;
                        <a href="/terms">Terms</a>
                        &bull;
                        <a href='/faq'>faq</a>
                        <div class="dot-hide"> &bull;</div>
                    </div>
                    <a href='https://saevilrow.co/'>Site design by Saevil Row</a>
                </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>

    //bootstrap accordion
    // $('.collapse').collapse()
    feather.replace();

    //swiper////////////////////////////////

    // init Swiper:

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: false,
        loop: true,
        autoplay: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            bulletActiveClass: 'swiper-pagination-bullet-active',
            bulletClass: 'swiper-pagination-bullet',
            clickable: true,
            autoHeight: true,
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

</script>
</body>
</html>
