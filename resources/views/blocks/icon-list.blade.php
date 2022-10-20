{{--
  Title: Icon List
  Description: This is icon list block
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

<section id="icon-list" class="background-color--{{ get_field('background_color') }}">
        @php($list_type = get_sub_field('icon_list_type'))
        @php($list_item = get_sub_field('list_item'))
        <ul class="icon-list">
            @foreach($list_item as $item)
                <li class="icon-list__item">
                    <div class="{{ $list_type == 'Icon List' ? 'icon-list__icon' : 'icon-list__colored-icon' }}">{{ the_image($item["icon"]) }}</div>
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
</section>
