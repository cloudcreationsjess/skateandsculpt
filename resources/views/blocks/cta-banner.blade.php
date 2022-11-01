{{--
  Title: CTA Banner
  Description: This is CTA Banner block
  Category: formatting
  Icon: align-wide
  Keywords: CTA call banner
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="cta-banner">
    <div class="{{ get_field('size') == 'large' ? 'container-fluid' : 'container' }}">
        <div class="row">
            <div class="col-lg-8 p-0">
                <div class="cta-banner__container__image">
                    <img src="{{ the_field('image') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="cta-banner__container__content">
                    @php( $content = get_field('content') )
                    <div class="content__circle">{{ $content['circle_text'] }}</div>
                    <div class="all-caps-heading">{!! $content['all_caps_heading'] !!}</div>
                    <div class="basic-content">{{ $content['text'] }}</div>
                    <a href="{{ $content['button']['url'] }}" class="btn btn--primary">{{ $content['button']['call_to_action'] }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
