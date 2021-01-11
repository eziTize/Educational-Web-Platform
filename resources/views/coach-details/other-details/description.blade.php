@php($IDuser = Request::segment(3))
<?php
$rates = App\Models\TeacherService::where('type', 'rates')->where('user_id', $IDuser)->get();
?>
<h3 class="title" style="color: #603189;">BIO</h3>
<div class="bio_div" style="color: black; margin-top: 12px; margin-bottom: 6vh;">
    {!! $teacher['description']['description'] !!}
</div>

<h3 style="color: #603189; font-size: 16px;">Transformations Offered By This Coach</h3>
<div style="color: black; margin-top: 12px; margin-bottom: 6vh;" id="bookingOptions">
    @forelse ($teacher['transformations']['data'] as $item)
        &#8227; {{ $item['title'] }}
    @empty
        N.A
    @endforelse
</div>

<div class="tab summery-review">
    <ul class="tab-menu">
        <li class="active">
            Coaching Sessions
        </li>
        <li>
            Accomplishments
        </li>
        <li>
            Hobbies
        </li>
        <li>
            Top Skills
        </li>
    </ul>
    <div class="tab-area">
        <div class="tab-item active">
                @forelse ($rates as $service)
                    @include('coach-details.other-details.services',['service'=>$service])
                @empty
                    <h6 style="color: black">N.A</h6>
                @endforelse

            {{-- <div class="load-more text-center">
                <a href="#0" class="custom-button transparent">load more</a>
            </div> --}}
        </div>
        {{--<div class="tab-item">
            <div class="item coach-description" style="color: black">
                {!! $teacher['description']['description'] !!}
            </div>
        </div>--}}
        <div class="tab-item">
            <div class="item coach-description">
                @forelse ($teacher['accomplishments']['data'] as $item)
                    <h6 style="color: black">&#8227; {{ $item['title'] }}</h6>
                @empty
                <h6 style="color: black">N.A</h6>
                @endforelse
            </div>
        </div>
        <div class="tab-item">
            <div class="item coach-description">
                @forelse ($teacher['hobbies']['data'] as $item)
                    <h6 style="color: black">&#8227; {{ $item['title'] }}</h6>
                @empty
                <h6 style="color: black">N.A</h6>
                @endforelse
            </div>
        </div>
         <div class="tab-item">
            <div class="item coach-description">
                @forelse ($teacher['skills']['data'] as $item)
                 <h6 style="color: black;">&#8227; {{ $item['title'] }}</h6>
                @empty
                <h6 style="color: black">N.A</h6>
                @endforelse
            </div>
        </div>
    </div>
</div>