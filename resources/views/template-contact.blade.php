{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        <section class="contact-hero">
            <div class='green-squiggle-1'>
                <x-svg.squiggle />
            </div>
            <div class='green-squiggle-2'>
                <x-svg.squiggle />
            </div>
            <div class='blue-border blue-top-border'></div>
            <div class='blue-border-bottom'></div>
            <div class='container'>
                <div class='half-image'>
                    {{ the_image(get_field('hero_image')) }}
                </div>
                <div class='all-caps-heading'>
                    {!! get_field('hero_all_caps_heading') !!}
                </div>
                <div class='sub-heading'>
                    {!! get_field('hero_sub_heading') !!}
                </div>
            </div>
        </section>


        <x-city-slider />


        <section class="contact-form">
            <div class='container'>
                <div class='all-caps-heading color--orange'>
                    {!! get_field('form_all_caps_heading') !!}
                </div>
                {!! do_shortcode(get_field('form_shortcode')) !!}
                <div class='basic-text color--orange'>
                    {!! get_field('under_form_text') !!}
                </div>
            </div>
        </section>

        <section class="questions-section">
            <div class='blue-border blue-top-border'></div>
            <div class='green-squiggle-1'>
                <x-svg.squiggle />
            </div>
            <div class='green-squiggle-2'>
                <x-svg.squiggle />
            </div>
            <div class='container'>
                <div class='script-heading color--orange'>
                    {!! get_field('questions_script_heading') !!}
                </div>
                @php($button = get_field('questions_button'))
                <a class="btn btn--orange-outline" href='{{ $button['url'] }}'>{{ $button['call_to_action'] }}</a>
                <div class='colored-container background-color--pink'>
                    <div class='left-container'>
                        <div class='left-image'>
                            {{ the_image(get_field('about_image')) }}
                        </div>
                    </div>
                    <div class='right-container'>
                        <div class='all-caps-heading color--orange'>
                            {!! get_field('about_all_caps_heading') !!}</div>
                        <div class='sub-heading color--orange'>
                            {!! get_field('about_basic_text') !!}
                        </div>
                        <a class="btn btn--white-orange" href='{{ get_field('about_button')['url'] }}'>{{ get_field('about_button')['call_to_action'] }}</a>
                    </div>

                </div>
            </div>
        </section>


            <?php $args = [
            'post_type'      => 'cities',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

            query_posts($args); ?>

        <section class="full-width-city-slider">
            <div class='all-caps-heading color--orange'>
                {!! get_field('city_all_caps_heading') !!}
            </div>
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
                slidesPerView: 2.9,
                centeredSlides: true,
                spaceBetween: 200,

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

        <section class="giant-playlist-button giant-playlist-button-contact">
            <div class='container'>
                <a href='{{ get_field('giant_button')['url'] }}'>{{ get_field('giant_button')['call_to_action'] }}</a>
            </div>
        </section>

    @endwhile
@endsection
