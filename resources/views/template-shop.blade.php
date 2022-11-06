{{--
  Template Name: Shop
--}}

@extends('layouts.app')

@section('content')
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php the_content(); ?>

    @php( $shop = get_field('shop_links') )
    @if( $shop )
        <section id="shop-page">

            @if( $shop['shop_link_one'] )
                <div class="shop-page__content">
                    <img class="shop-logo shop-logo-one" src="{{ $shop['shop_link_one']['logo'] }}" alt="Green Source Nutrition">
                    @if( $shop['shop_link_one']['button'] )
                        <a class="btn btn--primary" target="_blank" href='{{ $shop['shop_link_one']['button']['url'] }}'>{!! $shop['shop_link_one']['button']['call_to_action'] !!}</a>
                    @endif
                </div>
            @endif
            @if( $shop['shop_link_two'] )
                <div class="shop-page__content">
                    <img class="shop-logo" src="{{ $shop['shop_link_two']['logo'] }}" alt="Green Source Nutrition">
                    @if( $shop['shop_link_two']['button'] )
                        <a class="btn btn--primary" target="_blank" href='{{ $shop['shop_link_two']['button']['url'] }}'>{!! $shop['shop_link_two']['button']['call_to_action'] !!}</a>
                    @endif
                </div>
            @endif
        </section>
    @endif

    <?php endwhile;
    endif; ?>
@endsection
