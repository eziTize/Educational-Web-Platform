<?php
$pdev = App\Models\TeacherService::where('type', 'dpack')->get();
?>
<div class="owl-carousel owl-theme tab-slider">
    @forelse ($pdev as $package)
        @include('home-page.packages.list-packages.list-item',[
            'package'=>$package
        ])
    @empty
        No Packages available.
    @endforelse
</div>