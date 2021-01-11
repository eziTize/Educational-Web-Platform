<div class="col-sm-6 col-lg-4">
    <div class="event-grid">
            <div class="movie-thumb c-thumb">
                @if($package->type == 'bpack')
                <a href="{{ url('package-details') }}">
                    <img src="https://cdn.pixabay.com/photo/2015/03/26/09/41/tie-690084_960_720.jpg" alt="business package">
                </a>
                @else
                <a href="{{ url('package-details') }}">
                    <img src="https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg" alt="personal development package">
                </a>
                @endif
            </div>
            <div class="movie-content bg-one">
                <h5 class="title m-0">
                    <a href="{{ route('home.singlePackage' , ['id' => $package->id]) }}">{{$package->title}}</a>
                </h5>
                <div class="movie-rating-percent">
                    <span><strong>{{$package->price}}</strong></span>
                </div>
            </div>
        </div>
</div>