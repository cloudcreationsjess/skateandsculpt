{{--
  Title: Half and Half
  Description: A block that is half image and half content
  Category: formatting
  Icon: menu
  Keywords: half image content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="half-and-half" class="background-color--{{ get_field('background_color') }}">
    <div class="column-one__container">
        <img src="{{ get_field('image') }}" alt="Green Source Nutrition">
    </div>
    <div class="column-two__container">
        <x-basic_content/>
    </div>
</section>
