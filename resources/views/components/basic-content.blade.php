
@if( $content )
    @foreach( $content as $row)

            @if( $row['acf_fc_layout'] == 'spacer')
                @php($space = $row['space'])
                <div class="desktop spacer-{{$space['desktop']}}"></div>
                <div class="mobile spacer-{{$space['mobile']}}"></div>
            @endif

            @if( $row['acf_fc_layout'] == 'script_heading')
                @php($text = $row['text'])
                <div class='script-heading'>{!! $text !!}</div>
            @endif

            @if( $row['acf_fc_layout'] == 'all_caps_heading')
                @php($text = $row['text'])
                <div class='all-caps-heading'>{!! $text !!}</div>
            @endif

            @if( $row['acf_fc_layout'] == 'sub_heading')
                @php($text = $row['text'])
                <div class='sub-heading'>{!! $text !!}</div>
            @endif


            @if( $row['acf_fc_layout'] == 'button')
                @php($button = $row['button'])
                <a class="btn btn--{{ $button['button_color'] }}" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            @endif


            @if( $row['acf_fc_layout'] == "basic_text")
                @php($text = $row['text'])
                <div class='basic-text'>
                 {!! $text !!}
                </div>
            @endif


{{--            @if( $row["acf_fc_layout"] == "bullet_list")--}}
{{--                @php($list = $row['bullet_list'])--}}
{{--                <ul class="bullet-list">--}}
{{--                        <?php while (have_rows($list)): the_row(); ?>--}}
{{--                    <li class="bullet-list__item">--}}
{{--                        {{ $list['list_item'] }}--}}
{{--                    </li>--}}
{{--                    <?php endwhile; ?>--}}
{{--                </ul>--}}
{{--            @endif--}}

    @endforeach
@endif
