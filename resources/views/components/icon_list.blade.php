@php($list_type = get_sub_field('icon_list_type'))
@php($list_item = get_sub_field('list_item'))
<ul class="icon-list">
    @foreach($list_item as $item)
        <li class="icon-list__item">
            <div class="{{ $list_type == 'Icon List' ? 'icon-list__icon' : 'icon-list__colored-icon' }}">{{ the_image($item["icon"]) }}</div>
            <div class="icon-list__content {{ $list_type == 'Icon List' ? 'icon-list__content--wide' : '' }}">
                @if($item)
                    @if( $list_type != 'Icon List')
                        <h5>
                            {!! $item['title'] !!}
                        </h5>

                        @else
                            <p>{!! $item['title'] !!}</p>
                    @endif

                @endif
            </div>
        </li>
    @endforeach
</ul>
