{{--
  Title: Image and Content
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

<section class="image-and-content background-color--{{ get_field('background_color') }}">

    <div class='container-fluid'>
        <div class="image-and-content__container">
            <div class='image-and-content__image'>
                <img src='{{ the_field('image') }}' alt='Green Source Nutrition'>
                <div class="image-and-content__content">
                    <x-basic_content/>
                </div>
            </div>
        </div>
    </div>

</section>
