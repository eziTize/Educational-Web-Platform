@extends('custom-theme.master')

@section('content')

<!-- ==========Banner-Section========== -->
@include('coach-details.personal-details-wrapper',['teacher'=>$teacher])
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
@include('coach-details.booking-actions',['teacher'=>$teacher])
<!-- ==========Book-Section========== -->

<!-- ==========Profile-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success mt-4 mb-4" style="margin-left: 12vh;">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger mt-4 mb-4" style="margin-left: 12vh;">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger mt-4 mb-4" style="margin-left: 12vh;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center flex-wrap-reverse mb--50">

            <!-- ==========Sidebar ========== -->
            {{-- @include('coach-details.sidebar-wrapper') --}}
            <!-- ==========Sidebar ========== -->

            <div class="col-lg-9 mb-50">
                <div class="movie-details single-coach-other-details">

                    <!-- ==========Profile-Section description ========== -->
                    @include('coach-details.other-details.description',['teacher'=>$teacher])
                    <!-- ==========Profile-Section description ========== -->

                    <!-- ==========Profile-Section photos ========== -->
                    @include('coach-details.other-details.photos',['teacher'=>$teacher])
                    <!-- ==========Profile-Section photos ========== -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Profile-Section========== -->

@endsection