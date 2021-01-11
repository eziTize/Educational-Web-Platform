@extends('custom-theme.master')

@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
       
        <div class="banner-bg bg_img bg-fixed" data-background="{{url('https://images.pexels.com/photos/4226262/pexels-photo-4226262.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')}}" style="background-image: "></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">Book your coach</span> for 
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Business</b>
                        <b>Mindset</b>
                        <b>Personal Development</b>
                        <b>Leadership</b>
                        <b>Accountability</b>
                        <b>Career</b>
                    </span>
                </h1>
                <p style="font-size: 25px;">One-one-One sessions, Group Sessions, Packages.</p>
                <p style="font-size: 25px;">Choose the most adequate offer for you!</p>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Combine-Search========== -->
    @include('search-filters.search-wrapper') 
    <!-- ==========Combine-Search========== -->

    <!-- ==========Coaches-Section========== -->
    @include('home-page.coaches.coaches-wrapper',[
        'teachers'=>$teachers
    ])
    <!-- ==========Coaches-Section========== -->

    <!-- ==========Event-Section========== -->
    @include('home-page.packages.packages-wrapper')
    <!-- ==========Event-Section========== -->
@endsection