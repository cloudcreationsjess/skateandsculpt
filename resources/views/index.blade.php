@extends('layouts.app')

@section('content')

    <?php
        global $posts;
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $posts_per_page = 16;
        $categories = get_categories();

        $params = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'paged'          => $paged,
        ];

        query_posts($params);
    ?>
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


    @if(have_posts())
        @while(have_posts())
            @php(the_post())
            <section id="blog-posts">
                <div class="container">
                    <div class="blog-filter">
                        <p>FILTER:</p>
                        <ul>
                            @foreach($categories as $category)
                                <li>
                                    <a href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-list"></div>
                </div>
            </section>
        @endwhile

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
