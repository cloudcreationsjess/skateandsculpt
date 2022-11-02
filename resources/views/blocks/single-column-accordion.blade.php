{{--
  Title: Single Column Accordion
  Description: An accordion block
  Category: formatting
  Icon: menu
  Keywords: accordion single column faq
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="single-column-accordion" class="background-color--{{ get_field('background_color') }}">
    <div class="container">
        <?php $i = 1; ?>
        <ul class="accordion-container">
            <?php while (have_rows('accordion')): the_row(); ?>
            <li class="accordion-item">
                <div class="accordion-header" id="heading--{{ $i }}">
                    <div role=button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-10">
                                <h5 class="all-caps-heading">{!! get_sub_field('all_caps_heading') !!}</h5>
                            </div>
                            <div class="col col-xs-2 align-self-end">
                                <i class="accordion-icon plus" data-feather="plus"></i>
                                <i class="accordion-icon minus" data-feather="minus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="heading--{{ $i }}">
                    <p class="accordion-content-text">{!! get_sub_field('text') !!}</p>
                    @php( $btn = get_sub_field('button'))
                    @if( $btn )
                        <a class="btn btn--primary" href="{{ $btn['url'] }}">{{ $btn['call_to_action'] }}</a>
                    @endif
                </div>
            </li>
                <?php $i++ ?>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
