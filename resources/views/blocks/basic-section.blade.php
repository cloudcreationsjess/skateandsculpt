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
  EnqueueStyle: styles/style.css
  EnqueueScript: scripts/script.js
  EnqueueAssets:
--}}

<section class="background-color-{{ get_field('background_color') }}">

    @if(have_rows('content'))

        <div class="content">

                <?php while (have_rows('content')): the_row(); ?>


            @if( get_row_layout() == 'spacer')
                @php($space = get_sub_field('space'))
                <div class="space-{{ $space }}"></div>
            @endif

            @if( get_row_layout() == 'heading')
                @php($text = get_sub_field('text'))
                <div class='heading'>{!! $text !!}</div>
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
                <a class="button-primary" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == 'underlined_text_link')
                @php($link = get_sub_field('text_link'))
                <a class="underlined-text-link" href='{{ $link['url'] }}'>{!! $link['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == "image")
                @php($img = get_sub_field('image'))
                <img src='{{ $img }}' alt='Green Source Nutrition'>
            @endif

            @if( get_row_layout() == "basic_content")
                @php($text = get_sub_field('text'))
                {{ $text }}
            @endif

            @if( get_row_layout() == "icon_list")
                @php($list_type = get_sub_field('icon_list_type'))
                @php($list_item = get_sub_field('list_item'))
                <ul class="icon-list">
                    @foreach($list_item as $item)
                        <li class="icon-list__item">
                            @if( $list_type == 'Icon List')
                                <div class="icon-list__icon">{{ the_image($item["icon"]) }}</div>
                            @endif
                            @if( $list_type == 'Colored Icon List' || 'Accordion Icon List')
                                <div class="icon-list__colored-icon">{{ the_image($item["icon"]) }}</div>
                            @endif
                            <div class="icon-list__content">
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
        </div>
    @endif
</section>
