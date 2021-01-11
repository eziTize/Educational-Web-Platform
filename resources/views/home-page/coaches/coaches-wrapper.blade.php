<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="tab">
            <div class="section-header-2">
                <div class="left">
                    <h2 class="title" style="color: #001539;">coaches</h2>
                    <p>Choose from our expert mentors & coaches and get a customized service.</p>
                </div>
                <ul class="tab-menu">
                    <li class="active">
                        Top rated
                    </li>
                    <!-- <li>
                        Recommendations
                    </li> -->
                    <li onclick="location.href = '{{ route('teachers.show.all') }}'">
                        All coaches
                    </li>
                </ul>
            </div>
            <div class="tab-area mb-30-none">
                <div class="tab-item active">
                    @include('home-page.coaches.list-coaches.list',[
                        'teachers'=>$teachers['data']
                    ])
                </div>
               <!-- <div class="tab-item">
                    @include('home-page.coaches.list-coaches.list',[
                        'teachers'=>$teachers['data']
                    ])
                </div> -->
                <div class="tab-item">
                    @include('home-page.coaches.list-coaches.list',[
                        'teachers'=>$teachers['data']
                    ])
                </div>
            </div>
        </div>
    </div>
</section>