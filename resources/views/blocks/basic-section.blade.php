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

<section id="basic-section" class="background-color--{{ get_field('background_color') }}">
    <div class="basic-section__container {{ get_field('width') == 'Wide' ? 'container' : '' }} {{ get_field('class') }}">
      <x-basic_content />
    </div>
</section>
