<?php

    $args = array(
        'post_type'  => 'coach',
        'meta_key'   => 'coach_city',
        'meta_value' => $cityID,
    );

   $posts = query_posts($args);

    global $wp_query;

?>

@if(have_posts())
    <div class="orange-slider">
        <div class="container orange-slider-container">
            <div class='slider-content'>
                <div class='left-column'>
                    <div class='all-caps-heading color--pink'>MEET</div>
                    @while(have_posts())
                        @php(the_post())
                        <div class='slide-content js--coach-details--{{get_the_ID()}}'>
                            <div class='script-heading color--orange'>{{ get_field('coach_name', get_the_ID())['first'] }}</div>
                            <div class='coach-traits color--orange'>
                                @if(have_rows('characteristics'))
                                    @while(have_rows('characteristics'))
                                        @php(the_row('characteristics'))
                                        @php($group = get_field('characteristics'))
                                        <div class='prompt'>{!! get_sub_field('prompt') !!}</div>
                                        <div class='answer'>{!! get_sub_field('answer') !!}</div>
                                    @endwhile
                                @endif
                            </div>
                        </div>
                    @endwhile

                </div>
                <div class="swiper-orange swiper-city-coach">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @while(have_posts())
                            @php(the_post())
                            <div data-id="{{get_the_ID()}}" class="swiper-slide">
                                <div class='slider-image'>
                                    {!! get_the_post_thumbnail() !!}
                                </div>
                            </div>
                        @endwhile

                    </div>
                </div>
            </div>
            <div class='navigation-container'>
                <div class='navigation'>
                    <div class='swiper-button-prev'>
                        <x-svg.orange-arrow />
                    </div>
                    <div class='swiper-button-next'>
                        <x-svg.orange-arrow />
                    </div>
                </div>
                <div class='orange-border-bottom'></div>
            </div>
        </div>
    </div>
@endif
@php($postCount = $wp_query->found_posts)
<script>
    const swiperCityCoach = new Swiper('.swiper-city-coach', {
        direction: 'horizontal',
        clickable: true,
        watchOverflow: true,
        loop: {{ $postCount > 1 ? 'true' : 'false' }},
        autoplay: false,
        slidesPerView: {{ $postCount > 1 ? '1.6' : '1' }},
        spaceBetween: {{ $postCount > 1 ? '14' : '0' }},
        centeredSlides: false,
        slideToClickedSlide: true,

        on: {
            init: function() {
                let currentSwiper = document.querySelector('.swiper-city-coach');
                let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
                let element = document.querySelector('.js--coach-details--' + id);
                element.classList.add('content-active');
                if({{$postCount}} <= 1 ) {
                    document.querySelector('.orange-slider .navigation').style.marginRight = "0px";
                    document.querySelector('.orange-slider .swiper-city-coach .swiper-slide').style.marginRight = "0px";
                    document.querySelector('.navigation-container').style.paddingTop = "53px";
                    document.querySelector('.swiper-orange').style.right = "50px";
                    document.querySelector('.swiper-orange').style.width = "calc(50vw - 50px)";
                }
            },

            slideChangeTransitionStart: function() {
                let currentSwiper = document.querySelector('.swiper-city-coach');
                let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
                let element = document.querySelector('.js--coach-details--' + id);
                element.classList.add('content-active');
                document.querySelector('.slide-content.content-active').classList.remove('content-active');
                element.classList.add('content-active');
            },

            loopFix: function() {
                document.querySelector('.slide-content.content-active').classList.remove('content-active');
            },
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
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
@php(wp_reset_query())


