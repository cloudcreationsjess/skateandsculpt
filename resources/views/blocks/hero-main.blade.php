{{--
  Title: Hero Main
  Description: Hero Section with video or image and overlaying text
  Category: formatting
  Icon: welcome-view-site
  Keywords: hero main video image
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: true
  SupportsMultiple: true
--}}

<section class="hero-main">
    <div class='container'>
        <div class='media-container'>
            @if ( get_field('media_type') == 'image')
                {{ the_image( get_field('image')) }}
            @elseif ( get_field('media_type') == 'youtube')
                <iframe width="100%" height="797"
                    src="{{ str_replace('watch?v=', 'embed/', get_field('youtube_url')) }}?autoplay=1&mute=1&controls=0&playsinline=1&loop=1&showinfo=0&rel=0&modestbranding=1&fs=0"
                    frameborder="0">
                </iframe>
            @elseif ( get_field('media_type') == 'video')
                <video autoplay muted loop src='{{ get_field('video_file') }}'></video>
            @endif
        </div>
        <div class='hero-title'>
            <div class='color--{{ strtolower(str_replace(' ', '-', get_field('text_color'))) }}'  data-aos="fade-in" data-aos-anchor=".hero-main">
                {!! get_field('title') !!}
            </div>
        </div>
    </div>
</section>
