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

<section class="cta-banner cta-banner-size__{{ get_field('size') }}">
    <div class="cta_banner__inner">
        <div class="cta-banner__container__image">
            <img src="{{ the_field('image') }}" alt="">
        </div>
        <div class="cta-banner__container__content">
            @php( $content = get_field('content') )
            <div class="content__circle-wrapper">
                <div class="content__circle">{{ $content['circle_text'] }}</div>
            </div>
            <div class="all-caps-heading">{!! $content['all_caps_heading'] !!}</div>
            @if($content['text'])
            <div class="basic-content">{{ $content['text'] }}</div>
            @endif
            <a href="{{ $content['button']['url'] }}" class="btn btn--primary">{{ $content['button']['call_to_action'] }}</a>
        </div>
    </div>
</section>
