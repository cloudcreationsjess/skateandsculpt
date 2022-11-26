@extends('layouts.app')

@section('content')
    <section id="error404" class="single-column-basic-content">
        <div class='blue-top-border'></div>
        <div class='green-squiggle-1'>
            <x-svg.squiggle />
        </div>
        <div class='green-squiggle-2'>
            <x-svg.squiggle-2 />
        </div>
        <div class="container">
            <div class='error-404-content'>
                <div class='missing-page-image'>{{ the_image(get_field('missing_page', 'option')['missing_page_image']) }}</div>
                <div class='script-heading color--orange'>{!! get_field('missing_page', 'option')['missing_page_script_heading'] !!}</div>
                <div class='sub-heading color--orange'>{!!get_field('missing_page', 'option')['missing_page_sub_heading'] !!}</div>
                <a class="btn btn--orange-outline" href='{{ get_field('missing_page', 'option')['missing_page_button']['url'] }}'>{{ get_field('missing_page', 'option')['missing_page_button']['call_to_action'] }}</a>
            </div>
        </div>
    </section>
@endsection
