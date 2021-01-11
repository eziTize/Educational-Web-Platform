<div class="tab-item active">
    <div class="movie-area mb-10">
        @forelse ($teachers as $teacher)
            @include('all-coaches.list-view.list-item',[
                'teacher'=>$teacher
            ])
        @empty
    
        @endforelse
    </div>
</div>