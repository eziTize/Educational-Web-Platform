@extends('student-profile-settings.settings-wrapper')
@inject('Arr', 'Illuminate\Support\Arr')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('student.profile.update') }}" class="payment-card-form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        Profile Settings
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <br>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control-2 @error('gender') is-invalid @enderror" type="text" placeholder="Private/Business" name="gender" id="gender" value="{{ $profile->gender }}">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="dob">Date of birth</label>
        <input class="form-control @error('dob') is-invalid @enderror"  type="date" placeholder="Enter DOB" name="dob" id="dob" value="{{ $profile->dob }}">
        @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="job">Current Occupation/Job</label>
            <input class="form-control @error('job') is-invalid @enderror"  type="text" placeholder="Your Occupation/Job" name="job" id="job" value="{{ $profile->job }}">
            @error('job')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

   <!-- <div class="form-group">
        <label for="teacher_average_price">Our Service Deductions</label>
        <input class="form-control"  type="text" name="service_price" id="service_price" value="30%" readonly>
    </div> -->
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Profile Image 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        <div class="form-group">
            @if($profile->profile_img)
            <img class="common-profile_image" src="{{asset('student_uploads/profile_images/'.$profile->profile_img)}}" alt="Profile Image">
            @else
            <p> Please Upload a Profile Image </p>
            @endif
        </div>
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control previewable-image @error('profile_img*') is-invalid @enderror" id="inputGroupProfileImage" name="profile_img" data-target="#upload-profile-preview" multiple>
                    <label class="custom-file-label" for="inputGroupProfileImage" aria-describedby="inputGroupProfileImage">Choose file</label>
                    @error('profile_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <img class="common-profile_image" id="upload-profile-preview" src="{{$profile->profile_img}}" alt="Profile Image">
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        5 Words to Describe Yourself
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="describe" id="describe" rows="5">{{ $profile->describe }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What Motivates you?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="motivates" id="motivates" rows="15">{{ $profile->motivates }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What are your Hobbies?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="hobbies" id="hobbies" rows="15">{{ $profile->hobbies }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What would you like to have achieved by the end of this session?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_1" id="ans_1" rows="15">{{ $qa->ans_1 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What’s missing in your life right now?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_2" id="ans_2" rows="15">{{ $qa->ans_2 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What would you like more of in your life?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_3" id="ans_3" rows="15">{{ $qa->ans_3 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What would you like less of?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_4" id="ans_4" rows="15">{{ $qa->ans_4 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        If you could change just ONE thing right now, what would it be?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_5" id="ans_5" rows="15">{{ $qa->ans_5 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        How specifically will you know you’ve completed that action/goal?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_6" id="ans_6" rows="15">{{ $qa->ans_6 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What do you NOT want the coach to ask you?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_7" id="ans_7" rows="15">{{ $qa->ans_7 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        What’s wrong with how you are right now?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_8" id="ans_8" rows="15">{{ $qa->ans_8 }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        Where are you already awesome?
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="ans_9" id="ans_9" rows="15">{{ $qa->ans_9 }}</textarea>
    </div>
</div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ url('theme-customizations/libraries/ckeditor/ckeditor.js') }}"></script>
<style>
    .cke_chrome{
        border: none;
    }
    .cke_inner{
        background:transparent;
    }
</style>
<script>
$(document).ready(function() {

        // Replace the <textarea id="description"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('describe',{
            height: 100
        });
        CKEDITOR.replace( 'motivates',{
            height: 100
        });
        CKEDITOR.replace( 'hobbies',{
            height: 100
        });
        CKEDITOR.replace( 'ans_1',{
            height: 100
        });
        CKEDITOR.replace( 'ans_2',{
            height: 100
        });
        CKEDITOR.replace( 'ans_3',{
            height: 100
        });
        CKEDITOR.replace( 'ans_4',{
            height: 100
        });
        CKEDITOR.replace( 'ans_5',{
            height: 100
        });
        CKEDITOR.replace( 'ans_6',{
            height: 100
        });
        CKEDITOR.replace( 'ans_7',{
            height: 100
        });
        CKEDITOR.replace( 'ans_8',{
            height: 100
        });
        CKEDITOR.replace( 'ans_9',{
            height: 100
        });

    });
</script>
@endpush