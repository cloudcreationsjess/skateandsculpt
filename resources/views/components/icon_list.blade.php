<ul class="icon-list">
    <?php $i = 1; ?>
    @foreach($flex as $item)
        <li class="icon-list__item">
            @if( $flex['icon_list_type'] == 'Icon List')
                <div class="icon-list__icon icon-list__icon__{{ $i }} fade-in animation-delay-{{ $i + 1 }}">{{ the_image($item["list_item"]["icon"]) }}</div>
            @endif
            @if( $flex['icon_list_type'] == 'Colored Icon List')
                <div class="icon-list__colored-icon icon-list__icon__{{ $i }} fade-in animation-delay-{{ $i + 1 }}">{{ the_image($item["list_item"]["icon"]) }}</div>
            @endif
            <div class="icon-list__content slide-in-left animation-delay-{{ $i + 1 }}">
                @if($item["list_item"])
                    <h5>{!! $item["title"] !!}</h5>
                    @if($item['accordion_content'])
                        <div class='js-accordion'>
                            <p>{!! $item['accordion_content'] !!}</p>
                        </div>
                    @endif
                @endif
            </div>
        </li>
            <?php $i++; ?>
    @endforeach
</ul>
