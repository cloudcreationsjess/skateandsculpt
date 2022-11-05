{{--
  Title: Overlap Logo
  Description: This is basic section with overlapping logo and quote author
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

<section id="overlap-logo" class="background-color--{{ get_field('background_color') }}">
    @if( get_field('overlap_logo_check') )
        <div class="overlap-logo">
            <img src="{{ get_field('overlap_logo') }}" alt="">
        </div>
    @endif
    <div class="overlap-logo__container">
        <div class='basic-heading h1'>{!! get_field('quote') !!}</div>
        @if( get_field('quote_author_check') )
            <div class="quote-author">
                {!! get_field('quote_author') !!}
            </div>
        @endif
    </div>
</section>
