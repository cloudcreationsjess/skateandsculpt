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
                <a class="btn btn--lime-orange" href='/{{ str_replace(' ', '-', strtolower(get_the_title())) }}'>Learn more about {{ get_the_title() }}</a>
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
                @php(wp_reset_query())
            </div>

        </div>
    </div>
</section>

