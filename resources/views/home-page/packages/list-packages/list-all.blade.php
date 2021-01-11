<?php
$packs = App\Models\TeacherService::where('type', '!=','rates')->get();
?>
<div class="owl-carousel owl-theme tab-slider">
    @forelse ($packs as $package)
        @include('home-page.packages.list-packages.list-item',[
            'package'=>$package
        ])
    @empty
        No Packages available.
    @endforelse
</div>