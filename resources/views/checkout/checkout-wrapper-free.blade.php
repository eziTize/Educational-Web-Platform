@extends('custom-theme.master_profile')

@section('css')
<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 50px;
  border-radius: 5px;

  padding: 14px 12px;
  padding-left: 10px;

  border: 1px solid #603189;
  background: transparent;

  font-family: inherit;
  font-size: 100%;
}
#card-errors{
    color: #fa755a;
}
  /*box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}*/
.StripeElement--focus {
  border: 1px solid #E5518F;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
@endsection

@section('content')
 <!-- ==========Checkout-Section========== -->
 <div style="background-image: -webkit-linear-gradient(0deg, rgb(97, 49, 137) 0%, rgb(227, 80, 143) 100%) !important;" class="movie-facility padding-bottom padding-top custom-checkout-wrapper">
    <div class="container">

         @if (session()->has('success_message'))

            <div class="alert alert-success mt-4">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)

            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.store', ['subjectId' => $subject->id, 'bookingType' => 'free-booking']) }}" method="POST" id="payment-form">
            @csrf
            <div class="">
               <!--  @guest
                    <div class="checkout-widget d-flex flex-wrap align-items-center justify-cotent-between">
                        <div class="title-area">
                            <h5 class="title">Already a {{ config('app.name') }}  Member?</h5>
                            <p>Sign in to earn points and make booking easier!</p>
                        </div>
                        <a href="#0" class="sign-in-area">
                            <i class="fas fa-user"></i><span>Sign in</span>
                        </a>
                    </div>
                @endguest -->
                
                <div class="">
                    <div class="booking-summery bg-one checkout-widget checkout-contact">
                        <h4 class="title">Booking Summary</h4>
                        <ul>
                            <li>
                                <!-- <h6 class="subtitle"><strong>Subject -</strong><span>Hindi</span></h6> -->
                                <div class="info">
                                    <span>
                                        <strong>Coach -</strong>
                                        <div class="actual-price d-inline">{{$coach->name}}</div>
                                        <br>
                                        <strong>Subject -</strong>
                                        <div class="actual-price d-inline">{{$subject->title}}</div>
                                        <br>
                                        <strong>HOURLY RATE -</strong> 
                                        <div class="actual-price d-inline"><strike>${{$subject->price}}</strike> FREE</div>
                                    </span> 
                                </div>
                            </li>
                        </ul>
                        
                    </div>

                    <div class="booking-summery bg-one checkout-widget checkout-contact">
                        <h6 class="subtitle pb-4">Booking Date, Time & Hours</h6>
                        
                        <div class="form-group w-100">
                            <label for="card2">Choose Date For Booking</label>
                            <input type="date" id="bookingdate" name="bookingdate" required>
                        </div>

                        <div class="form-group w-100">
                            <label for="card2">Choose Time For the Session</label>
                            <input type="time" id="bookingtime" name="bookingtime" required>
                        </div>

                        <div class="form-group w-100">
                            <label for="card2">Session Duration(in Minutes)</label>
                            <input type="number" min="1" max="1" id="bookinghrs" name="bookinghrs" value="15" readonly required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="custom-button" id="complete-order" value="make payment">Make Booking</button>
                        </div>
                       
                    </div>

                </div>
            </div>
        </form>
    </div>
  </div> 
 <!-- ==========Checkout-Section========== -->

@endsection

@section('js')
<script>
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;  


   var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() + 1);

    var ymonth = yesterday.getMonth() + 1;
    var yday = yesterday.getDate();
    var yyear = yesterday.getFullYear();

    if(ymonth < 10)
        ymonth = '0' + ymonth.toString();
    if(yday < 10)
        yday = '0' + yday.toString();


    var minDate = yyear + '-' + ymonth + '-' + yday;


    //$('#bookingdate').attr('max', maxDate);
    $('#bookingdate').attr('min', minDate);
});
</script>
@endsection