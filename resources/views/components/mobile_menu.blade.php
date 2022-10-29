<nav class="mobile-menu mobile">
    <div id="site-navigation">
        <div class="mobile-menu__site-menu text-center" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <ul class="mobile-menu__list">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'main-menu', 'depth' => 2, 'echo' => false]) !!}
                @endif
            </ul>
            <div class="socials">
                <?php while (have_rows('socials', 'option')): the_row(); ?>
                <a target="_blank" href="{{ get_sub_field('url') }}">
                    <img src="{{ get_sub_field('icon') }}" alt=""></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</nav>
