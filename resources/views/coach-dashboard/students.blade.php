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
      <h5 class="title py-4">My Students</h5>
      
      <div style="overflow-x: auto">
        <table>
          <tr style="background-color: #603189">
            <th style="width: 30%">Coach Name</th>
            <th style="width: 15%; text-align: center;">Gender</th>
            <th style="width: 15%; text-align: center;">D.O.B</th>
            <th style="width: 25%; text-align: center;">Current Job</th>
            <th style="width: 15%; text-align: center;">Q/A</th>
          </tr>
        @foreach($list as $lt)
        <?php
        $qa = App\Models\StudentQA::where('user_id', $lt->student_id)->firstOrCreate(
          ['user_id' => $lt->student_id]
        );
        $studentProfile = App\Models\StudentProfile::where('user_id', $lt->student_id)->firstOrCreate(
          ['user_id' => $lt->student_id]
        );
        ?>
          <tr>
            <th style="width: 30%">{{$student->find($lt->student_id)->name}} {{$student->find($lt->student_id)->last_name}}</th>
            <th style="width: 15%; text-align: center;">
              @if($studentProfile->gender)
              {{$studentProfile->gender}}
              @else
              N/A
              @endif
            </th>
            <th style="width: 15%; text-align: center;">
              @if($studentProfile->dob)
              {{$studentProfile->dob}}
              @else
              N/A
              @endif
            </th>
            <th style="width: 25%; text-align: center;">
              @if($studentProfile->job)
              {{$studentProfile->job}}
              @else
              N/A
              @endif
            </th>
            <th style="width: 15%; text-align: center;">
              <button class="btn" style="background-color: #E5518F; color: white; font-size: 14px;" data-toggle="modal" data-target="#studentQAModal">View Q/A</button>
            </th>    
          </tr>
          @include('coach-dashboard.viewQA', ['lt'=>$lt])
        @endforeach
    </table>
  </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
    
</script>
@endpush
