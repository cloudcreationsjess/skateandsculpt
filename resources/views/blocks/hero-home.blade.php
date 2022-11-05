{{--
  Title: Hero Home
  Description: The Hero Home block
  Category: formatting
  Icon: welcome-view-site
  Keywords: hero home
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="hero-home" class="background-color--{{ get_field('background_color') }}">
    <div class='hero-home__background'>
        <img class="hero-home__background--1" src='{{ the_field('image_left') }}' alt='Green Source Nutrition'>
        <img class="hero-home__background--2" src='{{ the_field('image_right') }}' alt='Green Source Nutrition'>
    </div>
    <div class="hero-home__inner-container">
        <div class="hero-home__content-box">
            @php( $flex = get_field('content_box'))
            @if( $flex )
                <div class='all-caps-heading'>{!! $flex['all_caps_heading'] !!}</div>
                <div class="main-heading">{!! $flex['main_heading'] !!}</div>
                <a class="btn btn--primary" href='{{ $flex['button']['url'] }}'>{!! $flex['button']['call_to_action'] !!}</a>
            @endif
        </div>
    </div>
</section>
