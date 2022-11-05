{{--
  Title: Testimonials
  Description: This is a testimonials section
  Category: formatting
  Icon: admin-users
  Keywords: testimonials
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
  EnqueueAssets:
--}}

<section class="testimonials">

    <div class="testimonials__container">
        <div class="testimonials__box">
            <div class="row">
                <div class="col-lg-6 justify-content-center pl-lg-3">
                    @if( have_rows('testimonials'))
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                    <?php while (have_rows('testimonials')): the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="swiper-slide__content">
                                        <div class="swiper-slide__content__text">
                                            {{ get_sub_field('text') }}
                                        </div>
                                        <div class="swiper-slide__content__name">
                                            {{ get_sub_field('name') }}
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                    <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                            </div>

                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="testimonials__box__image">
                        <img src="{{ get_field('image') }}" alt="Green Source Nutrition">
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
