<div class="col-sm-6 col-lg-4">
    <div class="movie-grid custom-coaches-grid-item">
        <div class="movie-thumb c-thumb">
            <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}">
                <img class="temp-teacher-size" src="{{url($teacher['profile_image'])}}" alt="{{ $teacher['full_name'] }} profile image">
            </a>
            <div class="event-date">
                <h6 class="date-title">0</h6>
                <span><i class="fas fa-star"></i></span>
            </div>
        </div>
        <div class="movie-content bg-one">
          <!--  <h5 class="title m-0 coach-name"> -->
            <h5 class="title m-0"> 
                <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}">{{ $teacher['full_name'] }}</a>
            </h5>
            <ul class="movie-rating-percent">
                <li>
                    <span class="price" style="color: white;"><strong>${{ $teacher['extras']['average_price'] }}</strong> / Hr</span>
                </li>
            </ul>
        </div>
    </div>
</div>