{{--
  Title: Color Block
  Description: Content in a colored block
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


<section class="single-column-colored-block {{ $block['classes'] }}">
    <div class='container'>
        <div class='colored-block @if(get_field('background_color')) background-color--{{ get_field('background_color') }} @endif'>
            @if(get_field('block_content'))
                @php($column = get_field('block_content')['basic_content'])
                <x-basic-content :content="$column" />
            @endif
        </div>
    </div>
</section>
