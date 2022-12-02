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

@php(wp_body_open())

@php(do_action('get_header'))

<div id="app">

    <div id="panel"><!-- Needed for mobile menu. This is what slides when you click mobile menu button -->
        <div class="mobile-popout">
           <x-mobile-menu/>
        </div>

    <!-- MOBILE NAV -->

@include('partials.nav')
{{--        @include('partials.mega-nav')--}}
