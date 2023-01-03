{{--
  Title: Testimonials
  Description: A block with a testimonial slider
  Category: formatting
  Icon: menu
  Keywords: testimonial
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php
    global $posts;

    $params = [
        'post_type'   => 'testimonial',
        'post_status' => 'publish',
        'orderby'     => 'date',
        'order'       => 'DESC',
    ];

    query_posts($params);
?>





<section class="testimonials">
    <div class='blue-outline-squiggle--1'>
        <x-svg.blue-outline-squiggle />
    </div>
    <div class='blue-outline-squiggle--2'>
         <x-svg.blue-outline-squiggle />
    </div>
    <div class='testimonials-container'  data-aos="fade-in">
        <div class='script-heading'>
            {!! get_field('title') !!}
        </div>
        <div class="swiper-testimonials">
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if(have_posts($params))
                    @while(have_posts())
                        @php(the_post())
                        <div class="swiper-slide">
                            <div class="testimonial-quote">
                                {!! get_post_meta(get_the_ID(), 'testimonial_quote', TRUE) !!}
                            </div>
                            <div class="quote-author">
                                {!! get_post_meta(get_the_ID(), 'quote_author', TRUE) !!}
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
            @php(wp_reset_query())
            <div class="swiper-button-prev">
                <x-svg.swiper-next />
            </div>
            <div class="swiper-button-next">
                <x-svg.swiper-next />
            </div>
        </div>
    </div>
</section>

