{{--
  Title: 3 Column Images and Content
  Description: A 3 column block with 2 images and custom content
  Category: formatting
  Icon: menu
  Keywords: three column 3 images content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="three-column-content" class="background-color--{{ get_field('background_color') }}">

    <div class="row">
        <div class="col align-self-start">
            <div class="image-left align-top">
                <img src="{{ get_field('image_left') }}" alt="Green Source Nutrition">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="basic-content">
                <x-basic_content/>
            </div>
        </div>
        <div class="col align-self-end">
            <div class="image-right align-bottom">
                <img src="{{ get_field('image_right') }}" alt="Green Source Nutrition">
            </div>
        </div>
    </div>

</section>
