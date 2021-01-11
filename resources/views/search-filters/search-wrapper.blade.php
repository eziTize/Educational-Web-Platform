<section class="search-ticket-section padding-top pt-lg-0">
    <div class="container">
        <div class="search-tab bg_img" data-background="{{url('custom-theme/assets/images/ticket/ticket-bg01.jpg')}}">
            <div class="row align-items-center mb--20">
                <div class="col-lg-6 mb-20">
                    <div class="search-ticket-header">
                        <h6 class="category">welcome to {{ config('app.name', 'Laravel') }} </h6>
                        <h3 class="title">what are you looking for</h3>
                    </div>
                </div>
                <div class="col-lg-6 mb-20" style="back">
                    <ul class="tab-menu ticket-tab-menu">
                        <li class="active">
                            <div class="tab-thumb">
                                <img src="{{url('custom-theme/assets/images/ticket/ticket-tab01.png')}}" alt="ticket">
                            </div>
                            <span>coaches</span>
                        </li>
                        <li>
                            <div class="tab-thumb">
                                <img src="{{url('custom-theme/assets/images/ticket/ticket-tab02.png')}}" alt="ticket">
                            </div>
                            <span>packages</span>
                        </li>
                       <!-- <li>
                            <div class="tab-thumb">
                                <img src="{{url('custom-theme/assets/images/ticket/ticket-tab03.png')}}" alt="ticket">
                            </div>
                            <span>explore</span>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    @include('search-filters.search-form')
                </div>
                <div class="tab-item">
                    @include('search-filters.search-form')
                </div>
                <div class="tab-item">
                    @include('search-filters.search-form')
                </div>
            </div>
        </div>
    </div>
</section>  