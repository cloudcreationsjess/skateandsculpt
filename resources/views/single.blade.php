@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        <div class="single_blog_container">
            <?php the_content(); ?>
        </div>
    @endwhile
@endsection
