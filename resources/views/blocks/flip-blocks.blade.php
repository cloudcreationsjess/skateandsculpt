{{--
  Title: Flip Blocks
  Description: Content in a colored block with image that reverses direction
  Category: formatting
  Icon: menu
  Keywords: flip blocks
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="flip-blocks {{ $block['classes'] }}">
    <div class='container'>
        @php($block = 'flip_block')
        @if(have_rows($block))
            @while(have_rows($block))
                @php(the_row())
                <div class='flip-block'>
                    <div class='colored-block background-color--{{ get_sub_field('background_color') }}'>
                        @php($cube = get_sub_field('cube_content'))
                        <div class='script-heading'>{!! $cube['script_heading'] !!}</div>
                        <div class='basic-text'>{!! $cube['text'] !!}</div>
                        @if($cube['add_button'])
                            <a class="btn btn--{{ $cube['button']['button_color'] }}" href='{{ $cube['button']['url'] }}'>{!! $cube['button']['call_to_action'] !!}</a>
                        @endif
                    </div>
                    <div class='image-block'>
                        {{ the_image(get_sub_field('image')) }}
                    </div>
                </div>
            @endwhile
        @endif
    </div>
</section>
