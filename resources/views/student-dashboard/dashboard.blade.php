@extends('student-profile-settings.settings-wrapper')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      border-spacing: 0;
      border: 1px solid #ddd;
      font-size: 12px;

    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th:hover {
      background-color: #603189;
    }

    th{
      color: white;
    }
</style>
@endpush

@section('settings-content')

<div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">

        <h5 class="title">Dashboard</h5>
          <!-- Dashboard Cards -->
          <div class="row py-2">
            <div class="col-sm-6">
              <div class="card" style="background-color: #F9A868 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Coaches</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countCoaches}}</p>
                </div>
              </div>
            </div>
             <div class="col-sm-6">
              <div class="card" style="background-color: #643695 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Transaction</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">${{$countTxn}}</p>
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
                  <h5 class="card-title" style="text-align: center;">Free Bookings</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">{{$countFree}}</p>
                </div>
              </div>
            </div>
          </div>
         <!-- <div class="py-2">
              <div class="card" style="background-color: #643695 !important;">
                <div class="card-body" style="padding: 5vh;">
                  <h5 class="card-title" style="text-align: center;">Total Notifications</h5>
                  <p class="card-text" style="color: white; font-size: 35px; text-align: center; padding-top: 16px">0</p>
                </div>
              </div>
            </div> -->
          <!-- End Dashboard Cards -->

          <!-- Upcoming Bookings -->

          <div style="overflow-x:auto;">
  
            <h5 class="title py-4">Upcoming Sessions</h5>
                <div style ="overflow-x:auto;">
                  <table>
                    <tr style="background-color: #603189">
                      <th style="width: 20%">Coach Name</th>
                      <th style="width: 15%; text-align: center;">Subject</th>
                      <th style="width: 15%; text-align: center;">Date</th>
                      <th style="width: 10%; text-align: center;">Time</th>
                      <th style="width: 7%; text-align: center;">Hour(s)</th>
                      <th style="width: 8%; text-align: center;">Status</th>
                      <th style="width: 25%; text-align: center;">Action</th>
                    </tr>
                  @foreach($bookings as $book)
                  @if($book->bookingdate == $today && $book->bookingend > $now || $book->bookingdate > $today && $book->joined != 2)
                    <tr>
                      <th style="width: 20%">{{$coach->find($book->coach_id)->name}} {{$coach->find($book->coach_id)->last_name}}</th>
                      <th style="width: 15%; text-align: center;">
                        @if($book->subject_id)
                        {{$subject->find($book->subject_id)->title}}
                        @else
                        N/A
                        @endif
                      </th>
                      <th style="width: 15%; text-align: center;">{{$book->bookingdate}}</th>
                      <th style="width: 10%; text-align: center;">{{$book->bookingtime}}</th>
                      <th style="width: 5%; text-align: center;">{{$book->bookinghrs}}</th>
                      <th style="width: 5%; text-align: center;">
                        @if($book->joined == 2)
                          <span style="color: red">Cancelled</span>
                        @elseif($book->bookingdate == $today || $book->bookingdate > $today)
                          <span style="color: teal">Upcoming</span>
                        @elseif($book->bookingdate == $today && $book->bookingend < $now || $book->bookingdate < $today)
                            @if($book->joined == 1)
                             <span style="color: green">Completed</span>
                            @else
                             <span style="color: red">Expired</span>
                            @endif
                        @else
                         <span style="color: gray">N/A</span>
                        @endif
                      </th>
                      <th style="width: 20%; text-align: center;">
                        <a href="{{ route('tw.session.create', ['roomName' => $book->session_id]) }}" class="sess-btn-2">Start</a>
                        <a href="{{url('/coach/profile/'.$book->coach_id)}}" class="sess-btn-2">View</a>
                        <a href="{{ url('/messages') }}" class="sess-btn-2">Chat</a>
                        <a href="javascript(0);" class="sess-btn-2" data-toggle="modal" data-target="#updateBookingModal">Cancel/Schedule</a>
                        <a href="{{ route('booking.index', ['subjectId' => $book->subject_id, 'bookingType' => 'booking']) }}" class="sess-btn-2">Book Again</a>
                      </th>
                    </tr>
                    @include('coach-dashboard.re-schedule', ['book'=>$book])
                  @endif
                  @endforeach
              </table>
            </div>
        </div>

          <!-- End Upcoming Bookings --> 

        <div class="row py-5">
          <div class="col-sm-6">
            <button onclick="location.href = '{{ route('student.profile.coaches') }}'" class="btn btn-info">My Coaches</button>
          </div>
          <div class="col-sm-6">
            <button onclick="location.href = '{{ route('student.profile.bookings') }}'" class="btn btn-success">My Bookings</button>
          </div>
        </div>

        <div id='calendar'></div>

</div>
    
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush

@section('cdn')
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });


    </script>
@endsection
