{{--
  Title: Two Images
  Description: This is a section with two images
  Category: formatting
  Icon: format-gallery
  Keywords: two images
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
  EnqueueAssets:
--}}

<section class="two-images background-color--{{ get_field('background_color') }}">

    <div class='container'>
        <div class="row">
            <img class="two-column__two__image" src='{{ the_field('image_left') }}' alt='Green Source Nutrition'>
            <img class="two-column__two__image" src='{{ the_field('image_right') }}' alt='Green Source Nutrition'>
        </div>
    </div>

</section>
