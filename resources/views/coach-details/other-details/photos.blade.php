@if($teacher['certification']['data'])
<h3 class="title" style="color: #603189; margin-top: 7vh;">certifications</h3>
<div class="details-photos owl-carousel">
	@forelse ($teacher['certification']['data'] as $cert)
        <div class="thumb">
             <a href="{{url($cert['certificate'])}}" >
                <img src="{{url($cert['certificate'])}}" type="application/pdf" alt="certificate">
            </a>
        </div>
    @empty
	@endforelse
</div>
@endif