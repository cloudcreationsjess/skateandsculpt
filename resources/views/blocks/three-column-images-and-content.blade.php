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

<section class="three-column-content background-color--{{ get_field('background_color') }}">
    <div class="image-left align-top">
        <img src="{{ get_field('image_left') }}" alt="Green Source Nutrition">
    </div>
    <div class="basic-content">
        <x-basic_content/>
    </div>
    <div class="image-right align-bottom">
        <img src="{{ get_field('image_right') }}" alt="Green Source Nutrition">
    </div>

</section>
