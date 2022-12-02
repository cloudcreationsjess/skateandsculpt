<nav class="mobile-menu mobile">
    <div id="site-navigation">
        <div class='top-menu'>
            <div class='menu-logo'>
                <a id="logo" class="" href="{{ esc_url(home_url('/')) }}" title="{{ esc_attr(get_bloginfo('name', 'display')) }}" rel="home">
                    {!! the_image(get_field('site_branding_logo', 'option')) !!}
                </a>
            </div>
            <div class='menu-cta'>
                <?php if (have_rows('banner_button', 'option')): while (have_rows('banner_button', 'option')): the_row();
                    $cta = get_sub_field('banner_call_to_action', 'option');
                    $url = get_sub_field('banner_url', 'option'); ?>
                <a class="btn btn--pink-blue" href='{{ $url }}'>{!! $cta !!}</a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class='close-x'></div>
        </div>
        <div class="mobile-menu__site-menu text-center" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <ul class="mobile-menu__list">
                @if (has_nav_menu('mobile') )
                    {!! wp_nav_menu(['theme_location' => 'mobile', 'menu_id' => 'mobile-menu', 'depth' => 3, 'echo' => false]) !!}
                @endif
            </ul>
        </div>
        <div class="socials">
            @if(have_rows('follow_us_menu', 'option'))
                @while(have_rows('follow_us_menu', 'option'))
                    @php(the_row())
                    <a target="_blank" href="{{ get_sub_field('social_url', 'option') }}">
                        {!! the_image(get_sub_field('social_icon', 'option')) !!}
                    </a>
                @endwhile
            @endif
        </div>
    </div>
</nav>
