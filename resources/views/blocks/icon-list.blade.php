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
        <?php $i = 1; ?>
        @foreach($list_item as $item)
            <li class="icon-list__item">
                <div class="{{ $list_type == 'Icon List' ? 'icon-list__icon' : 'icon-list__colored-icon' }}">{{ the_image($item["icon"]) }}</div>
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
                                    <i class="accordion-icon plus" data-feather="plus"></i>
                                    <i class="accordion-icon minus" data-feather="minus"></i>
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
</section>
