@extends('layouts.app')

@section('content')

    <section id="blog-hero" class="background-color--grey">
        <div class="row">
            <div class="col-6">
                <div class="column-one__container">
                    <img src="{{ get_the_post_thumbnail_url() }}" alt="Green Source Nutrition">
                </div>
            </div>
            <div class="col-6 align-self-center">
                <div class="column-two__container">
                    <div class="blog-title basic-heading">{!! get_the_title() !!}</div>
                    <div class="blog-preview-text basic-content">{!! get_field('preview_text') !!}</div>
                    <a class="underlined-text-link" href="{{ get_permalink() }}">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <?php
        $recentPostPerma = get_permalink();
        ?>
    <section id="blog-filter">
        <div class="blog-filter">
            {!! do_shortcode('[searchandfilter id="913"]') !!}
        </div>
    </section>

    <?php
        global $posts;
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $posts_per_page = 12;
        $categories = get_categories();

        $params = [
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'posts_per_page'   => $posts_per_page,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'paged'            => $paged,
            'search_filter_id' => 913,
        ];

        query_posts($params);

    ?>


    <section id="blog-posts">
        <div class="container">
            <div class="blog-list">
                <div class="row">
                    @if(have_posts())
                        @while(have_posts())
                            @php(the_post())
                                <?php
                                $id = get_the_ID();
                                $cats = get_the_category($id);
                                $name = $cats[0]->name;
                                ?>

                        @if(get_the_permalink() !== $recentPostPerma)
                            <div class="col-4">
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
                            @endif
                        @endwhile
                </div>
            </div>
        </div>
    </section>


    <!-- Pagination -->
    <div class="row justify-content-center">
        <div class="col-auto">
                <?php
                global $wp_query;
                global $page, $numpages, $multipage, $more;

                if ( is_singular() ) {
                    $page_key = 'page';
                    $paged = $page;
                    $max = $numpages;
                } else {
                    $page_key = 'paged';
                    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
                    $max = $wp_query->max_num_pages;
                }

                $big = 999999999; // need an unlikely integer
                $output = '<div class="pagination">';
                $output .= paginate_links(array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $max,
                    //$q is your custom query
                    'prev_text' => __('<i class="fas fa-angle-left"></i>'),
                    'next_text' => __('<i class="fas fa-angle-right"></i>'),
                    //        'add_args' => array('boat_type'=>$boat_type,'no_of_passengers'=>$number_of_passengers)
                ));
                $output .= '</div><!-- navigation ENDS -->';
                if ( $max > 1 ) {
                    echo $output;
                }
                ?>
        </div>
    </div>
    @else
        <h2>No Posts Found</h2>
    @endif

    @php(wp_reset_query())

@endsection
