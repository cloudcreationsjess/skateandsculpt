{{--
  Title: Number List
  Description: This is section with an image in one column and number list in the other
  Category: formatting
  Icon: editor-ol
  Keywords: number list
  Mode: edit
  Align: center
  PostTypes:
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="number-list">

    <div class='container'>
        <div class="number-list__container">
            <div class='number-list__one'>
                <div class="number-list__one__image">
                    <img src='{{ get_field('image') }}' alt="Green Source Nutrition">
                </div>
            </div>
            <div class="number-list__two">
                <ol class="number-list__numbered-list">
                    <?php $i = 1; ?>
                    <?php while (have_rows('number_list_items')): the_row(); ?>
                    <li class="number-list__numbered-list__item">
                        <div class="number-list__numbered-list__item__number">{{ $i }}.</div>
                        <div class="number-list__numbered-list__item__content">
                            <div class="all-caps-heading">{!! get_sub_field('all_caps_heading') !!}</div>
                            <div class="text-content">{!! get_sub_field('text') !!}</div>
                            @if( get_sub_field('add_button') )
                                @php($button = get_sub_field('button'))
                                <a class="btn btn--primary" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
                            @endif
                        </div>
                    </li>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                </ol>

            </div>
        </div>
    </div>

</section>
