@extends('custom-theme.master')

@section('content')
<!-- ==========Banner-Section========== -->
<section class="speaker-banner legal-pages banner bg_img" data-background="{{url('custom-theme/assets/images/banner/banner07.jpg')}}">
    <div class="container">
        <div class="speaker-banner-content">
            <h2 class="title">@yield('title')</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li>
                    @yield('title')
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Speaker-Single========== -->
<section class="speaker-single legal-pages content padding-top pt-lg-0">
    <div class="container">
        <div class="speaker-wrapper bg-six padding-top padding-bottom">
            <div class="speaker-content">
                <div class="speak-con-wrapper">
                    <div class="speak-con-area">
                        <div class="item">
                            <div class="item-thumb">
                                <img src="{{url('custom-theme/assets/images/event/icon/event-icon03.png')}}" alt="event">
                            </div>
                            <div class="item-content">
                                <span class="up">Drop us a line:</span>
                                <a href="MailTo:contact@rensans.com">contact@rensans.com</a>
                            </div>
                        </div>
                        <ul class="social-icons">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0" class="active">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <h3 class="subtitle">@yield('subtitle')</h3>
                    @yield('page_content')
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Speaker-Single========== -->
@endsection