@extends('custom-theme.master_profile')

@section('content')
<div class="movie-facility padding-bottom padding-top profile-settings-wrapper common-design-form">
    <div class="container">
        @if (session()->has('success_message'))

            <div class="alert alert-success mt-4">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))

            <div class="alert alert-danger mt-4">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if(count($errors) > 0)

            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                @include('coach-profile-settings.sidebar')
                
            </div>
            <div class="col-lg-8">
                @yield('settings-content')
            </div>
        </div>
    </div>
</div>
@endsection