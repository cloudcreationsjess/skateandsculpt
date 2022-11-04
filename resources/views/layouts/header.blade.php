<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-color" content="#FFFFFF"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    @yield('styles')

    @stack('header.scripts')

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



    @php(wp_head())

</head>

<body @php(body_class()) >

<script>
    (function(w, d, t, h, s, n) {
        w.FlodeskObject = n;
        var fn = function() {
            (w[n].q = w[n].q || []).push(arguments);
        };
        w[n] = w[n] || fn;
        var f = d.getElementsByTagName(t)[0];
        var v = '?v=' + Math.floor(new Date().getTime() / (120 * 1000)) * 60;
        var sm = d.createElement(t);
        sm.async = true;
        sm.type = 'module';
        sm.src = h + s + '.mjs' + v;
        f.parentNode.insertBefore(sm, f);
        var sn = d.createElement(t);
        sn.async = true;
        sn.noModule = true;
        sn.src = h + s + '.js' + v;
        f.parentNode.insertBefore(sn, f);
    })(window, document, 'script', 'https://assets.flodesk.com', '/universal', 'fd');

    window.fd('form', {
        formId: '62ba83d476b1bf772c4033ef'
    });

    (function(w, d, t, h, s, n) {
        w.FlodeskObject = n;
        var fn = function() {
            (w[n].q = w[n].q || []).push(arguments);
        };
        w[n] = w[n] || fn;
        var f = d.getElementsByTagName(t)[0];
        var v = '?v=' + Math.floor(new Date().getTime() / (120 * 1000)) * 60;
        var sm = d.createElement(t);
        sm.async = true;
        sm.type = 'module';
        sm.src = h + s + '.mjs' + v;
        f.parentNode.insertBefore(sm, f);
        var sn = d.createElement(t);
        sn.async = true;
        sn.noModule = true;
        sn.src = h + s + '.js' + v;
        f.parentNode.insertBefore(sn, f);
    })(window, document, 'script', 'https://assets.flodesk.com', '/universal', 'fd');
</script>

@php(wp_body_open())

@php(do_action('get_header'))


@if ( get_the_ID() == '17' && get_field('enable_popup_banner', 'option') == 'true' )
<div id="nav-popup" class="background-color--{{ get_field('popup_background_color', 'option') }}">
    <div class="row">
    <div class="col-11">
    <div class="nav-popup-container">
        <div class="all-caps-heading">{!! get_field('popup_text', 'option') !!}</div>
    </div>
    </div>
    <div class="col align-self-end">
        <i class="nav-popup-close" data-feather="x"></i>
    </div>
    </div>
</div>
@endif
<div id="app">

    <div id="panel"><!-- Needed for mobile menu. This is what slides when you click mobile menu button -->
        <div class="mobile-popout">
           <x-mobile_menu/>
        </div>

    <!-- MOBILE NAV -->

@include('partials.nav')
{{--        @include('partials.mega-nav')--}}
