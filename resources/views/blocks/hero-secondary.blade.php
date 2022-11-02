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

    <div class="row">
        <div class="col-md-5 align-self-center">
            <div class="hero-secondary__content">
                <x-basic_content/>
            </div>
        </div>
        <div class="col-md-7">
            <div class='hero-secondary__background'>
                <img src='{{ the_field('image') }}' alt='Green Source Nutrition'>
            </div>
        </div>
    </div>

</section>
