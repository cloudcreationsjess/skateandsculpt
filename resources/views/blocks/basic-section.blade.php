{{--
  Title: Basic Section
  Description: This is a customizable basic text section with flexible content
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

<section class="basic-section background-color--{{ get_field('background_color') }}">
    <div class="{{ get_field('width') == 'Wide' ? 'basic-section__container--wide' : (get_field('width') == 'Medium' ? 'basic-section__container--medium' : 'basic-section__container') }} {{ get_field('class') }}">
      <x-basic_content />
    </div>
</section>
