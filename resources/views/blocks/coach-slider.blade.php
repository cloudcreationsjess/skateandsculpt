{{--
  Title: Coach Slider
  Description: A full width slide with coach information
  Category: formatting
  Icon: menu
  Keywords: single column basic content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php $args = [
    'post_type'      => 'coach',
    'post_status'    => 'publish',
    'posts_per_page' => 100,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

    query_posts($args); ?>

<section class="coach-slider">
    <div class="swiper-coach">
        <div class="swiper-wrapper">
            <!-- Slides -->
            @if(have_posts())
                @php($i = 1)
                @while(have_posts())
                    @php(the_post())
                    <div class='swiper-slide'>
                        <div class='slide-background'>
                            {!! get_the_post_thumbnail() !!}
                        </div>
                        <div class='coach-details'>
                            @php($name = get_field('coach_name', get_the_ID()))
                            <div class='coach-name'>
                                {!! $name['first'] !!}<br/>{!! $name['last'] !!}
                            </div>
                            <div class='coach-bio'>
                                <div class='sub-heading'>
                                    {{ get_field('short_bio', get_the_ID()) }}
                                </div>
                            </div>
                            @php($city = get_field('coach_city', get_the_ID()))
                            <a class="btn btn--white-orange" href='/{{ str_replace(' ', '-', strtolower(get_the_title($city))) }}'>skate in {{ get_the_title($city) }}</a>
                        </div>
                    </div>
                    @php($i++)
                @endwhile
            @endif
        </div>
    </div>
</section>
<script>
    const swiperCoaches = new Swiper('.swiper-coach', {
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

            576: {
                slidesPerView: "auto",
                centeredSlides: true,
                spaceBetween: 20,
            },

            462: {
                slidesPerView: 1.3,
                spaceBetween: 20,
                centeredSlides: true,
            },

            300: {
                slidesPerView: "auto",
                spaceBetween: 60,

            }
        }
    });

</script>
@php(wp_reset_query())

