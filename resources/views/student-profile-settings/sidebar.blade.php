@php ($user = Auth::user())
<?php
$profile = App\Models\StudentProfile::where('user_id', $user->id)->firstOrFail();
?>
<div class="booking-summery bg-one" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%); margin-bottom: 25px">
    <h4 class="title">
    @if($profile->profile_img)
        <img class="common-profile-pic mr-2" src="{{asset('student_uploads/profile_images/'.$profile->profile_img)}}" height="35px" width="35px" alt="profile-image">
    @else
        <img class="common-profile-pic mr-2" src="{{url('custom-theme/assets/images/account/placeholder-user-400x400.png')}}" alt="profile-image">
    @endif
    User Settings</h4>
    <ul>
        <li>
            <a href="{{ route('profile.dashboard') }}"><h6 class="subtitle">Dashboard</h6></a>
        </li>
        <li>
            <a href="{{ route('student.settings.index') }}"><h6 class="subtitle">Contact Settings</h6></a>
        </li>
        <li>
            <a href="{{ route('student.profile.settings') }}"><h6 class="subtitle">Profile Settings</h6></a>
        </li>
        <li>
            <a href="{{ route('student.profile.bookings') }}"><h6 class="subtitle">My Bookings</h6></a>
        </li>
        <li>
            <a href="{{ route('student.profile.coaches') }}"><h6 class="subtitle">My Coaches</h6></a>
        </li>
        <li>
            <a href="{{ url('/messages') }}"><h6 class="subtitle">Messages</h6></a>
        </li>
        <li>
            <a href="{{route('student.profile.reports')}}"><h6 class="subtitle">Reports</h6></a>
        </li>
        {{--<li>
            <a href="{{ route('student.profile.qa-settings') }}"><h6 class="subtitle">Q/A Settings</h6></a>
        </li> --}}
        <li>
            <a href="{{ route('student.profile.security') }}"><h6 class="subtitle">Password & Security</h6></a>
        </li>
        <li>
            <a href="#"><h6 class="subtitle">Support</h6></a>
        </li>
    </ul>
     <a href="{{ route('logout') }}"
                    class="custom-button back-button"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="margin-top: 20px; margin-bottom: 20px; text-align: center;">
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


</div>

                
                   
        