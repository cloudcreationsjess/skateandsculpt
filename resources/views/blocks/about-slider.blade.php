{{--
  Title: About Details Slider
  Description: Each About Details post is made into an orange slider
  Category: formatting
  Icon: menu
  Keywords: about details slider
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php
    global $posts;

    $args = [
        'post_type'      => 'business_detail',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ];

    query_posts($args); ?>


@if(have_posts())
    @php($postCount = 1)
    @while(have_posts())
        @php(the_post())
        @if(get_field('slider', get_the_ID()))
            @php( $slider = get_field('slider', get_the_ID()))
            <section class="orange-slider js__slider-count-{{$postCount}} {{ $block['classes'] }}">
                <div class="container orange-slider-container">
                    <div class='slider-content'>
                        <div class='left-column'>
                            @php( $contentIt = 1)
                            @foreach($slider as $slide)
                                @if($slide['left_column'])
                                    @php($left = $slide['left_column']['basic_content'])
                                    <div id="content-{{ get_the_ID() }}-{{$contentIt}}" class='slide-content'>
                                        <x-basic-content :content="$left" />
                                    </div>
                                @endif
                                @php($contentIt++)
                            @endforeach
                        </div>
                        <div class="swiper-orange swiper-about swiper-about-{{$postCount}}">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @php($imageIt = 1)
                                @foreach($slider as $slide)
                                    <div data-id="{{get_the_ID()}}" data-count="{{$imageIt}}" id="slide-{{ get_the_ID() }}-{{$imageIt}}" class="swiper-slide">
                                        <div class='slider-image'>
                                            {{ the_image($slide['slide_image']) }}
                                        </div>
                                    </div>
                                    @php($imageIt++)
                                @endforeach
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
            </section>
            <script>

                let detailSwiper{{$postCount}} = document.querySelector('.swiper-about-{{$postCount}}');
                // let sliderCount = 1;
                // for(swipe of detailSwiper) {
                detailSwiper{{$postCount}}.classList.add('instance-{{$postCount}}');
                document.querySelector('.js__slider-count-{{$postCount}} .swiper-button-next').classList.add('btn-next-{{$postCount}}');
                document.querySelector('.js__slider-count-{{$postCount}} .swiper-button-prev').classList.add('btn-prev-{{$postCount}}');

                var swiper{{$postCount}} = new Swiper('.instance-{{$postCount}}', {
                    // your settings ...
                    direction: 'horizontal',
                    clickable: true,
                    watchOverflow: false,
                    loop: true,
                    autoplay: false,
                    slidesPerView: 1.7,
                    spaceBetween: 14,
                    centeredSlides: false,

                    on: {
                        init: function() {
                            let currentSwiper = document.querySelector('.instance-{{$postCount}}');
                            let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
                            let count = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-count');
                            let element = document.querySelector('#content-' + id + '-' + count);
                            element.classList.add('content-active');
                        },

                        slideChangeTransitionStart: function() {
                            let currentSwiper = document.querySelector('.instance-{{$postCount}}');
                            let id = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-id');
                            let count = currentSwiper.querySelector('.swiper-slide-active').getAttribute('data-count');
                            let element = document.querySelector('#content-' + id + '-' + count);
                            element.classList.add('content-active');
                            document.querySelector(".js__slider-count-{{$postCount}} .slide-content.content-active").classList.remove('content-active');
                            element.classList.add('content-active');
                        },

                        loopFix: function() {
                            document.querySelector(".js__slider-count-{{$postCount}} .slide-content.content-active").classList.remove('content-active');
                        },
                    },


                    navigation: {
                        nextEl: '.btn-next-{{$postCount}}',
                        prevEl: '.btn-prev-{{$postCount}}',
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

                    breakpoints: {
                        1491: {
                            spaceBetween: 14,
                            slidesPerView: 1.7,
                        },
                        1350: {
                            spaceBetween: 14,
                            slidesPerView: 1.6,
                        },

                        1024: {
                            slidesPerView: "auto",
                            spaceBetween: 14,
                        },

                        576: {
                            slidesPerView: "auto",
                            spaceBetween: 14,
                        },


                        2: {
                            slidesPerView: 1,
                            spaceBetween: 14,

                        },
                    }
                });

                // sliderCount = sliderCount + 1;

                // }
            </script>
        @endif
        @php($postCount++)
    @endwhile
@endif

@php(wp_reset_query())

