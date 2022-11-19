{{--
  Title: Two Column Content and Image
  Description: Block with two columns one for content and the other for an image with a purple circle background
  Category: formatting
  Icon: menu
  Keywords: banner two column
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="two-column-content-and-image">
    <div class='purple-blob'><x-svg.purple-blob /></div>
    <div class='container two-column-container'>
        <div class='left-column'>
            @if(get_field('left_column'))
                @php($left = get_field('left_column')['basic_content'])
                <x-basic-content :content="$left"/>
            @endif
        </div>
        <div class='right-column'>
            <div class='floating-image'>
                {!! the_image(get_field('right_column')['floating_image']) !!}
            </div>
        </div>
    </div>
</section>
