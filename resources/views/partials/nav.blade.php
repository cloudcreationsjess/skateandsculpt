<!-- Normal Drop Down Menu -->
<header id="header" class="@if ( get_the_ID() == '17' && get_field('enable_popup_banner', 'option') == 'true' ) nav-popup-enabled @endif header js__header fixed-to-panel" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Branding -->
            <div class="col-auto">
                <div class="header__site-branding">
                    <a id="header__site-branding__logo" class="" href="{{ esc_url(home_url('/')) }}" title="{{ esc_attr(get_bloginfo('name', 'display')) }}" rel="home">
                        <img class="logo--icon" src="/wp-content/uploads/2022/10/GSN_-03.svg" alt="Logo">
                        <img class="logo--text" src="/wp-content/uploads/2022/10/GSN_-01.svg" alt='Logo'>
                    </a>
                </div>
            </div>
            <div class="col">
                <!-- Menu -->
                <div class="header__site-menu text-center desktop" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    @if (has_nav_menu('primary_navigation'))
                        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'main-menu', 'depth' => 2, 'echo' => false]) !!}
                    @endif
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
        </div>
    </div>
</header>
