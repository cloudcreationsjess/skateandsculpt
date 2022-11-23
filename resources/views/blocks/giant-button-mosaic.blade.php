{{--
  Title: Giant Button Mosaic
  Description: A mosaic layout of giant buttons
  Category: formatting
  Icon: menu
  Keywords: single column basic content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="giant-button-mosaic">
    <div class='container'>
        <div class='mosaic'>
            @if(have_rows('giant_buttons'))
                @while(have_rows('giant_buttons'))
                    @php(the_row())

                    @if( get_row_layout() == 'button')
                        @php($text = get_sub_field('button_text'))
                        <div class='btn mosaic-btn btn--blue-pink'>{!! $text !!}</div>
                    @endif

                    @if( get_row_layout() == 'spinner')
                        <div class='spinning-circle'>
                            <x-svg.blue-squiggle-circle />
                        </div>
                    @endif

                @endwhile
            @endif
        </div>
    </div>
</section>
