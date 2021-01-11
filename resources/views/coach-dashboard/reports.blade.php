@extends('coach-profile-settings.settings-wrapper')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')

<div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Reports</h5>
          <!-- Dashboard Cards -->
          <div class="row py-2">
            <div class="col-sm-6">
              <div class="card" style="background-color: #F9A868 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Coachees</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countStudents}}</p>
                </div>
              </div>
            </div>
             <div class="col-sm-6">
              <div class="card" style="background-color: #643695 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Earned</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">${{$countErn}}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row py-2">
            <div class="col-sm-6">
              <div class="card" style="background-color: #F05A8E !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Paid Bookings</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countPaid}}</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card" style="background-color: #ff00c8 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Free Sessions</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countFree}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="py-2">
              <div class="card" style="background-color: #643695 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Bookings</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countTotal}}</p>
                </div>
              </div>
            </div>
          <!-- End Dashboard Cards -->
</div>
    
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush

@section('cdn')
@endsection
