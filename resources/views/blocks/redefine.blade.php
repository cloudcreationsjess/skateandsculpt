{{--
  Title: Redefine Block
  Description: Block with squiggle background, title, text, cta and image
  Category: formatting
  Icon: menu
  Keywords: redefine image title
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="redefine-block {{ get_field('class') }} {{ $block['classes'] }}">
    <div class='green-squiggle-1'><x-svg.squiggle /></div>
    <div class='green-squiggle-2'><x-svg.squiggle /></div>
    <div class='container'  data-aos="fade-in" data-aos-anchor-placement="top-center">
        <div class='redefine-title'>
                {!! get_field('heading') !!}
        </div>
        <div class='redefine-bottom'>
            <div class='content'>
                <div class='basic-content'>
                    {!! get_field('content') !!}
                </div>
                <x-button />
            </div>
            <div class='image'>
                {{ the_image( get_field('image')) }}
            </div>
        </div>
    </div>
</section>
