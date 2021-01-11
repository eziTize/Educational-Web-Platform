@php ($user = Auth::user())
<div class="booking-summery bg-one" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%); margin-bottom: 25px">
    <h4 class="title">
    @if(url($user['profile_image']))
        <img class="common-profile-pic mr-2" src="{{url($user['profile_image'])}}" height="35px" width="35px" alt="profile-image">
    @else
        <img class="common-profile-pic mr-2" src="{{url('custom-theme/assets/images/account/placeholder-user-400x400.png')}}" alt="profile-image">
    @endif
    User Settings</h4>
    <ul>
        <li>
            <a href="{{ route('profile.dashboard') }}"><h6 class="subtitle">Dashboard</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.settings.index') }}"><h6 class="subtitle">Contact Info</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.profile.settings') }}"><h6 class="subtitle">Profile Settings</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.services.index') }}"><h6 class="subtitle">Rates & Packages</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.profile.show',['id'=>Auth::id()]) }}"><h6 class="subtitle">Public Profile</h6></a>
        </li>
         <li>
            <a href="{{ route('teacher.profile.getpaid') }}"><h6 class="subtitle">Get Paid</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.profile.coachees') }}"><h6 class="subtitle">My Students</h6></a>
        </li>
        <li>
            <a href="{{ route('teacher.profile.bookings') }}"><h6 class="subtitle">My Bookings</h6></a>
        </li>
         <li>
            <a href="{{ url('/messages') }}"><h6 class="subtitle">Messages</h6></a>
        </li>
        <li>
            <a href="#"><h6 class="subtitle">Send Mail</h6></a>
        </li>
        <li>
            <a href="#"><h6 class="subtitle">Transaction Details</h6></a>
        </li>
        <li>
            <a href="{{route('teacher.profile.reports')}}"><h6 class="subtitle">Reports</h6></a>
        </li>
       {{-- <li>
            <a href="{{ route('teacher.profile.sessions') }}"><h6 class="subtitle">Video Sessions</h6></a>
        </li>
        <li>
            <a 
                        href="{{ route('tw.session.create') }}" 
                        onclick="event.preventDefault();
                        Swal.fire({
                            title: 'Start a Session?',
                            showCancelButton: true,
                            //confirmButtonColor: 'blue',
                            confirmButtonText: `Yes`,
                            cancelButtonText: `Cancel`,
                          }).then((result) => {
                            if (result.isConfirmed) {
                              document.getElementById('start_session_form').submit()
                              }
                          });"><h6 class="subtitle">Start A Session</h6></a>
                        <form id="start_session_form" action="{{ route('tw.session.create') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
        </li> --}}
        <li>
            <a href="{{ route('teacher.profile.security') }}"><h6 class="subtitle">Password & Security</h6></a>
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

                
                   
        