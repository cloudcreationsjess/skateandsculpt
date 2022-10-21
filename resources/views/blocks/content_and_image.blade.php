{{--
  Title: Content and Image
  Description: This is a customizable section with half image half content
  Category: formatting
  Icon: menu
  Keywords: content image section
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="hero-home" class="background-color--{{ get_field('background_color') }}">

    <div class='container-fluid'>
        <div class="row">
            <div class='hero-home__background'>
                <img src='{{ the_field('image') }}' alt='Green Source Nutrition'>

                <div class="hero-home__content">
                    <x-basic_content/>
                </div>
            </div>
        </div>
    </div>

</section>
