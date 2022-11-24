{{--
  Title: Two Color Blocks
  Description: Content in a two colored blocks side by side
  Category: formatting
  Icon: menu
  Keywords: two color blocks block
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="two-colored-blocks {{ $block['classes'] }}">
    <div class='container'>
        <div class='colored-blocks'>
            <div class='left-colored-block background-color--{{ get_field('left_block')['background_color'] }}'>
                @if(get_field('left_block'))
                    @php($left = get_field('left_block')['basic_content'])
                    <x-basic-content :content="$left" />
                @endif
            </div>
            <div class='right-colored-block background-color--{{ get_field('right_block')['background_color'] }}'>
                @if(get_field('right_block'))
                    @php($right = get_field('right_block')['basic_content'])
                    <x-basic-content :content="$right" />
                @endif
            </div>
        </div>
    </div>
</section>
