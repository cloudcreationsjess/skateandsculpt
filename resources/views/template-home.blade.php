{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>


    <?php endwhile; endif; ?>
@endsection
