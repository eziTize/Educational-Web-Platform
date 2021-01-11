<div class="owl-carousel owl-theme tab-slider">
    @forelse ($teachers as $teacher)
        @include('home-page.coaches.list-coaches.list-item',[
            'teacher'=>$teacher
        ])
    @empty
        
    @endforelse
</div>