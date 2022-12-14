{{--
  Title: Full Width City Slider
  Description: Block with slider of cities the full width of screen
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

<section class="full-width-city-slider">
    <div class="swiper-full-width-cities">
        <div class="swiper-wrapper">
            <!-- Slides -->
            @if(have_posts())
                @php($i = 1)
                @while(have_posts())
                    @php(the_post())
                    <div class='swiper-slide' data-city="{{ get_the_title() }}">
                        <div class='slide-image'>
                            {!! get_the_post_thumbnail() !!}
                        </div>
                        <div class='slide-hover'>
                            <a class="btn btn--blue-pink" href="/{{ str_replace(' ', '-', strtolower(get_the_title())) }}">
                                {{ get_the_title() }}
                            </a>
                        </div>
                    </div>
                    @php($i++)
                @endwhile
            @endif
        </div>
    </div>
</section>
<script>
    const swiperFullWidthCity = new Swiper('.swiper-full-width-cities', {
        // Optional parameters
        direction: 'horizontal',
        clickable: true,
        watchOverflow: true,
        loop: true,
        autoplay: false,
        slidesPerView: 2.8,
        centeredSlides: true,
        spaceBetween: 115,
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
            1600: {
                slidesPerView: "auto",
                centeredSlides: true,
            },

            1480: {
                slidesPerView: "auto",
                spaceBetween: 100,
            },

            1350: {
                slidesPerView: "auto",
                spaceBetween: 100,
                centeredSlides: true,
            },
            1024: {
              slidesPerView: "auto",
                spaceBetween: 100,
            },

            768: {
              slidesPerView: "auto"
            },

            576: {
                slidesPerView: "auto",
                spaceBetween: 80,
            },

            300: {
                slidesPerView: "auto",
                spaceBetween: 60,

            }

            // 375: {
            //     slidesPerView: 1.2,
            //     spaceBetween: 50,
            // }

        }
    });
</script>

@php(wp_reset_query())
