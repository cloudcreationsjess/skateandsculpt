<!-- Normal Drop Down Menu -->
<header id="header" class="header js__header fixed-to-panel" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    <div class='header__container'>
        <div class='header__site-branding'>
            <a id="header__site-branding__logo" class="" href="{{ esc_url(home_url('/')) }}" title="{{ esc_attr(get_bloginfo('name', 'display')) }}" rel="home">
                {!! the_image(get_field('site_branding_logo', 'option')) !!}
            </a>
        </div>
        <div class="header__site-menu text-center desktop" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'main-menu', 'depth' => 2, 'echo' => false]) !!}
            @endif
        </div>
        <div class='header__cta'>
            <?php if (have_rows('banner_button', 'option')): while (have_rows('banner_button', 'option')): the_row();
                $cta = get_sub_field('banner_call_to_action', 'option');
                $url = get_sub_field('banner_url', 'option'); ?>
            <a class="btn btn--blue-white desktop" href='{{ $url }}'>{!! $cta !!}</a>
            <a class="btn btn--blue-white btn--scalloped mobile" href='{{ $url }}'>{!! get_sub_field('mobile_call_to_action', 'option') !!}</a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- Mobile nav button -->
        <div class="header__site-nav-button-container mobile">
            <button type="button" id="nav-btn" class="btn btn--nav js__slideout-toggle hamburger hamburger--spin">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
    </div>
</header>
<div class='nav-bump'></div>
