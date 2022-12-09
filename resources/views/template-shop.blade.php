{{--
  Template Name: Shop
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        <section class="shop-coming-soon">
            <div class='purple-blob'>
                <x-svg.purple-blob />
            </div>
            <div class='container'>
                <div class='blue-border blue-top-border'></div>
                <div class='left-column'>
                    @if(get_field('left_column'))
                        @php($left = get_field('left_column')['basic_content'])
                        <x-basic-content :content="$left" />
                    @endif
                    @if(get_field('subscribe_form_shortcode'))
                        {!! do_shortcode(get_field('subscribe_form_shortcode')) !!}
                    @endif
                </div>
                <div class='right-column'>
                    <div class='shop-image'>
                        {{ the_image(get_field('right_column')['image']) }}
                    </div>
                </div>
            </div>
        </section>
    @endwhile
@endsection
