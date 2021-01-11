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

</head>

<body style="background-color: #613189;">
        <div class="logo">
            <a href="{{ url('/') }}">
              <img src="{{url('custom-theme/assets/images/logo/logo.png')}}" alt="logo" style="height: 5.7vh; margin: 3vh;">
            </a>
        </div>
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
    
    <!-- ==========Website content========== -->
    @yield('content')
    <!-- ==========Website content========== -->


    <!-- ==========Footer-Scripts========== -->
    @include('custom-theme.scripts.footer')
    <!-- ==========Footer-Scripts========== -->

</body>

</html>