
<div class="image_and_content__container">
    <div class="image_container">
        @php($img = get_sub_field('image'))
        <img src="{{ $img }}" alt="">
    </div>
    <div class="content_container">
        @if( have_rows('flex_content') )

                <?php while ( have_rows('flex_content') ): the_row(); ?>
            @if( get_row_layout() == 'spacer')
                @php($space = get_sub_field('space'))
                <div class="spacer" style="height: {{ $space }}px;"></div>
            @endif

            @if( get_row_layout() == 'heading')
                @php($text = get_sub_field('text'))
                <div class='basic-heading h1'>{!! $text !!}</div>
            @endif

            @if( get_row_layout() == 'all_caps_heading')
                @php($text = get_sub_field('text'))
                <div class='all-caps-heading'>{!! $text !!}</div>
            @endif

            @if( get_row_layout() == 'button')
                @php($button = get_sub_field('button'))
                <a class="btn btn--primary" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == 'underlined_text_link')
                @php($link = get_sub_field('text_link'))
                <a class="underlined-text-link" href='{{ $link['url'] }}'>{!! $link['call_to_action'] !!}</a>
            @endif

            @if( get_row_layout() == "basic_content")
                @php($text = get_sub_field('text'))
                {!! $text !!}
            @endif

            <?php endwhile; ?>

        @endif

    </div>
</div>
