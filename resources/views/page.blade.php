
@extends('layouts.app')

@section('content')
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

    <button data-ripple-light="true">Material Ripple</button>


    <?php endwhile; endif; ?>

@endsection

