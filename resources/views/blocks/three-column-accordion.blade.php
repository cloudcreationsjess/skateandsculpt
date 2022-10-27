{{--
  Title: Three Column Accordion
  Description: This is section with a 3 column accordion component with title
  Category: formatting
  Icon: menu
  Keywords: three column accordion
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="three-column-accordion" class="background-color--{{ get_field('background_color') }}">
    <div class="container">
        <div class="basic-heading">{!! get_field('heading') !!}</div>
        <div class="accordion">
            <div class="row">
                <?php $i = 1; ?>
                <?php while (have_rows('accordion')): the_row(); ?>
                <div class="accordion-item col-4">
                    <div class="accordion-header" id="heading--{{ $i }}">
                        <div role=button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                            <div class="accordion-button__bar">
                                <i class="accordion-icon plus" data-feather="plus"></i>
                                <i class="accordion-icon minus" data-feather="minus"></i>
                            </div>
                            <div class="accordion-button__heading">
                                <div class="number">{{ $i < 10 ? '0' . $i : $i }}</div>
                                <div class="all-caps-heading">{{ get_sub_field('all_caps_heading') }}</div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="heading--{{ $i }}">
                        <div class="accordion-body">
                            {{ get_sub_field('content') }}
                        </div>
                    </div>
                </div>
                    <?php $i++ ?>
                <?php endwhile; ?>
            </div>

        </div>
        @if( get_field('button') )
            @php($button = get_field('button'))
            <a class="btn btn--primary" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
        @endif
    </div>
</section>
