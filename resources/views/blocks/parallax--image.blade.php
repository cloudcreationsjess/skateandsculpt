{{--
  Title: Parallax Image
  Description: This is section with a full width image that has a parallax effect
  Category: formatting
  Icon: imageS
  Keywords: parallax image
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
  EnqueueStyle: styles/style.css
  EnqueueScript: scripts/script.js
  EnqueueAssets:
--}}


<section class="parallax-image">
    <div class="parallax">
        <img src='{{ the_field('image') }}' alt="Green Source Nutrition">
    </div>
</section>
