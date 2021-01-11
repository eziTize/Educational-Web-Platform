@extends('coach-profile-settings.settings-wrapper')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('teacher.profile.securityUpdate') }}" method="post">
    @csrf
    @method('put')
    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Security</h5>

            <div class="form-group">
                <label for="password">New Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="New Password" id="password" name="password" value="">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control  @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Confirm New Password" name="password_confirmation" id="password_confirmation" value="">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-4 clearfix">
                <input type="submit" value="Save" class="custom-button float-right" style="width: 30%;">
            </div>
    </div>
</form>  
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    
</script>
@endpush
