@extends('custom-theme.master')

@section('content')
<!-- ==========Banner-Section========== -->
<section class="banner-section">
    <div class="banner-bg bg_img bg-fixed" data-background="{{url('https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260')}}"></div>
    <div class="container">
        <div class="banner-content">
            <h1 class="title bold">Find <span class="color-theme">Your</span> Coach</h1>
            <p style="font-size: 23px;">Choose among our coaches and mentors the most suitable coach to go through the wanted transformation and get a customized support in the topic & language wanted.</p>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Combine-Search========== -->
@include('search-filters.search-wrapper') 
<!-- ==========Combine-Search========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                @include('all-coaches.sidebar-wrapper')
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="filter-area">
                        <div class="filter-main">
                            <div class="left">
                                <div class="item">
                                    <span class="show" style="color: black;">Sort By:</span>
                                    <select class="select-bar">
                                        <option value="showing">Name</option>
                                        <option value="exclusive">Date Added</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="grid-button tab-menu">
                                <li>
                                    <i class="fas fa-th"></i>
                                </li>                            
                                <li class="active">
                                    <i class="fas fa-bars"></i>
                                </li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="tab-area">
                            @include('all-coaches.grid-view.grid-wrapper',[
                                'teachers'=>$teachers['data']
                            ])
                            @include('all-coaches.list-view.list-wrapper',[
                                'teachers'=>$teachers['data']
                            ])
                    </div>
              <!--      <div class="pagination-area text-center">
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
<!-- ==========Movie-Section========== -->

@endsection