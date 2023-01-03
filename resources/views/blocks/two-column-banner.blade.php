{{--
  Title: Two Column Banner
  Description: Full width banner with two columns of content inside
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

<section class="two-column-banner"  data-aos="fade-in">
    <div class='container'>
        <div class='banner background-color--{{ get_field('background_color') }}'>
            <div class='left-column'>
                @if(get_field('left_column'))
                    @php($left = get_field('left_column')['basic_content'])
                    <x-basic-content :content="$left"/>
                @endif
            </div>
            <div class='right-column'>
                @if (get_field('right_column'))
                    @php($right = get_field('right_column')['basic_content'])
                    <x-basic-content  :content="$right"/>
                @endif
            </div>
        </div>
    </div>
</section>
