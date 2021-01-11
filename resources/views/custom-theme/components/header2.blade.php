@php ($user = Auth::user())

<style>

#profile_pic_c img {
   width: 28px;
   height: 28px;
}
</style>
<!-- ==========Header-Section========== -->
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{url('custom-theme/assets/images/logo/logo.png')}}" alt="logo" style="height: 7vh">
                </a>
            </div>
            <ul class="menu">
                @role('student')
                    <li>
                        <a href="{{ route('teachers.show.all') }}">Coaches</a>
                    </li>
                    <li>
                        <a href="{{ url('all-packages') }}">Packages</a>
                    </li>
                @endrole
                @guest
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('teachers.show.all') }}">Coaches</a>
                    </li>
                    <li>
                        <a href="{{ url('all-packages') }}">Packages</a>
                    </li>
                    <li>
                        <a href="{{ url('about-us') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('contact-us') }}">Contact Us</a>
                    </li>
                 <!--    <li class="header-button pr-3">
                        <a href="{{ route('register') }}">join us</a>
                    </li>
                   Or, -->
                    <li class="header-button pr-0">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @role('teacher')
                    <<li>
                        <a href="{{ route('teacher.profile.bookings') }}">My bookings</a>
                    </li>
                   <!-- <li>
                        <a href="{{ route('teachers.show.all') }}">Coaches</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Reports</a>
                    </li>-->
                    <li>
                        <a href="{{ route('teachers.show.all') }}">Coaches</a>
                    </li>
                    <li> 
                        <a href="{{ route('teacher.services.index') }}">Rates & Packages</a>
                    </li>
                    
                    <li>
                      <a href="{{ url('/messages') }}">Messages</a>
                    </li>
                    <li>
                        <a href="#0"><i class="fas fa-bell"></i></a>
                        <ul class="submenu">
                            <li>
                                <a href="blog.html">Lorem Ipsum is simply dummy text of the printing..</a>
                            </li>
                            <li>
                                <a href="blog-details.html">Lorem Ipsum is simply dummy text of the printing..</a>
                            </li> 
                        </ul>
                    </li>
                    <li class="flex space-x-1">
                    @if(url($user['profile_image']))
                     <a id="profile_pic_c" href="{{ route('profile.dashboard') }}">{{ Auth::user()->name }} 
                            <img class="profile-image" src="{{url($user['profile_image'])}}" object-fit="contain" alt="profile-image">
                        </a>
                    @else
                        <a href="{{ route('profile.dashboard') }}">{{ Auth::user()->name }} 
                            <img class="profile-image" src="{{url('custom-theme/assets/images/account/placeholder-user-400x400.png')}}" alt="profile-image">
                        </a>
                    @endif
                    </li>
                    <li class="header-button-2">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="margin-top: 20px; margin-bottom: 20px; text-align: center;">
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
                @endrole
                @role('student')
                <?php
                    $StudentProfile = App\Models\StudentProfile::where('user_id', $user->id)->firstOrFail(); 
                ?>
                    <li>
                        <a href="{{ route('student.profile.bookings') }}">My bookings</a>
                    </li>
                 <!--   <li>
                        <a href="{{ url('/') }}">Reports</a>
                    </li> -->
                   <!-- <li>
                        <a href="{{ url('/') }}"><i class="fas fa-cart-arrow-down"></i></a>
                    </li> -->
                    <li>
                      <a href="{{ url('/messages') }}">Messages</a>
                    </li>
                    <li>
                        <a href="#0"><i class="fas fa-bell"></i></a>
                        <ul class="submenu">
                            <li>
                                <a href="blog.html">Lorem Ipsum is simply dummy text of the printing..</a>
                            </li>
                            <li>
                                <a href="blog-details.html">Lorem Ipsum is simply dummy text of the printing..</a>
                            </li>
                        </ul>
                    </li>
                    <li class="flex space-x-1">
                    @if($StudentProfile->profile_img)
                     <a id="profile_pic_c" href="{{ route('profile.dashboard') }}">{{ Auth::user()->name }} 
                            <img class="profile-image" src="{{asset('student_uploads/profile_images/'.$StudentProfile->profile_img)}}" object-fit="contain" alt="profile-image">
                        </a>
                    @else
                        <a href="{{ route('profile.dashboard') }}">{{ Auth::user()->name }} 
                            <img class="profile-image" src="{{url('custom-theme/assets/images/account/placeholder-user-400x400.png')}}" alt="profile-image">
                        </a>
                    @endif
                    </li>
                    <li class="header-button-2">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="margin-top: 20px; margin-bottom: 20px; text-align: center;">
                        Log out
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </li>
                @endrole
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
<!-- ==========Header-Section========== -->