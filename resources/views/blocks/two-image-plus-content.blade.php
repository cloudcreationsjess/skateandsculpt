{{--
  Title: Two Column Images with Content
  Description: This is section with content in one column and two images in the other
  Category: formatting
  Icon: menu
  Keywords: two column images content
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
  EnqueueAssets:
--}}

<section class="two-column">

    <div class="two-column__container">
        <div class="column-one__content">
            @php( $content = get_field('content'))
            @if( $content )
                <div class="script-heading">{!! $content['script_heading'] !!}</div>
                <div class="basic-content">{!! $content['text'] !!}</div>
                <a class="underlined-text-link" href='{{ $content['button']['url'] }}'>{!! $content['button']['call_to_action'] !!}</a>
            @endif
        </div>

        <div class="column-two__container">
            <div class="two-column__image-one">
                <img class="" src='{{ the_field('image_left') }}' alt='Green Source Nutrition'>
                <div class="spinning-logo__container">
                    <img class="spinning-logo" src='{{ the_field('spinning_logo') }}' alt='Green Source Nutrition'>
                </div>
            </div>
            <div class="two-column__image-two">
                <img class="" src='{{ the_field('image_right') }}' alt='Green Source Nutrition'>
            </div>
        </div>
    </div>

</section>
