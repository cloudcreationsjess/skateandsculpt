<!-- Mega menu -->
<header id="header" class="header header--mega-menu fixed-to-panel" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    <div class="container-fluid">
        <!-- Menu -->
        <div class="header__site-menu text-center desktop" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'main-menu', 'depth' => 2, 'echo' => false]) !!}
            @endif
        </div>

        <!-- Branding -->
        <div class="header__site-branding">
            <a id="header__site-branding__logo" class="" href="{{ esc_url(home_url('/')) }}" title="{{ esc_attr(get_bloginfo('name', 'display')) }}" rel="home">
                <img class="logo" src="https://stealthmedia.com/wp-content/uploads/assets/STEALTH-logo.svg" alt="Logo">
            </a>
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
