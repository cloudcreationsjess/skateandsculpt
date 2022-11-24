{{--
  Title: Single Column Basic Content
  Description: Basic content in a single column with background options
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

<section class="single-column-basic-content {{ $block['classes'] }} @if(get_field('class')) {{ get_field('class') }} @endif">
    @if(get_field('backgrounds')['green_squiggles'])
        <div class='green-squiggle-1'>
            <x-svg.squiggle />
        </div>
        <div class='green-squiggle-2'>
            <x-svg.squiggle-2 />
        </div>
    @endif
    @if(get_field('backgrounds')['green_blob'])
        <div class='green-blob'>
            <x-svg.green-blob />
        </div>
    @endif
    @if(get_field('top_border'))
        <div class='blue-border'></div>
    @endif
    <div class='container'>
        @if(get_field('single_column'))
            @php($column = get_field('single_column')['basic_content'])
            <x-basic-content :content="$column" />
        @endif
    </div>

    @if(get_field('next_section_arrow'))

        <div class='next-section-arrow'>
            <a href="#go-to-next-section">
                <x-svg.next-section-arrow />
            </a>
        </div>
    @endif


</section>
<div id="go-to-next-section"></div>
