<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('custom-theme.scripts.head')

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}  - @yield('title',config('app.title', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('css')

</head>

<body style="background-image: -webkit-linear-gradient(0deg, #613189 0%, #E3508F 100%)!important;">

    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    @include('custom-theme.components.header')
    <!-- ==========Header-Section========== -->

    <!-- ==========Website content========== -->
    
    @yield('content')
    <!-- ==========Website content========== -->

    
    <!-- ==========Footer-Section========== -->
    @include('custom-theme.components.footer_profile')
    <!-- ==========Footer-Section========== -->

    <!-- ==========Footer-Scripts========== -->
    @include('custom-theme.scripts.footer')
    <!-- ==========Footer-Scripts========== -->

</body>
    @yield('js')
</html>