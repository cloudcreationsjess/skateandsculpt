{{--
  Title: Hero Secondary
  Description: The Hero block with half content half image
  Category: formatting
  Icon: welcome-view-site
  Keywords: hero secondary
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="hero-secondary" class="background-color--{{ get_field('background_color') }}">

    <div class="hero-secondary__container">
        <div class="hero-secondary__content">
            <x-basic_content/>
        </div>
        <div class='hero-secondary__background'>
            <img src='{{ the_field('image') }}' alt='Green Source Nutrition'>
        </div>
    </div>

</section>
