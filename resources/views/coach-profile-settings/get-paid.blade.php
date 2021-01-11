@extends('coach-profile-settings.settings-wrapper')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('teacher.profile.getpaidUpdate') }}" method="post">
    @csrf
    <div class="checkout-widget checkout-contact common-design-form" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
        <h5 class="title">Bank Details</h5>

            <div class="form-group">
                <label for="ac_holder">Full Name</label>
                <input class="form-control @error('ac_holder') is-invalid @enderror" type="text" placeholder="Full Name" id="ac_holder" name="ac_holder" value="{{ $payout->ac_holder }}">
                @error('ac_holder')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ac_no">Account Number</label>
                <input class="form-control  @error('ac_no') is-invalid @enderror" type="text" placeholder="Enter your Account Bank Number" name="ac_no" id="ac_no" value="{{ $payout->ac_no }}">
                @error('ac_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="rnib">ABA Routing Number / IBAN</label>
                <input class="form-control  @error('rnib') is-invalid @enderror" type="text" placeholder="Enter your Routing Number or IBAN" name="rnib" id="rnib" value="{{ $payout->rnib }}">
                @error('rnib')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

             <div class="form-group">
                <label for="tax_no">TAX ID/No.</label>
                <input class="form-control  @error('tax_no') is-invalid @enderror" type="text" placeholder="Enter your Tax ID/Number" name="tax_no" id="tax_no" value="{{ $payout->tax_no }}">
                @error('tax_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class="row">
            <div class="form-group col-lg-6">
                <label for="ac_type">Account Type</label>
                <select class="form-control-2 @error('ac_type') is-invalid @enderror" type="text" placeholder="Private/Business" name="ac_type" id="ac_type" value="{{ $payout->ac_type }}">
                    <option value="Private">Private</option>
                    <option value="Business">Business</option>
                </select>
                @error('ac_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-lg-6">
                <label for="country">Country</label>
                <input class="form-control @error('country') is-invalid @enderror" type="text" placeholder="Enter your Country" name="country" id="country"  value="{{ $payout->country }}">
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
             <div class="form-group col-lg-6">
                <label for="city">City</label>
                <input class="form-control @error('city') is-invalid @enderror" type="text" placeholder="Enter your Country" name="city" id="city"  value="{{ $payout->city }}">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="postcode">Postal Code</label>
                <input class="form-control @error('postcode') is-invalid @enderror" type="text" placeholder="Enter your Postal Code" name="postcode" id="postcode"  value="{{ $payout->postcode }}">
                @error('postcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

            <div class="form-group">
                <label for="st_addr">Street Address</label>
                <input class="form-control @error('st_addr') is-invalid @enderror" type="text" placeholder="Enter your Street Address" name="st_addr" id="st_addr"  value="{{ $payout->st_addr }}">
                @error('st_addr')
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
