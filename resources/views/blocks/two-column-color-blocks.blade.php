{{--
  Title: Two Column Color Blocks
  Description: Two column, full-width block with image and colored block with content
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

<section class="two-column-color-blocks">
    <div class='left-container background-color--{{ get_field('left_column')['block_background_color'] }}'>
        <div class='left-content'>
            @if(get_field('left_column'))
                @php($left = get_field('left_column')['basic_content'])
                <x-basic-content :content="$left"/>
            @endif
        </div>
    </div>
    <div class='right-container'>
        <div class='right-content'>
            {{ the_image(get_field('right_column')['image']) }}
        </div>
    </div>
</section>
