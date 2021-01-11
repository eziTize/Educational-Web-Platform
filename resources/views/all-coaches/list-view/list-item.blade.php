<div class="movie-list custom-coaches-list-item">
    <div class="movie-thumb c-thumb">
        <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}" class="w-100 bg_img h-100" data-background="{{url($teacher['profile_image'])}}">
            <img class="d-sm-none temp-teacher-size" src="{{url($teacher['profile_image'])}}" alt="{{ $teacher['full_name'] }} profile image">
        </a>
    </div>
    <div class="movie-content bg-one coach-details-content">
        <h5 class="title coach-name">
            <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}">{{ $teacher['full_name'] }}</a>
        </h5>
        <p class="duration price"> <strong>${{ $teacher['extras']['average_price'] }}</strong>/Hr</p>
        <div class="movie-tags categories">
            <p class="label" style="color: black;">Categories : </p>
            @forelse ($teacher['categories']['data'] as $item)
                <a href="#0" style="color: black;">{{ $item['name'] }}</a>
            @empty
                <a href="#0" style="color: black;">N.A</a>
            @endforelse
        </div>
        <div class="release languages">
            <span style="color: black;">Languages : </span>
            @forelse ($teacher['languages']['data'] as $item)
            <a href="#0" style="color: black;">{{ $item['name'] }}</a>
            @empty
            <a href="#0" style="color: black;">N.A</a>
            @endforelse
        </div>
        <ul class="movie-rating-percent ratings" style="color: black;">
            <li>
                {{-- <div class="thumb">
                    <img src="{{url('custom-theme/assets/images/movie/tomato.png')}}" alt="movie">
                </div> --}}
                <span class="content"><i class="fas fa-star star"></i></span>
                <span class="content"><i class="fas fa-star star"></i></span>
                <span class="content"><i class="fas fa-star star"></i></span>
                <span class="content"><i class="fas fa-star star"></i></span>
                <span class="content"><i class="fas fa-star star"></i></span>
            </li>
            {{-- <li>
                <div class="thumb">
                    <img src="{{url('custom-theme/assets/images/movie/cake.png')}}" alt="movie">
                </div>
                <span class="content">88%</span>
            </li> --}}
        </ul>
        <div class="book-area coach-book-area">
            <div class="book-ticket">
               <!-- <div class="react-item book-coach-actions">
                    <a href="#0">
                        <div class="thumb" style="background-color: #603189;">
                            <img src="{{url('custom-theme/assets/images/icons/heart.png')}}" alt="icons">
                        </div>
                    </a>
                </div> -->
                <div class="react-item mr-auto book-coach-actions book-coach-free-session">
                    <a href="{{url('/coach/profile/'.$teacher['id'].'/#bookingOptions')}}" class="">
                        <div class="thumb" style="background-color: #603189;">
                            <img src="{{url('custom-theme/assets/images/icons/book.png')}}" alt="icons">
                        </div>
                        <span style="color: black;">Book free session</span>
                    </a>
                </div>
                <div class="react-item book-coach-actions book-coach-button">
                    <a href="#0" class="popup-video">
                        <!-- <div class="thumb" style="background-color: #603189;">
                            <img src="{{url('custom-theme/assets/images/icons/play-button.png')}}" alt="icons">
                        </div> -->
                        <span style="padding-right: 10px;" onclick="location.href = '{{url('/coach/profile/'.$teacher['id'].'/#bookingOptions')}}'">Book now</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>