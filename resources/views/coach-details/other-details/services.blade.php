<div class="movie-review-item bookable-service-list">
<div class="author" style="color: black;">
    <div class="movie-review-info">
        <h6 class="subtitle price"><a href="#0" style="color: black">${{ $service['price'] }}/Hr</a></h6>
        <span style="color: black"><i class="fas fa-check" style="color: black"></i> verified</span>
    </div>
</div>
<div class="movie-review-content">
    <h6 class="cont-title" style="color: black">{{ $service['title'] }}</h6>
<p style="color: black">{{ $service['description'] }}</p>
 <div>
        <a href="{{ route('booking.index', ['subjectId' => $service['id'], 'bookingType' => 'booking']) }}" type="button" style="padding: 11px;" class=" btn btn-addbooking cart-button" >BOOK NOW</a>

        <a href="{{ route('booking.index', ['subjectId' => $service['id'], 'bookingType' => 'free-booking']) }}" type="button" style="padding: 11px;" class=" btn btn-addbooking cart-button">FREE SESSION</a>
    </div>
</div>
</div>