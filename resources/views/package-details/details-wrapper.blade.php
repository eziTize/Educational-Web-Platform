@extends('custom-theme.master_profile')

@section('content')

<!-- ==========Event-About========== -->
<section class="event-about padding-top padding-bottom" style="margin-top: 10vh;">
    <div class="container">
        <div class="row justify-content-between flex-wrap-reverse">
            <div class="col-lg-7 col-xl-6">
                <div class="event-about-content">
                    <div class="section-header-3 left-style m-0">
                        <h2 class="title">{{$service->title}}</h2>
                        <p>{{$service->description}}</p>
                        <p>Price: ${{$service->price}}</p>
                        <a href="{{ route('booking.index', ['subjectId' => $service->id, 'bookingType' => 'package-booking']) }}" type="button" class="custom-button" >Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="event-about-thumb">
                     @if($service->type == 'bpack')
                        <img src="https://cdn.pixabay.com/photo/2015/03/26/09/41/tie-690084_960_720.jpg" alt="business package">
                    @else
                        <img src="https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg" alt="personal development package">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Event-About========== -->

 <!-- ==========Statistics-Section========== 
 <section class="statistics-section padding-top padding-bottom bg_img pb-lg-0" data-background="{{url('custom-theme/assets/images/statistics/statistics-bg01.jpg')}}">
    <div class="container">
        <div class="section-header-3">
            <span class="cate">details about package</span>
            <h2 class="title">Package name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
        </div>
        <div class="statistics-wrapper">
            <div class="row mb--20">
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-thumb">
                            <img src="{{url('custom-theme/assets/images/statistics/stat01.png')}}" alt="statistics">
                        </div>
                        <div class="stat-content">
                            <h3 class=" counter-item odometer" data-odometer-final="2000"></h3>
                            <span class="info">Package Price ($)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-thumb">
                            <img src="{{url('custom-theme/assets/images/statistics/stat02.png')}}" alt="statistics">
                        </div>
                        <div class="stat-content">
                            <h3 class=" counter-item odometer" data-odometer-final="100"></h3>
                            <span class="info">Total Hours</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-thumb">
                            <img src="{{url('custom-theme/assets/images/statistics/stat03.png')}}" alt="statistics">
                        </div>
                        <div class="stat-content">
                            <h3 class=" counter-item odometer" data-odometer-final="100"></h3>
                            <span class="info">Total Sessions</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ==========Statistics-Section========== -->

<!-- ==========Faq-Section========== 
<section class="faq-section padding-top">
    <div class="container">
        <div class="section-header-3">
            <h2 class="title">What's included</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor  ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
        </div>
        <div class="faq-area padding-bottom">
            <div class="faq-wrapper">
                @for ($i = 1; $i < 5; $i++)
                    @include('package-details.in-package-list-item')
                @endfor
            </div>
        </div>
    </div>
</section> -->
<!-- ==========Faq-Section========== -->

@endsection