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
                <div class="image-left">
                    <img src="" alt="">
                    <div class="image-left__logo"></div>
                </div>
                <div class="basic-content">
                    <x-basic_content />
                </div>
            </div>
            <div class="image-parallax">
                <img src="" alt="">
            </div>
            <div class="my-path__section-two">
                <div class="basic-content">
                    <x-basic_content />
                </div>
                <div class="image-right">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
