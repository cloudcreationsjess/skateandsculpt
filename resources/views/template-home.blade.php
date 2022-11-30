{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

    @if ( get_field('fixed_button', 'option') )
        <div class='fixed-button'>
            @php($button = get_field('fixed_button', 'option'))
            <a href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
        </div>
    @endif
    <?php endwhile; endif; ?>
@endsection
