<section class="details-banner bg_img" data-background="{{url('uploads/header-bg-1.jpg')}}">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-thumb">
                <img src="{{url($teacher['profile_image'])}}" alt="Profile Image">
                <a href="#" class="video-popup" onclick="lightbox_open();">
                    <img src="{{url('custom-theme/assets/images/movie/video-button.png')}}" alt="video">
                </a>
            </div>
              <div id="v-light">
              <a class="v-boxclose" id="v-boxclose" onclick="lightbox_close();"></a>
              <video id="IntroVideo" width="600" controls>
                  <source src="{{url($teacher['profile_video'])}}" type="video/mp4">
                  <!--Browser does not support <video> tag -->
                    Not Supported
                </video>
            </div>
            <div id="v-fade" onClick="lightbox_close();"></div>

            <div class="details-banner-content offset-lg-3">
                <h3 class="title">{{ $teacher['full_name'] }}</h3>
                <div class="tags">
                    @forelse ($teacher['languages']['data'] as $item)
                    <a href="#0">{{ $item['name'] }}</a>
                    @empty
                        <a href="#0">N.A</a>
                    @endforelse
                   <!-- <a href="#0">English</a>
                    <a href="#0">Hindi</a>
                    <a href="#0">Telegu</a>
                    <a href="#0">Tamil</a> -->
                </div>
                @forelse ($teacher['categories']['data'] as $item)
                    <a href="#0" class="button">{{ $item['name'] }}</a>
                @empty
                    <a href="#0" class="button">N.A</a>
                @endforelse
                <div class="social-and-duration">
                    <ul class="social-share">
                        @if($teacher['extras']['facebook'])
                        <li><a href="{{$teacher['extras']['facebook']}}"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if($teacher['extras']['twitter'])
                        <li><a href="{{$teacher['extras']['twitter']}}"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if($teacher['extras']['pinterest'])
                        <li><a href="{{$teacher['extras']['pinterest']}}"><i class="fab fa-pinterest-p"></i></a></li>
                        @endif
                        @if($teacher['extras']['linkedin'])
                        <li><a href="{{$teacher['extras']['linkedin']}}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif
                        @if($teacher['extras']['insta'])
                        <li><a href="{{$teacher['extras']['insta']}}"><i class="fab fa-instagram"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
