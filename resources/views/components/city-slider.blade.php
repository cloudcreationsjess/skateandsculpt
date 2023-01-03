<?php $args = [
    'post_type'      => 'cities',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
];

    query_posts($args); ?>

<section class="city-slider city-slider-contact-page weekly-class">
    <div class='container weekly-class-container'>
        <div class='city-content'>
            <div class='sub-heading'>
                {!! get_field('slider_sub_heading') !!}
            </div>
            <div class='all-caps-heading'>
                {!! get_field('slider_all_caps_heading') !!}
            </div>
            <div class='script-heading'>
                {!! get_field('slider_script_heading') !!}
            </div>
            @if(get_field('slider_button'))
                <a class="btn btn--lime-orange" href='{{ get_field('slider_button')['url'] }}'>{{ get_field('slider_button')['call_to_action'] }}</a>
            @endif
        </div>
        <div class="city-swiper swiper-city">
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if(have_posts())
                    @php($i = 1)
                    @while(have_posts())
                        @php(the_post())
                        <a href="/cities/{{ str_replace(' ', '-', strtolower(get_the_title())) }}" class="swiper-slide" data-city="{{ get_the_title() }}">
                            {!! get_the_post_thumbnail() !!}
                        </a>
                        @php($i++)
                    @endwhile
                @endif
            </div>
        </div>
    </div>
</section>
<script>
    const citySwiper = new Swiper('.city-swiper', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: true,
        loop: true,
        autoplay: false,
        slidesPerView: 1.6,
        spaceBetween: 14,
        slideToClickedSlide: true,
        grabCursor: true,


        //accessible
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },

        a11y: {
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
        },

        breakpoints: {
            1491: {
                slidesPerView: 1.7,
            },
            1350: {
                spaceBetween: 14,
                slidesPerView: "auto",
            },

            1024: {
                slidesPerView: 1.4,
                spaceBetween: 14,
            },

            768: {
                slidesPerView: 1.3,
                spaceBetween: 14,
            },

            576: {
                slidesPerView: "auto",
                centeredSlides: true,
                spaceBetween: 14,
            },

            462: {
                slidesPerView: "auto",
                spaceBetween: 14,
                centeredSlides: true,
            },

            100: {
                slidesPerView: "auto",
                spaceBetween: 14,
                centeredSlides: true,

            }
        }
    });
</script>
@php(wp_reset_query())
