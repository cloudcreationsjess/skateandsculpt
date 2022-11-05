{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section id="faq">
        <div class="faq-hero">
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

            <div class="faq-hero__image">
                <img src="{{ get_field('image') }}" alt="">
            </div>

        </div>
        <div class="faq-accordion">
                <?php $i = 1; ?>
            <ul class="accordion-container">
                    <?php while (have_rows('accordion')): the_row(); ?>
                <li class="accordion-item">
                    <div role=button class="accordion-header accordion-button collapsed" id="heading--{{ $i }}" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                        <div class="number">{{ $i }}.</div>
                        <div class="accordion__content">
                            <h5 class="all-caps-heading">{!! get_sub_field('all_caps_heading') !!}</h5>
                            <div id="collapse{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="heading--{{ $i }}">
                                {!! get_sub_field('text') !!}
                            </div>
                        </div>
                        <div class="accordion__icon-container">
                            <i class="accordion-icon plus" data-feather="plus"></i>
                            <i class="accordion-icon minus" data-feather="minus"></i>
                        </div>
                    </div>
                </li>
                    <?php $i++ ?>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>


        <?php the_content(); ?>

    <?php endwhile;
    endif; ?>
@endsection
