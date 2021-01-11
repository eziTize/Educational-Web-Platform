@extends('custom-theme.master_profile')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      border-spacing: 0;
      border: 1px solid #ddd;
      font-size: 15px;

    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:hover {
      background-color: #603189;
    }

    th{
      color: white;
    }
</style>
@endpush

@section('content')
<section class="movie-facility padding-bottom padding-top profile-settings-wrapper common-design-form">
  <div class="container" style="padding-bottom: 8vh;">

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

    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
<button onclick="location.href = '{{ url('/dashboard') }}'" class="sess-btn py-2" style="background-color: #603189">Dashboard</button>
        <h5 class="title py-4">My Bookings</h5>
        <table>
          <tr style="background-color: #603189">
            <th style="width: 20%">Coach Name</th>
            <th style="width: 15%; text-align: center;">Subject</th>
            <th style="width: 15%; text-align: center;">Date</th>
            <th style="width: 10%; text-align: center;">Time</th>
            <th style="width: 5%; text-align: center;">Hour(s)</th>
            <th style="width: 10%; text-align: center;">Price</th>
            <th style="width: 5%; text-align: center;">Status</th>
            <th style="width: 20%; text-align: center;">Action</th>
          </tr>
        @foreach($bookings as $book)
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
              <th style="width: 5%; text-align: center;">{{$book->price}}</th>
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
                <a  href="{{url('/coach/profile/'.$book->coach_id)}}" class="sess-btn-2">View</a>
                <a href="{{ url('/messages') }}" class="sess-btn-2">Chat</a>
                <a href="javascript(0);" class="sess-btn-2" data-toggle="modal" data-target="#updateBookingModal">Cancel/Schedule</a>
                <a href="{{ route('booking.index', ['subjectId' => $book->subject_id, 'bookingType' => 'booking']) }}" class="sess-btn-2">Book Again</a>
              </th>
            </tr>
            @include('coach-dashboard.re-schedule', ['book'=>$book])
        @endforeach
    </table>

    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    
</script>
@endpush
