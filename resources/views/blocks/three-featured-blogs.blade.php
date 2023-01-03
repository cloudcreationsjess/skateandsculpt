{{--
  Title: Three Featured Blogs
  Description: Block with a title above three featured blogs
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

<section class="three-featured-blogs">
    <div class='blue-border'></div>
    <div class='container'>
        <div class='all-caps-heading'  data-aos="fade-in">
            {!! get_field('title') !!}
        </div>
        <div class='featured-blogs'>
            @php($featured_posts = get_field('featured_blogs'))
            @if( $featured_posts )
                @foreach( $featured_posts as $post)
                    @php($permalink = get_permalink( $post->ID ))
                    @php($title = get_the_title( $post->ID ))
                    @php($image = get_the_post_thumbnail( $post->ID ))
                    <div class='featured-post'  data-aos="fade-in">
                        <a class="" href="{{ $permalink }}">
                            <div class='post-image'>
                                {!! $image !!}
                            </div>
                        </a>
                        <a class="post-title-link" href="{{ $permalink }}">
                            <div class='post-title'>
                                {!! $title !!}
                            </div>
                        </a>
                        <a class="post-button btn btn--lime-orange" href="{{ $permalink }}">read</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
