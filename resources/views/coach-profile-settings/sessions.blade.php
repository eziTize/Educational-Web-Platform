@extends('coach-profile-settings.settings-wrapper')

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

@section('settings-content')
    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Video Sessions</h5>
        <table>
          <tr>
            <th style="width: 25%">Session Name</th>
            <th style="width: 25%">Session Pass</th>
            <th style="width: 25%">Started At</th>
            <th style="width: 25%">Ended At</th>
          </tr>
        @foreach($vsess as $sess)
          <tr>
            <td style="width: 25%">{{$sess->session_name}}</td>
            <td style="width: 25%">{{$sess->session_pass}}</td>
            <td style="width: 25%">
                Date: {{date_format($sess->created_at,"Y/m/d")}}
                Time: {{date_format($sess->created_at,"H:i")}}
            </td>
            <td style="width: 25%">
                N/A
            </td>
          </tr>
        @endforeach
    </table>

    </div>
    
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    
</script>
@endpush
