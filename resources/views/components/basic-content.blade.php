@if( $content )
    @foreach( $content as $row)

        @if( $row['acf_fc_layout'] == 'spacer')
            @php($space = $row['space'])
            <div class="spacer desktop" style="height: {{ $space['desktop'] }}px"></div>
            <div class="spacer mobile" style="height: {{ $space['mobile'] }}px"></div>
        @endif

        @if( $row['acf_fc_layout'] == 'script_heading')
            @php($text = $row['text'])
            <div class='script-heading color--{{$row['text_color']}}'>{!! $text !!}</div>
        @endif

        @if( $row['acf_fc_layout'] == 'all_caps_heading')
            @php($text = $row['text'])
            @php($color = $row['text_color'])
            <div class='all-caps-heading color--{{$row['text_color']}}'>{!! $text !!}</div>
        @endif

        @if( $row['acf_fc_layout'] == 'sub_heading')
            @php($text = $row['text'])
            <div class='sub-heading color--{{$row['text_color']}}'>{!! $text !!}</div>
        @endif


        @if( $row['acf_fc_layout'] == 'button')
            @php($button = $row['button'])
            <a class="btn btn--{{ $button['button_color'] }}" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
        @endif


        @if( $row['acf_fc_layout'] == "basic_text")
            @php($text = $row['text'])
            <div class='basic-text color--{{$row['text_color']}}'>
                {!! $text !!}
            </div>
        @endif


        @if( $row["acf_fc_layout"] == "bullet_list")
            @php($list = $row['bullet_list'])
            <ul class="bullet-list color--{{$row['text_color']}}">
                @if($list)
                    @foreach($list as $item)
                        <li class="bullet-list__item">
                            {{ $item['list_item'] }}
                        </li>
                    @endforeach
                @endif
            </ul>
        @endif

        @if( $row['acf_fc_layout'] == "image")
            @php($text = $row['image'])
            <div class='basic-image'>
                {{ the_image() }}
            </div>
        @endif

    @endforeach
@endif
