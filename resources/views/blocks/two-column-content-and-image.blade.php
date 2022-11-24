{{--
  Title: Two Column Content and Image
  Description: Two Column Block with Basic Content on both sides
  Category: formatting
  Icon: menu
  Keywords: two column basic content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="two-column-content-and-image @if(get_field('class')) {{ get_field('class') }} @endif {{ $block['classes'] }}">
    @if(get_field('backgrounds') == "No Background")
    @endif
    @if(get_field('backgrounds') == "Purple Blobs")
        <div class='purple-blob--1'>
            <x-svg.purple-blob />
        </div>
        <div class='purple-blob--2'>
            <x-svg.purple-blob />
        </div>
    @endif
    @if(get_field('backgrounds') == "One Purple Blob")
        <div class='purple-blob--single'>
            <x-svg.purple-blob />
        </div>
    @endif
    @if(get_field('backgrounds') == "Green Blob")
        <div class='green-blob'>
            <x-svg.green-blob />
        </div>
    @endif
    @if(get_field('top_border'))
        <div class='blue-top-border'></div>
    @endif
    @if(get_field('bottom_border'))
        <div class='blue-bottom-border'></div>
    @endif
    <div class='container'>
        <div class='left-column'>
            @if(get_field('left_column'))
                @php($column = get_field('left_column')['basic_content'])
                <x-basic-content :content="$column" />
            @endif
        </div>
        <div class='right-column'>
            <div class='image-container'>
                @if(get_field('right_column'))
                    {{ the_image(get_field('right_column')['image']) }}
                @endif
            </div>
        </div>
    </div>
</section>
