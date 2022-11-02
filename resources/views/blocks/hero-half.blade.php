{{--
  Title: Hero Half
  Description: Hero Section with half image half content
  Category: formatting
  Icon: welcome-view-site
  Keywords: hero half image
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="hero-half" class="background-color--{{ get_field('background_color') }} {{ get_field('class') }}">
    <div class="row">
        <div class="col-md-6 align-self-center">
            <div class="basic-content">
                <x-basic_content />
            </div>
        </div>
        <div class="col-md-6">
            <div class="hero-image">
                <img src="{{ get_field('image') }}" alt="">
            </div>
        </div>
    </div>
</section>
