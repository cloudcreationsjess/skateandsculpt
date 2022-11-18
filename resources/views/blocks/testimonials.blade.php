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
    $the_query = new WP_Query($params);
?>



<section class="testimonials">
    <div class='blue-outline-squiggle--1'>
        <x-svg.blue-outline-squiggle />
    </div>
    <div class='blue-outline-squiggle--2'>
         <x-svg.blue-outline-squiggle />
    </div>
    <div class='testimonials-container'>
        <div class='script-heading'>
            {!! get_field('title') !!}
        </div>
        <div class="swiper-testimonials">
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if(have_posts($the_query))
                    @while(have_posts($the_query))
                        @php(the_post())
                        <div class="swiper-slide">
                            <div class="testimonial-quote">
                                {!! get_field('testimonial_quote') !!}
                            </div>
                            <div class="quote-author">
                                {!! get_field('quote_author') !!}
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
            <div class="swiper-btn-prev">
                <x-svg.swiper-prev />
            </div>
            <div class="swiper-btn-next">
                <x-svg.swiper-next />
            </div>
        </div>

    </div>

    @php(wp_reset_query())
    </div>
</section>

