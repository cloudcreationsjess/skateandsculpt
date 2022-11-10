@php($button = get_field('button'))
<a class="btn btn--{{ $button['button_color'] }}" href='{{ $button['url'] }}'>{!! $button['call_to_action'] !!}</a>

