{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section id="faq">
        <div class="container">
            <div class="faq-hero">
                <div class="row">
                    <div class="col-6">
                        <div class="faq-hero__content">
                            <div class="basic-heading">
                                {!! get_field('heading') !!}
                            </div>
                            <div class="basic-content">
                                {!! get_field('text') !!}
                            </div>
                            @php( $btn = get_field('button'))
                            <a class="btn btn--primary" href="{{ $btn['url'] }}">{{ $btn['call_to_action'] }}</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="faq-hero__image">
                            <img src="{{ get_field('image') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-accordion">
                    <?php $i = 1; ?>
                <ul class="accordion-container">
                        <?php while (have_rows('accordion')): the_row(); ?>
                    <li class="accordion-item">
                        <div class="accordion-header" id="heading--{{ $i }}">
                            <div role=button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <div class="number">{{ $i }}.</div>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <h5 class="all-caps-heading">{!! get_sub_field('all_caps_heading') !!}</h5>
                                    </div>
                                    <div class="col align-self-center">
                                        <i class="accordion-icon plus" data-feather="plus"></i>
                                        <i class="accordion-icon minus" data-feather="minus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="heading--{{ $i }}">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-10">
                                    <p class="accordion-content-text">{!! get_sub_field('text') !!}</p>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </li>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>


        <?php the_content(); ?>

    <?php endwhile;
    endif; ?>
@endsection
