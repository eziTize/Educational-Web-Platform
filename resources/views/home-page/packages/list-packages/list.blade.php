<?php
$biz = App\Models\TeacherService::where('type', 'bpack')->get();
?>
<div class="owl-carousel owl-theme tab-slider">
    @forelse ($biz as $package)
        @include('home-page.packages.list-packages.list-item',[
            'package'=>$package
        ])
    @empty
        No Packages available.
    @endforelse
</div>