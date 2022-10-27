{{--
  Title: My Path
  Description: The My Path block
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

<section id="my-path" class="background-color--{{ get_field('background_color') }}">
    <div class="container">
        <div class="my-path__container">
            <div class="my-path__section-one">
                <div class="row">
                    <div class="col-4">
                        <div class="image-left">
                            <img src="{{ get_field('image_left') }}" alt="">
                            <div class="spinning-logo__container">
                                <img class="spinning-logo" src='{{ the_field('logo') }}' alt='Green Source Nutrition'>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="basic-content">
                            <div class="script-heading">
                                {!! get_field('script_heading') !!}
                            </div>
                            {!! get_field('text_section_one') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="parallax-image">
            <div class="parallax" style="background-image: url('{{ the_field('image_parallax') }}')">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="my-path__container">
            <div class="my-path__section-two">
                <div class="content">
                    <div class="all-caps-heading">
                        {!! get_field('all_caps_heading') !!}
                    </div>
                    <div class="basic-content">
                        {!! get_field('text_section_two') !!}
                    </div>
                </div>
                <div class="image-right">
                    <img src="{{ get_field('image_right') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
