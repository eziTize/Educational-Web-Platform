<div class="item coach-description">
    <div class="movie-review-item bookable-service-list">
        <div class="author">
            <div class="movie-review-info">
                <h6 class="subtitle price"><a href="#0" style="color: black;">${{ $service['price'] }}/Hr</a></h6>
                <p class="subtitle price_small">Fee To Recieve: ${{ $service['price'] - $service['price']/5 }}/Hr</p>
                <span style="color: black;"><i class="fas fa-check"></i> verified</span>
            </div>
        </div>
        <div class="movie-review-content">
            <h6 class="cont-title" style="color: black;">{{ $service['title'] }}</h6>
            <p style="color: black;">{{ $service['description'] }}</p>
            <div class="action-buttons">
                <a class="btn btn-warning d-inline-block w-auto mr-1" href="{{ route('teacher.services.show',['id'=>$service['id']]) }}"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger d-inline-block w-auto"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</div>