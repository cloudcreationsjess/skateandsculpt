{{--
  Title: City Slider
  Description: Block with title, city name and slider of every city
  Category: formatting
  Icon: menu
  Keywords: weekly class slider city
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php $args = [
    'post_type'      => 'cities',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
];

    query_posts($args); ?>

<section class="weekly-class">
    <div class='container weekly-class-container'>
        <div class='city-content'>
            <div class='all-caps-heading'>
                {!! get_field('all_caps_header') !!}
            </div>
            <a href="/" class='js__city city-title'>
            </a>
            @if(get_field('add_cta'))
                <a class="js__city_button-text btn btn--lime-orange" href='#'>Learn
                    more about <span></span></a>
            @endif
            @if(get_field('arrow_navigation'))
                <div class='swiper-button-next'>
                    <x-svg.swiper-button />
                </div>
            @endif
        </div>
        <div class="swiper-city">
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if(have_posts())
                    @php($i = 1)
                    @while(have_posts())
                        @php(the_post())
                        <a href="/{{ str_replace(' ', '-', strtolower(get_the_title())) }}" class="swiper-slide swiper-slide-item--{{ $i % 2 == 0 ? 'odd' : 'even' }}" data-city="{{ get_the_title() }}">
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
    const swiperCity = new Swiper('.swiper-city', {
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
                var city = document.querySelector('.swiper-city .swiper-slide-active').getAttribute('data-city');
                document.querySelector('.js__city').innerHTML = city + '!';
                var citySlug = city.toLowerCase().replace(' ', '-');
                document.querySelector('.js__city').href = citySlug;
                if (document.querySelector('.js__city_button-text')) {
                    document.querySelector('.js__city_button-text').href = citySlug;
                    document.querySelector('.js__city_button-text span').innerHTML = city;
                };
            },
            slideChangeTransitionStart: function() {
                document.querySelector('.js__city').style.opacity = '1';
                var city = document.querySelector('.swiper-city .swiper-slide-active').getAttribute('data-city');
                document.querySelector('.js__city').innerHTML = city + '!';
                var citySlug = city.toLowerCase().replace(' ', '-');
                document.querySelector('.js__city').href = citySlug;
                if (document.querySelector('.js__city_button-text')) {
                    document.querySelector('.js__city_button-text').href = citySlug;
                    document.querySelector('.js__city_button-text span').innerHTML = city;
                };
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
</script>
@php(wp_reset_query())
