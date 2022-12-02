@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        <section class="cities-hero">
            <div class='blue-border blue-top-border'></div>
            <div class='container'>
                <div class='left-column'>
                    <div class='script-heading color--blue'>
                        {{ get_the_title() }}
                    </div>
                    <div class='rink-name'>
                        <div class='sub-heading color--blue'> {!! get_field('rink_name') !!}</div>
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
                    <div class='next-section-arrow'>
                        <a href="#go-to-next-section">
                            <x-svg.lime-orange-arrow />
                        </a>
                    </div>
                </div>
                <div class='right-column'>
                    <div class='city-featured-image'>
                        {!! get_the_post_thumbnail() !!}
                    </div>
                </div>
            </div>
            <div id="go-to-next-section"></div>
        </section>


        <section class="giant-playlist-button">
            <div class='container'>
                <a href='{{get_field('city_playlist_link')}}'>Listen: {{get_the_title()}} Playlist</a>
            </div>
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

        @if(get_field('safety_protocol', 'option'))
            @php($safety = get_field('safety_protocol', 'option'))
            <section class="terms-block terms-block-cities">
                <div class='container'>
                    <div class='left-column'>
                        <div class='all-caps-heading color--blue'>{!! $safety['title'] !!}</div>
                    </div>
                    <div class='right-column'>
                        <div class='basic-text'>
                            {!! $safety['the_protocol'] !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @php($previous = get_previous_post())
        @php($next = get_next_post())



        <div class='container'>
            <div class='city-post-navigation'>
                <div class='city previous-city @if($next){{'city-active'}}@endif'>
                    <a href='{{get_permalink($next)}}'>
                        <x-svg.lime-orange-arrow />{{ get_the_title($next) }}

                    </a>
                </div>
                <div class='city next-city @if($previous){{'city-active'}}@endif'>
                    <a href='{{get_permalink($previous)}}'>
                        {{ get_the_title($previous) }}
                        <x-svg.lime-orange-arrow />
                    </a>
                </div>
            </div>
        </div>

        @if ( get_field('fixed_button', 'option') )
            <div class='cities-fixed-button fixed-button'>
                @php($button = get_field('fixed_button', 'option'))
                <a href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            </div>
        @endif

    @endwhile
@endsection
@php(wp_reset_query())
