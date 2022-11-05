@php($list_item = get_sub_field('list_item'))
<ul class="icon-list">
    <?php $i = 1; ?>
    @foreach($list_item as $item)
        <li class="icon-list__item">
            <div class="icon-list__colored-icon">{{ the_image($item["icon"]) }}</div>
            <div class="icon-list__content">
                @if($item)
                    <div class="accordion-header" id="heading--{{ $i }}">
                        <div role=button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                            <h5>{!! $item['title'] !!}</h5>
                        </div>
                    </div>
                    @if( $item['accordion_content'] )
                        <div class="accordion-header" id="heading--{{ $i }}">
                            <div role=button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                                <span class="accordion-icon plus" >+</span>
                                <span class="accordion-icon minus">-</span>
                            </div>
                        </div>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="heading--{{ $i }}">
                            <p class="accordion-content-text">{!! $item['accordion_content'] !!}</p>
                        </div>
                    @endif
                @endif
            </div>
        </li>
            <?php $i++ ?>
    @endforeach
</ul>
