@extends('coach-profile-settings.settings-wrapper')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('teacher.settings.update') }}" method="post">
    @csrf
    @method('put')
    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Account</h5>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="name">First Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Full Name" id="name" name="name" value="{{ old('name',$teacher['first_name']) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label for="last_name">Last Name</label>
                    <input class="form-control @error('last_name') is-invalid @enderror"  type="text" placeholder="Full Name" name="last_name" id="last_name" value="{{ old('last_name',$teacher['last_name']) }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control  @error('email') is-invalid @enderror" type="email" placeholder="Enter your Mail" name="email" id="email" value="{{ old('email',$teacher['email']) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input class="form-control @error('contact_number') is-invalid @enderror" type="text" placeholder="Enter your Phone Number" name="contact_number" id="contact_number"  value="{{ old('contact_number',$teacher['contact_number']) }}">
                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-4 clearfix">
                <input type="submit" value="Save" class="custom-button float-right" style="width: 30%;">
            </div>
    </div>
    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Location</h5>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" class="js-example-basic-single form-control  @error('country') is-invalid @enderror" id="country">
                        @if(Auth::user()->country)
                            <option value="{{ Auth::user()->country }}" style="background-color: black;">{{ Auth::user()->country }}</option>
                        @endif
                        @forelse ($country as $cy)
                        @if($cy['country_name'] != Auth::user()->country)
                            <option value="{{ $cy['country_name'] }}" style="background-color: black;">{{ $cy['country_name'] }}</option>
                        @endif
                        @empty
                        @endforelse
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="zone_id">Time Zone</label>
                    <select name="zone_id" class="js-example-basic-single form-control  @error('zone_id') is-invalid @enderror" id="zone_id">
                        @if(Auth::user()->zone_id)
                            <option value="{{ Auth::user()->zone_id }}" style="background-color: black;">{{ $zone->find(Auth::user()->zone_id)->zone_name }}</option>
                        @endif
                        @forelse ($timezones as $timezone)
                        @if($timezone['zone_id'] != Auth::user()->zone_id)
                            <option value="{{ $timezone['zone_id'] }}" style="background-color: black;">{{ $timezone['zone_name'] }}</option>
                        @endif
                        @empty
                        @endforelse
                    </select>
                    @error('zone_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control @error('city') is-invalid @enderror" type="text" placeholder="Enter your City" name="city" id="city"  value="{{ $teacher['city'] }}">
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea  class="form-control  @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ old('address',$teacher['address']) }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-4 clearfix">
                    <input type="submit" value="Save" class="custom-button float-right" style="width: 30%;">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        var zone_selector = $('#zone_id').select2({
            placeholder: 'Select an option'
        });
         var country_selector = $('#country').select2({
            placeholder: 'Select an option'
        });
        if('{{ $teacher["address"] }}'!=null || '{{ $teacher["address"] }}'!=''){
            zone_selector.val('{{ $teacher["zone_id"] }}');
            zone_selector.trigger('change');
        }
    });
</script>
@endpush