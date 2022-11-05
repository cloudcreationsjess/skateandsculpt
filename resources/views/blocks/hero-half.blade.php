{{--
  Title: Hero Half
  Description: Hero Section with half image half content
  Category: formatting
  Icon: welcome-view-site
  Keywords: hero half image
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="hero-half background-color--{{ get_field('background_color') }} {{ get_field('class') }} @if ( get_the_ID() == '17' && get_field('enable_popup_banner', 'option') == 'true' ) has-banner @endif">
    <div class="basic-content">
        <div class="basic-content__inner">
            <x-basic_content/>
        </div>
    </div>
    <div class="hero-image">
        <img src="{{ get_field('image') }}" alt="">
    </div>
</section>
