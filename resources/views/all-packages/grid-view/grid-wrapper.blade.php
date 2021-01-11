<?php
$packs = App\Models\TeacherService::where('type', '!=','rates')->get();
?>
<div class="row mb-10 justify-content-center">
	@forelse ($packs as $package)
        @include('all-packages.grid-view.grid-item',[
            'package'=>$package
        ])
    @empty
        No Packages available.
    @endforelse
</div>
	