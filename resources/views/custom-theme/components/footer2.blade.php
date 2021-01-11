<!-- ==========Newslater-Section========== -->
<footer class="footer-section">

    @guest
    <div class="newslater-section padding-bottom">
        <div class="container">
            <div class="newslater-container bg_img" data-background="{{url('custom-theme/assets/images/newslater/newslater-bg01.jpg')}}">
                <div class="newslater-wrapper">
                    <h5 class="cate">Book your session with {{ config('app.name', 'Laravel') }} </h5>
                   <!-- <h3 class="title">to get exclusive benefits</h3> -->
                    <form class="newslater-form">
                       <input type="text" placeholder="Your Email Address">
                        <button type="button">Book Now</button>
                    </form>
                    <p>We respect your privacy, so we never share your info</p>
                </div>
            </div>
        </div>
    </div>
    @endguest
    
    <div class="container ">
        <div class="footer-top">
          <!--  <div class="logo">
                <a href="index-1.html">
                    <img src="{{url('custom-theme/assets/images/footer/footer-logo.png')}}" alt="footer">
                </a>
            </div> -->
            
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-area">
                <div class="left">
                    <p>Copyright © 2020.All Rights Reserved By <a href="#0">{{ config('app.name', 'Laravel') }} </a></p>
                </div>
                <ul class="links">
                    <li>
                        <a href="#0">About</a>
                    </li>
                    <li>
                        <a href="{{ url('privacy-policies') }}">Terms Of Use</a>
                    </li>
                    <li>
                        <a href="{{ url('privacy-policies') }}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ url('faq') }}">FAQ</a>
                    </li>
                    <li>
                        <a href="#0">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- ==========Newslater-Section========== -->