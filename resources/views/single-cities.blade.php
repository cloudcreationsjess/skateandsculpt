@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        <section class="cities-hero">
            <div class='blue-border blue-top-border'></div>
            <div class='container'>
                <div class='left-column'>
                    <div class='script-heading'>
                        {{ get_the_title() }}
                    </div>
                    <div class='rink-name'>
                        {!! get_field('rink_name') !!}
                    </div>
                    <div class='city-characteristics'>
                        @if( have_rows('characteristics') )
                            @while( have_rows('characteristics') )
                                @php(the_row())
                                <div class='prompt'>
                                    {!! get_sub_field('prompt') !!}
                                </div>
                                <div class='answer'>
                                    {!! get_sub_field('answer') !!}
                                </div>
                            @endwhile
                        @endif
                    </div>
                </div>
                <div class='right-column'>
                    <div class='city-featured-image'>
                        {!! get_the_post_thumbnail() !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="giant-playlist-button">
            <a href='{{get_field('city_playlist_link')}}'>Listen: {{get_the_title()}} Playlist</a>
        </section>


        <section class="orange-coach-slider">
            @php($cityID = get_the_ID())
            <x-coach-slider :cityID="$cityID" />
        </section>

        @if ( get_field('button') )
            <div class='fixed-button'>
                @php($button = get_field('button'))
                <a href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            </div>
        @endif

    @endwhile
@endsection
@php(wp_reset_query())
