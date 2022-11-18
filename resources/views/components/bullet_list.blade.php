@php($list = get_sub_field('bullet_list'))
<ul class="bullet-list">
    <?php while (have_rows('bullet_list')): the_row(); ?>
    <li class="bullet-list__item">
        {{ $list['list_item'] }}
    </li>
    <?php endwhile; ?>
</ul>
