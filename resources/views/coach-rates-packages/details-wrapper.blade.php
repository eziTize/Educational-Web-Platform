@extends('custom-theme.master')

@section('content')


<!-- ==========Banner-Section========== -->
<section class="main-page-header speaker-banner bg_img">
    <div class="container">
        <div class="speaker-banner-content">
            <h2 class="title">Rates & packages</h2>
            <ul class="breadcrumb">
                <li style="text-transform: inherit">
                    Packages that you will add here will become the bookable services for the customers.
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Profile-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center flex-wrap-reverse mb--50">
            <div class="col-lg-12 mb-50">
                <button onclick="location.href = '{{ url('/dashboard') }}'" class="sess-btn py-2" style="background-color: #603189; margin-bottom: 25px;">Dashboard</button>
                <div class="movie-details single-coach-other-details" style="clear: both;">
                    <!-- ==========Profile-Section description ========== -->
                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li class="active">
                                Rates
                            </li>
                           <li>
                                Packages
                            </li>
                        </ul>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="mb-5 clearfix">
                                    <button class="btn btn-primary w-auto d-inline-block float-right" data-toggle="modal" data-target="#createRateModal">ADD NEW RATES</button>
                                </div>
                                
                                @forelse ($allRate as $rate)
                                    @include('coach-rates-packages.list-item-rates',['service'=>$rate])
                                @empty
                                    
                                @endforelse
                            </div>

                            <div class="tab-item">
                                <div class="mb-5 clearfix">
                                    <button class="btn btn-primary w-auto d-inline-block float-right" data-toggle="modal" data-target="#createPackageModal">CREATE A NEW PACKAGE</button>
                                </div>

                                @forelse ($allPackage as $package)
                                    @include('coach-rates-packages.list-item-packages',['service'=>$package])
                                @empty
                                    
                                @endforelse
                            </div>
                            
                        </div>

                    </div>
                    <!-- ==========Profile-Section description ========== -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Profile-Section========== -->

@include('coach-rates-packages.rates-forms.create')
@includeWhen($singleService!=null, 'coach-rates-packages.rates-forms.update', ['service' =>$singleService])
@include('coach-rates-packages.packages-forms.create')

@endsection
@push('scripts')
<script>
$(document).ready(function(){
    @if (request('openModel')!=null)
        $('#{{ request('openModel') }}').modal('show');
    @endif
    @if ($singleService)
        $('#updateRateModal').modal('show');
    @endif

})
</script>
@endpush