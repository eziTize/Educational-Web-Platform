<!-- ==========Newslater-Section========== -->
<footer class="footer-section">

    <div class="newslater-section padding-bottom">
        <div class="container">
            <div class="newslater-container bg_img">
                <div class="newslater-wrapper">
                    <h5 class="cate">Book your Free session with {{ config('app.name', 'Laravel') }} </h5>
                   <!-- <h3 class="title">to get exclusive benefits</h3> -->
                        <button class="footer-btn" type="button" onclick="location.href = '{{ route('teachers.show.all') }}'">Book Now</button>
                </div>
            </div>
        </div>
    </div>
  
    
    <div class="container">
        <div class="footer-top">
            <div class="logo">
                <a href="#">
                    <img src="{{url('custom-theme/assets/images/footer/footer-logo.png')}}" alt="footer" style="height: 7vh">
                </a>
            </div>
            <ul class="social-icons">
                <li>
                    <a href="#0">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-google"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-area">
                <div class="left">
                    <p>Copyright © 2020.All Rights Reserved By <a href="#0">{{ config('app.name', 'Laravel') }} </a></p>
                </div>
                <ul class="links">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('about-us') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('contact-us') }}">Contact Us</a>
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