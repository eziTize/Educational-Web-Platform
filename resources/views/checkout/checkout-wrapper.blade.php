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

        @if (session()->has('error_message'))

            <div class="alert alert-danger mt-4">
                {{ session()->get('error_message') }}
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

        <form action="{{ route('booking.store', ['subjectId' => $subject->id, 'bookingType' => 'booking']) }}" method="POST" id="payment-form">
            @csrf
            <div class="row">
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
                
                <div class="col-lg-6">
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
                                        <div class="actual-price d-inline">${{$subject->price}}</div>
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
                            <label for="card2">Enter Session Duration(in Hours)</label>
                            <input onchange="myFunction(document.getElementById('bookinghrs').value)" type="number" min="1" id="bookinghrs" name="bookinghrs" value="1" required>
                        </div>

                        <input type="number" id="priceInput" name="price"
                            style="display: none" value="{{$subject->price}}">

                        <script>
                            function myFunction(hrs) {
                              document.getElementById("amtPayable").innerHTML='$'+ ({{$subject->price}} * hrs).toFixed(2);
                              document.getElementById("priceInput").value = ({{$subject->price}} * hrs).toFixed(2);
                            }
                        </script>
                       
                    </div>

                </div>
                <div class="checkout-widget checkout-card mb-0 col-lg-6">
                    <h5 class="title">Payment Option </h5>
                    <ul class="payment-option">
                        <li class="active">
                            <a href="#0">
                                <img src="{{url('custom-theme/assets/images/payment/card.png')}}" alt="payment">
                                <span>Credit/Debit Card</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#0">
                                <img src="{{url('custom-theme/assets/images/payment/card.png')}}" alt="payment">
                                <span>Debit Card</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <img src="{{url('custom-theme/assets/images/payment/paypal.png')}}" alt="payment">
                                <span>paypal</span>
                            </a>
                        </li> --}}
                    </ul>
                    <h6 class="subtitle">Enter Your Card Details </h6>
                    

                        <div class="form-group w-100">
                            <label for="card2"> Name on the Card</label>
                            <input type="text" id="name_on_card" name="name_on_card" required>
                        </div>


                        <div class="form-group w-100 pb-4">
                            <label for="card-element">Card Details</label>
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <h6 class="subtitle p-1"><span>Amount Payable: </span><span id="amtPayable">${{$subject->price}}</span></h6>



                    <!--    <div class="form-group w-100">
                            <label for="card2"> Name on the Card</label>
                            <input type="text" id="card2">
                        </div>
                        <div class="form-group">
                            <label for="card3">Expiration</label>
                            <input type="text" id="card3" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label for="card4">CVV</label>
                            <input type="text" id="card4" placeholder="CVV">
                        </div> -->

                        {{-- <div class="form-group check-group">
                            <input id="card5" type="checkbox" checked>
                            <label for="card5">
                                <span class="title">QuickPay</span>
                                <span class="info">Save this card information to my {{ config('app.name') }}  account and make faster payments.</span>
                            </label>
                        </div> --}}
                        <div class="form-group">
                            <button type="submit" class="custom-button" id="complete-order" value="make payment">Make Payment</button>
                        </div>
                    <p class="notice">
                        By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                    </p>
                </div>
            </div>
        {{--  <div class="col-lg-4">
                <div class="booking-summery bg-one">
                    <h4 class="title">booking summery</h4>
                    @include('checkout.coaches-items.coaches-items-wrapper')
                    @include('checkout.packages-items.packages-items-wrapper')
                    <ul>
                        <li>
                            <span class="info"><span>price</span><span>$2,240</span></span>
                            <span class="info"><span>vat</span><span>$0</span></span>
                        </li>
                    </ul>
                </div>
                <div class="proceed-area  text-center">
                    <h6 class="subtitle"><span>Amount Payable</span><span>$2,240</span></h6>
                    <a href="#0" class="custom-button back-button">proceed</a>
                </div>
            </div> --}}
        </form>
    </div>
  </div> 
 <!-- ==========Checkout-Section========== -->

@endsection

@section('js')

    <script src="https://js.stripe.com/v3/"></script>

<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_WXlUk1WnVatPBW5fIXWh1taU00MZfrLpt2');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#f8f9fa',
    fontFamily: 'inherit',
    fontSmoothing: 'antialiased',
    fontSize: '17px',
    '::placeholder': {
      color: '#dbe2fb'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
        displayError.textContent = event.error.message;
        } else {
        displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Disable the submit button to prevent repeated clicks
            document.getElementById('complete-order').disabled = true;

            // Integrating with our checkout form fields
            var options = {
                name: document.getElementById('name_on_card').value,
              //  address_line1: document.getElementById('address').value,
            //    address_city: document.getElementById('city').value,
             //   address_state: document.getElementById('province').value,
              //  address_zip: document.getElementById('postalcode').value
            }

        stripe.createToken(card, options).then(function(result) {
        if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;

            // Enable the submit button
            document.getElementById('complete-order').disabled = false;

        } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
        }
        });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }
</script>

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