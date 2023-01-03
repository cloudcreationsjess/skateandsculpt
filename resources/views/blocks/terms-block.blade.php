{{--
  Title: Terms Block
  Description: Title and content in terms style
  Category: formatting
  Icon: menu
  Keywords: terms block two column
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="terms-block {{ $block['classes'] }}">
    @if(get_field('border_top'))
        <div class='blue-top-border'></div>
    @endif
    @if(get_field('border_bottom'))
        <div class='blue-bottom-border'></div>
    @endif
    <div class='container'>
        <div class='left-column' data-aos="fade-in">
            @if(get_field('left_column'))
                @php($left = get_field('left_column')['basic_content'])
                <x-basic-content :content="$left"/>
            @endif
        </div>
        <div class='right-column' data-aos="fade-in">
            @if (get_field('right_column'))
                @php($right = get_field('right_column')['basic_content'])
                <x-basic-content  :content="$right"/>
            @endif
        </div>
    </div>
</section>
