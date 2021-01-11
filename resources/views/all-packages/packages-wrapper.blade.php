@extends('custom-theme.master')

@section('content')
<!-- ==========Banner-Section========== -->
<section class="banner-section">
    <div class="banner-bg bg_img" data-background="https://images.pexels.com/photos/3184311/pexels-photo-3184311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"></div>
    <div class="container">
        <div class="banner-content event-content">
            <h1 class="title bold" style="font-size: 47px">FIND THE RIGHT <span class="color-theme">COACHING</span> PACKAGE</h1>
            <p style="font-size: 21px">Browse among our tailor made package to get the full support you need for your personal and/or profesional growth.</p>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Combine-Search========== -->
@include('search-filters.search-wrapper') 
<!-- ==========Combine-Search========== -->

<!-- ==========Event-Section========== -->
<section class="event-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                @include('all-packages.sidebar-wrapper')
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab">
                    <div class="filter-area">
                        <div class="filter-main">
                            <div class="left w-100 justify-content-between">
                                <div class="item mr-0">
                                    <span class="show" style="color: black;">Sort By :</span>
                                    <select class="select-bar">
                                        <option value="showing">Name</option>
                                        <option value="exclusive">Date Added</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10 justify-content-center">
                        @include('all-packages.grid-view.grid-wrapper')
                    </div>
                   <!-- <div class="pagination-area text-center">
                        <a href="#0"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>
                        <a href="#0">1</a>
                        <a href="#0">2</a>
                        <a href="#0" class="active">3</a>
                        <a href="#0">4</a>
                        <a href="#0">5</a>
                        <a href="#0"><span>Next</span><i class="fas fa-angle-double-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Event-Section========== -->

@endsection