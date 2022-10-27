@php($list = get_sub_field('list'))
<ul class="bullet-list">
    <?php while (have_rows('list')): the_row(); ?>
        <li class="bullet-list__item">
            {{ get_sub_field('text') }}
        </li>
    <?php endwhile; ?>
</ul>
