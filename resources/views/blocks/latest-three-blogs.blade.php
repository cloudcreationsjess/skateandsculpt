{{--
  Title: Latest 3 Blogs
  Description: Block with 3 latest blogs and a title
  Category: formatting
  Icon: menu
  Keywords: blog latest posts
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php
    global $posts;
    $posts_per_page = 3;
    $categories = get_categories();
    $id = get_the_ID();
    $cats = get_the_category($id);
    $name = $cats[0]->name;

    $params = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',

    ];

    query_posts($params);

?>

</div>
<section class="latest-blogs">
    <div class="latest-blogs__container">
        <div class="basic-heading">{!! get_field('title') !!}</div>
        <div class="desktop latest-blogs__item">
                @if(have_posts())
                    @while(have_posts())
                        @php(the_post())
                            <div class="blog-posts__single">
                                <a href="{{ get_the_permalink() }}">
                                    <div class="featured-image">
                                        <img src="{{ get_the_post_thumbnail_url() }}" alt="Green Source Nutrition">
                                    </div>
                                    <div class="category"><span>{{ $cats[0]->name }}</span></div>
                                    <div class="title">{!! get_the_title() !!}</div>
                                </a>
                            </div>
                    @endwhile
                @endif
        </div>
        <div class="mobile">
            @if(have_posts())
                <div class="swiper-2">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @while(have_posts())
                            @php(the_post())
                            <div class="swiper-slide">
                                <div class="blog-posts__single">
                                    <a href="{{ get_the_permalink() }}">
                                        <div class="featured-image">
                                            <img src="{{ get_the_post_thumbnail_url() }}" alt="Green Source Nutrition">
                                        </div>
                                        <div class="category"><span>{{ $cats[0]->name }}</span></div>
                                        <div class="title">{!! get_the_title() !!}</div>
                                    </a>
                                </div>
                            </div>
                        @endwhile
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            @endif
        </div>
</section>
<div>

@php(wp_reset_query())
