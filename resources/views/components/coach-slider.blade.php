<?php

    $args = array(
        'post_type'  => 'coach',
        'meta_key'   => 'coach_city',
        'meta_value' => $cityID,
    );

    query_posts($args);

?>


@if(have_posts())
    @while(have_posts())
        @php(the_post())
        <div class='script-heading'>{{ get_field('coach_name', get_the_ID())['first'] }}</div>
    @endwhile
@endif

@php(wp_reset_query())


{{--<section class="orange-slider js__slider-count-{{$postCount}} {{ $block['classes'] }}">--}}
{{--    <div class="container orange-slider-container">--}}
{{--        <div class='slider-content'>--}}
{{--            <div class='left-column'>--}}
{{--                <div class='all-caps-heading color--pink'>MEET</div>--}}
{{--                <div class='script-heading'>{!! get_field('coach_name', get_the_ID())['first_name'] !!}</div>--}}

{{--            </div>--}}
{{--            <div class="swiper-city-coach swiper-about-{{$postCount}}">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    <!-- Slides -->--}}
{{--                    @php($imageIt = 1)--}}
{{--                    @foreach($slider as $slide)--}}
{{--                        <div data-id="{{get_the_ID()}}" data-count="{{$imageIt}}" id="slide-{{ get_the_ID() }}-{{$imageIt}}" class="swiper-slide">--}}
{{--                            <div class='slider-image'>--}}
{{--                                {{ the_image($slide['slide_image']) }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @php($imageIt++)--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class='navigation-container'>--}}
{{--            <div class='navigation'>--}}
{{--                <div class='swiper-button-prev'>--}}
{{--                    <x-svg.orange-arrow />--}}
{{--                </div>--}}
{{--                <div class='swiper-button-next'>--}}
{{--                    <x-svg.orange-arrow />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class='orange-border-bottom'></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<script>--}}
{{--    const swiperCityCoach = new Swiper('.swiper-city-coach', {--}}
{{--        // Optional parameters--}}
{{--        direction: 'horizontal',--}}
{{--        clickable: true,--}}
{{--        watchOverflow: true,--}}
{{--        loop: true,--}}
{{--        autoplay: false,--}}
{{--        slidesPerView: 1.6,--}}
{{--        // centeredSlides: true,--}}
{{--        spaceBetween: 114,--}}

{{--        on: {--}}
{{--            init: function() {--}}
{{--                var city = document.querySelector('.swiper-city .swiper-slide-active').getAttribute('data-city');--}}
{{--                document.querySelector('.js__city').innerHTML = city + '!';--}}
{{--                var citySlug = city.toLowerCase().replace(' ', '-');--}}
{{--                document.querySelector('.js__city').href = "cities/" + citySlug;--}}
{{--                if (document.querySelector('.js__city_button-text')) {--}}
{{--                    document.querySelector('.js__city_button-text').href = "cities/" + citySlug;--}}
{{--                    document.querySelector('.js__city_button-text span').innerHTML = city;--}}
{{--                };--}}
{{--            },--}}
{{--            slideChangeTransitionStart: function() {--}}
{{--                document.querySelector('.js__city').style.opacity = '1';--}}
{{--                var city = document.querySelector('.swiper-city .swiper-slide-active').getAttribute('data-city');--}}
{{--                document.querySelector('.js__city').innerHTML = city + '!';--}}
{{--                var citySlug = city.toLowerCase().replace(' ', '-');--}}
{{--                document.querySelector('.js__city').href = "cities/" + citySlug;--}}
{{--                if (document.querySelector('.js__city_button-text')) {--}}
{{--                    document.querySelector('.js__city_button-text').href = "cities/" + citySlug;--}}
{{--                    document.querySelector('.js__city_button-text span').innerHTML = city;--}}
{{--                };--}}
{{--            },--}}

{{--            slideChange: function() {--}}
{{--                document.querySelector('.js__city').style.opacity = '0';--}}
{{--            },--}}
{{--        },--}}

{{--        navigation: {--}}
{{--            nextEl: '.swiper-button-next',--}}
{{--        },--}}

{{--        //accessible--}}
{{--        keyboard: {--}}
{{--            enabled: true,--}}
{{--            onlyInViewport: true,--}}
{{--        },--}}

{{--        a11y: {--}}
{{--            prevSlideMessage: 'Previous slide',--}}
{{--            nextSlideMessage: 'Next slide',--}}
{{--        },--}}
{{--    });--}}
{{--</script>--}}


