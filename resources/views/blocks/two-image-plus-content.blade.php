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
  EnqueueStyle: styles/style.css
  EnqueueScript: scripts/script.js
  EnqueueAssets:
--}}

<section class="two-column">

    <div class='container'>
        <div class="row">
            <div class='two-column__one'>
                <div class="two-column__one__content">
                    @php( $content = get_field('content'))
                    @if( $content )
                        <div class='two-column__one__content__script-heading'>{!! $content['script_heading'] !!}</div>
                        <div class="two-column__one__content__text">{!! $content['text'] !!}</div>
                        <a class="two-column__one__content__button underlined-text-link" href='{{ $content['button']['url'] }}'>{!! $content['button']['call_to_action'] !!}</a>
                    @endif
                </div>
            </div>
            <div class="two-column__two">
                <img class="two-column__two__image" src='{{ the_field('image_left') }}' alt='Green Source Nutrition'>
                <img class="two-column__two__image" src='{{ the_field('image_right') }}' alt='Green Source Nutrition'>
            </div>
        </div>
    </div>

</section>
