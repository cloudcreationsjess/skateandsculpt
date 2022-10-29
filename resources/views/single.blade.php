@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())

        <div class="container">
            <?php the_content(); ?>
        </div>
    @endwhile
@endsection
