{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <section id="contact-page-hero">
        <div class="contact-page__section-one background-color--cream">
            <div class="contact-page__section-one__inner">
                <div class="contact-page__section-one__content">
                    <div class="script-heading">{!! get_field('script_heading') !!}</div>
                    <div class="basic-heading">{!! get_field('heading') !!}</div>
                    <div class="section-one-inner desktop-display">
                        <div class="all-caps-heading ">{!! get_field('all_caps_heading') !!}</div>
                        <div class="basic-content">
                            {!! get_field('content_one') !!}
                        </div>
                    </div>
                </div>
                <div class="contact-page__section-one__images">
                    <div class="contact-page__image-one">
                        <img class="" src="{{ get_field('image_one') }}" alt="Green Source Nutrition">
                    </div>
                    <div class="contact-page__image-two">
                        <img class="" src="{{ get_field('image_two') }}" alt="Green Source Nutrition">
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-page__section-two background-color--white">
            <div class="contact-page__section-two__inner">
                <div class="contact-page__section-two__content">
                    <div class="all-caps-heading mobile-display">{!! get_field('all_caps_heading') !!}</div>
                    <div class="mobile-display">{{ get_field('content_one') }}</div>
                    <div class="basic-content">
                        {!! get_field('content_two') !!}
                    </div>
                    <a class="btn btn--primary" href="{{ get_field('button')['url'] }}">{{ get_field('button')['call_to_action'] }}</a>
                </div>
                <div class="contact-page__section-two__image">
                    <img src="{{ get_field('image_three') }}" alt="Green Source Nutrition">
                </div>
            </div>
        </div>
    </section>

    <section id="contact-page-form" class="background-color--cream">
        <div class="container">
            <div class="contact-page-form">
                <div class="basic-heading">{!! get_field('heading_two') !!}</div>
                <div class="all-caps-heading">{!! get_field('all_caps_heading_two') !!}</div>
                {!! do_shortcode('[contact-form-7 id="982" title="Contact form"]') !!}
            </div>
        </div>
    </section>


        <?php the_content(); ?>

    <?php endwhile;
    endif; ?>
@endsection
