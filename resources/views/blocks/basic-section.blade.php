{{--
  Title: Basic Section
  Description: This is a customizable basic text section with flexible content
  Category: formatting
  Icon: menu
  Keywords: basic section
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="basic-section" class="background-color--{{ get_field('background_color') }}">
    <div class="basic-section__container {{ get_field('width') == 'Wide' ? 'container' : '' }}">
        @if(have_rows('content'))

                <?php while (have_rows('content')): the_row(); ?>


            @if( get_row_layout() == 'spacer')
                @php($space = get_sub_field('space'))
                <div class="spacer" style="height: {{ $space }}px;"></div>
            @endif

            @if( get_row_layout() == 'heading')
                @php($text = get_sub_field('text'))
                <div class='basic-heading h1'>{!! $text !!}</div>
            @endif

            @if( get_row_layout() == 'script_heading')
                @php($text = get_sub_field('text'))
                <div class='script-heading'>{!! $text !!}</div>
            @endif

            @if( get_row_layout() == 'all_caps_heading')
                @php($text = get_sub_field('text'))
                <div class='all-caps-heading'>{!! $text !!}</div>
            @endif

            @if( get_row_layout() == 'button')
                @php($button = get_sub_field('button'))
                <a class="btn btn--primary" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == 'underlined_text_link')
                @php($link = get_sub_field('text_link'))
                <a class="underlined-text-link" href='{{ $link['url'] }}'>{!! $link['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == "two_images")
                @php($img = get_sub_field('image_left'))
                @php($img2 = get_sub_field('image_right'))
                <div class="two-images">
                    <div class="two-images__one">
                        <img src='{{ $img }}' alt='Green Source Nutrition'>
                    </div>
                    <div class="two-images__two">
                        <img src='{{ $img2 }}' alt='Green Source Nutrition'>
                    </div>
                </div>
            @endif

            @if( get_row_layout() == "basic_content")
                @php($text = get_sub_field('text'))
                {!! $text !!}
            @endif

            @if( get_row_layout() == "icon_list")
                @php($list_type = get_sub_field('icon_list_type'))
                @php($list_item = get_sub_field('list_item'))
                <ul class="icon-list">
                    @foreach($list_item as $item)
                        <li class="icon-list__item">
                            <div class="{{ $list_type == 'Icon List' ? 'icon-list__icon' : 'icon-list__colored-icon' }}">{{ the_image($item["icon"]) }}</div>
                            <div class="icon-list__content {{ $list_type == 'Icon List' ? 'icon-list__content--wide' : '' }}">
                                @if($item)
                                    <h5>{!! $item['title'] !!}</h5>
                                    @if( $item['accordion_content'] )
                                        <div class='js-accordion'>
                                            <p>{!! $item['accordion_content'] !!}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>

            @endif

            @if( get_row_layout() == "bullet_list")
                @php($list = get_sub_field('list'))
                <ul class="bullet-list">
                    @foreach($list as $item)
                        <li class="bullet-list__item">
                            {{ $item['text'] }}
                        </li>
                    @endforeach
                </ul>
            @endif

            <?php endwhile; ?>
        @endif
    </div>
</section>
