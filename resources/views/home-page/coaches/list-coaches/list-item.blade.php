<div class="item">
    <div class="event-grid">
        <div class="movie-thumb c-thumb">
            <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}">
                <img class="temp-teacher-size" src="{{url($teacher['profile_image'])}}" alt="{{ $teacher['full_name'] }} profile image">
            </a>
            <div class="event-date">
                <h6 class="date-title">5</h6>
                <span><i class="fas fa-star"></i></span>
            </div>
        </div>
        <div class="movie-content bg-one">
            <h5 class="title m-0">
                <a href="{{ route('teacher.profile.show',['id'=>$teacher['id']]) }}">{{ $teacher['full_name'] }}</a>
            </h5>
            <div class="movie-rating-percent">
                <span><strong>${{ $teacher['extras']['average_price'] }}</strong> / Hr</span>
            </div>
        </div>
    </div>
</div>