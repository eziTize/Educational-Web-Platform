@extends('custom-theme.master_profile')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
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
        <h5 class="title py-4">My Coaches</h5>
        <table>
          <tr style="background-color: #603189">
            <th style="width: 40%">Coach Name</th>
            <th style="width: 30%; text-align: center;">Gender</th>
            <th style="width: 30%; text-align: center;">Profile</th>
          </tr>
        @foreach($list as $lt)
          <tr>
            <th style="width: 40%">{{$coach->find($lt->coach_id)->name}} {{$coach->find($lt->coach_id)->last_name}}</th>
            <th style="width: 30%; text-align: center;">{{$coach->find($lt->coach_id)->profile_gender['gender']}}</th>
            <th style="width: 30%; text-align: center;">
              <a href="{{url('/coach/profile/'.$lt->coach_id)}}" class="btn" style="background-color: #E5518F; color: white; margin: 5px; font-size: 14px">View Profile</a>
              <a href="{{url('/messages')}}" class="btn" style="background-color: #E5518F; color: white; margin: 5px; font-size: 14px">Chat</a>
              <a href="{{url('/coach/profile/'.$lt->coach_id.'/#bookingOptions')}}" class="btn" style="background-color: #E5518F; color: white; margin: 5px; font-size: 14px">Book Again</a>
            </th>
          </tr>
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
