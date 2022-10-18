<ul class="bullet-list">
    @foreach($list as $item)
        <li class="bullet-list__item">
           {{ $item['text'] }}
        </li>
    @endforeach
</ul>
