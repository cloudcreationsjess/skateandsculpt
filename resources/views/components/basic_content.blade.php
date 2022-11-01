@if(have_rows('content'))

        <?php while (have_rows('content')): the_row(); ?>


    @if( get_row_layout() == 'spacer')
        @php($space = get_sub_field('space'))
        <div class="spacer--{{$space}}"></div>
    @endif

    @if( get_row_layout() == 'heading')
        @php($text = get_sub_field('text'))
        <div class='basic-heading h1'>{!! $text !!}</div>
    @endif

    @if( get_row_layout() == 'script_heading')
        @php($text = get_sub_field('text'))
        <div class='script-heading'>{!! $text !!}</div>
    @endif

    @if( get_row_layout() == 'all_caps_heading')
        @php($text = get_sub_field('text'))
        <div class='all-caps-heading'>{!! $text !!}</div>
    @endif

    @if( get_row_layout() == 'button')
        <x-button/>
    @endif

    @if( get_row_layout() == 'underlined_text_link')
        @php($link = get_sub_field('text_link'))
        <a class="underlined-text-link" href='{{ $link['url'] }}'>{!! $link['call_to_action'] !!}</a>
    @endif

    @if( get_row_layout() == 'logo')
        @php($link = get_sub_field('logo'))
        <div class="basic-logo">
            <img src="{{ $link }}" alt="Green Source Nutrition">
        </div>
    @endif


    @if( get_row_layout() == "two_images")
        @php($img = get_sub_field('image_left'))
        @php($img2 = get_sub_field('image_right'))
        <x-two-images/>
    @endif

    @if( get_row_layout() == "image_and_content")
        <x-image_and_content/>
    @endif

    @if( get_row_layout() == "basic_content")
        @php($text = get_sub_field('text'))
        {!! $text !!}
    @endif

    @if( get_row_layout() == "icon_list")
        <x-icon_list/>
    @endif

    @if( get_row_layout() == "accordion_icon_list")
        <x-accordion_colored_icon_list/>
    @endif

    @if( get_row_layout() == "bullet_list")
        <x-bullet_list/>
    @endif

    <?php endwhile; ?>
@endif
