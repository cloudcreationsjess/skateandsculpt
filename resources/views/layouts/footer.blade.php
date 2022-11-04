<footer id="footer">
    {{--  @php(dynamic_sidebar('sidebar-footer'))--}}
    <div class="footer-container">
        <div class='footer__top'>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-auto col-12 align-self-center">
                            <div class="content">
                                <div class="basic-heading">{{ the_field('italic_title', 'option') }}</div>
                                <div class="subscribe-text">{{ the_field('subscribe_text', 'option') }}</div>
                                <div class="socials desktop">
                                    <?php while (have_rows('socials', 'option')): the_row(); ?>
                                    <a target="_blank" href="{{ get_sub_field('url') }}">
                                        <img src="{{ get_sub_field('icon') }}" alt=""></a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 align-self-start">
                            <div class="form">
{{--                                <link rel="preload" href="https://usercontent.flodesk.com/be9b004f-83a5-4e78-b022-cb7c36043d0c/css/font_49f27c89-6528-4baa-ad97-329cd8e23c0c_1667006514.css" as="style">--}}
{{--                                <link rel="stylesheet" href="https://usercontent.flodesk.com/be9b004f-83a5-4e78-b022-cb7c36043d0c/css/font_49f27c89-6528-4baa-ad97-329cd8e23c0c_1667006514.css">--}}

                                <div class="ff-635c7e168ee4395073b536cd" data-ff-el="root" data-ff-version="3" data-ff-type="inline" data-ff-name="ribbonBanner">
                                    <!--tpl {% block config %} tpl-->
                                    <div data-ff-el="config" data-ff-config="eyJ0cmlnZ2VyIjp7Im1vZGUiOiJpbW1lZGlhdGVseSIsInZhbHVlIjowfSwib25TdWNjZXNzIjp7Im1vZGUiOiJtZXNzYWdlIiwibWVzc2FnZSI6IiIsInJlZGlyZWN0VXJsIjoiIn0sImNvaSI6ZmFsc2UsInNob3dGb3JSZXR1cm5WaXNpdG9ycyI6dHJ1ZSwibm90aWZpY2F0aW9uIjp0cnVlfQ==" style="display: none"></div>
                                    <!--tpl {% endblock %} tpl-->
                                    <div class="ff-635c7e168ee4395073b536cd__container">
                                        <form class="ff-635c7e168ee4395073b536cd__form" action="https://form.flodesk.com/forms/635c7e168ee4395073b536cd/submit" method="post" data-ff-el="form">
                                            <div class="ff-635c7e168ee4395073b536cd__title">
                                                <div></div>
                                            </div>
                                            <div class="ff-635c7e168ee4395073b536cd__subtitle">
                                                <div></div>
                                            </div>
                                            <div class="ff-635c7e168ee4395073b536cd__content fd-form-content" data-ff-el="content">
                                                <div class="ff-635c7e168ee4395073b536cd__fields" data-ff-el="fields">
                                                    <!--tpl {% block fields %} tpl-->

                                                    <div class="ff-635c7e168ee4395073b536cd__field fd-form-group">
                                                        <input class="ff-635c7e168ee4395073b536cd__control fd-form-control" type="text" maxlength="255" name="firstName" placeholder="FIRST NAME" data-ff-tab="firstName::email" />
                                                        <label class="ff-635c7e168ee4395073b536cd__label fd-form-label">FIRST NAME</label>
                                                    </div>


                                                    <div class="ff-635c7e168ee4395073b536cd__field fd-form-group">
                                                        <input class="ff-635c7e168ee4395073b536cd__control fd-form-control" type="text" maxlength="255" name="email" placeholder="EMAIL" data-ff-tab="email:firstName:submit" required />
                                                        <label class="ff-635c7e168ee4395073b536cd__label fd-form-label">EMAIL</label>
                                                    </div>

                                                    <input type="text" maxlength="255" name="confirm_email_address" style="display: none" />
                                                    <!--tpl {% endblock %} tpl-->
                                                </div>

                                                <div class="ff-635c7e168ee4395073b536cd__footer" data-ff-el="footer">
                                                    <button type="submit" class="ff-635c7e168ee4395073b536cd__button fd-btn" data-ff-el="submit" data-ff-tab="submit">
                                                        <span>SUBMIT</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="ff-635c7e168ee4395073b536cd__success fd-form-success" data-ff-el="success">
                                                <div data-paragraph="true">Thank you for subscribing!</div>
                                            </div>
                                            <div class="ff-635c7e168ee4395073b536cd__error fd-form-error" data-ff-el="error"></div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    window.fd('form:handle', {
                                        formId: '635c7e168ee4395073b536cd',
                                        rootEl: '.ff-635c7e168ee4395073b536cd',
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-12 align-self-center">
                    <a class="footer__top__logo" href="/home"><img src="{{ the_field('logo', 'option') }}" alt=""></a>
                </div>
                <div class="col-lg-5 col-12">
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

    const swiper2 = new Swiper('.swiper-2', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: false,
        loop: true,
        autoplay: true,

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

</script>
</body>
</html>
