@extends('coach-profile-settings.settings-wrapper')
@inject('Arr', 'Illuminate\Support\Arr')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('teacher.profile.update') }}" class="payment-card-form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        Profile Settings
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <label for="visibility">Visibility</label>
        <select name="teacher_profile_visibility" class="js-example-basic-single form-control @error('teacher_profile_visibility') is-invalid @enderror" style="width: 100%" id="teacher_profile_visibility">
            <option value="1" selected>Publish</option>
            <option value="0">Unpublish</option>
        </select>
        @error('teacher_profile_visibility')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <p class="mt-3"><strong>Publish -</strong> Your profile will be visible to the entire Internet including coachee etc.</p>
        <p><strong>Unpublish -</strong> make (content that has previously been published online) unavailable to the public.</p>
    </div>
    <br>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="teacher_profile_gender" class="js-example-basic-single form-control @error('teacher_profile_gender') is-invalid @enderror" style="width: 100%" id="teacher_profile_gender">
            <option value="Female">Female</option>
            <option value="Male">Male</option>
        </select>
        @error('teacher_profile_gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="teacher_dob">Date of birth</label>
        <input class="form-control @error('teacher_dob') is-invalid @enderror"  type="date" placeholder="Enter DOB" name="teacher_dob" id="teacher_dob" value="{{ old('teacher_dob',$teacher['extras']['dob']) }}">
        @error('teacher_dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="visibility">Willing to Travel ?</label>
        <select name="teacher_travel_willingness" class="js-example-basic-single form-control @error('teacher_travel_willingness') is-invalid @enderror" style="width: 100%" id="teacher_travel_willingness">
            <option value="1" selected>Yes</option>
            <option value="0">No</option>
        </select>
        @error('teacher_travel_willingness')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="teacher_average_price">Your Hourly Price($/hr)</label>
        <input class="form-control @error('teacher_average_price') is-invalid @enderror"  type="number" placeholder="Enter Hourly Price" name="teacher_average_price" id="teacher_average_price" min="0" value="{{ old('teacher_average_price',$teacher['extras']['average_price']) }}" required>
        @error('teacher_average_price')
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
    <h5 class="title width-100">
        Social Profile Links
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
     <div class="form-group">
        <label for="teacher_facebook">Facebook Profile URL</label>
        <input class="form-control @error('teacher_facebook') is-invalid @enderror"  type="text" placeholder="Enter Facebook Profile URL" name="teacher_facebook" id="teacher_facebook" value="{{ old('teacher_facebook',$teacher['extras']['facebook']) }}">
        @error('teacher_facebook')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="teacher_twitter">Twitter Profile URL</label>
        <input class="form-control @error('teacher_twitter') is-invalid @enderror"  type="text" placeholder="Enter Twitter Profile URL" name="teacher_twitter" id="teacher_twitter" value="{{ old('teacher_twitter',$teacher['extras']['twitter']) }}">
        @error('teacher_twitter')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="teacher_insta">Insta Profile URL</label>
        <input class="form-control @error('teacher_insta') is-invalid @enderror"  type="text" placeholder="Enter Insta Profile URL" name="teacher_insta" id="teacher_insta" value="{{ old('teacher_insta',$teacher['extras']['insta']) }}">
        @error('teacher_insta')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="teacher_linkedin">Linkedin Profile URL</label>
        <input class="form-control @error('teacher_linkedin') is-invalid @enderror"  type="text" placeholder="Enter Linkedin Profile URL" name="teacher_linkedin" id="teacher_linkedin" value="{{ old('teacher_linkedin',$teacher['extras']['linkedin']) }}">
        @error('teacher_linkedin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="teacher_pinterest">Pinterest Profile URL</label>
        <input class="form-control @error('teacher_pinterest') is-invalid @enderror"  type="text" placeholder="Enter Pinterest Profile URL" name="teacher_pinterest" id="teacher_pinterest" value="{{ old('teacher_pinterest',$teacher['extras']['pinterest']) }}">
        @error('teacher_pinterest')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Profile Image 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        <div class="form-group">
            <img class="common-profile_image" src="{{url($teacher['profile_image'])}}" alt="Profile Image">
        </div>
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control previewable-image @error('profile_image*') is-invalid @enderror" id="inputGroupProfileImage" name="profile_image" data-target="#upload-profile-preview" multiple>
                    <label class="custom-file-label" for="inputGroupProfileImage" aria-describedby="inputGroupProfileImage">Choose file</label>
                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <img class="common-profile_image" id="upload-profile-preview" src="{{url($teacher['profile_image'])}}" alt="Profile Image">
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Intro Video
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        <div class="form-group">
            <video id="IntroVideo" width="600" controls>
                <source class="certificate_img" src="{{url($teacher['profile_video'])}}" type="video/mp4" alt="Intro Video">
                <!--Browser does not support <video> tag -->
                Not Supported
            </video>
        </div>
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control previewable-video @error('profile_video*') is-invalid @enderror" id="inputGroupProfileVideo" name="profile_video" data-target="#upload-video-preview" multiple>
                    <label class="custom-file-label" for="inputGroupProfileVideo" aria-describedby="inputGroupProfileVideo">Choose file</label>
                    @error('profile_video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <video id="IntroVideo" width="600" controls>
                <source class="certificate_img" src="{{url($teacher['profile_video'])}}" type="video/mp4" alt="Intro Video">
                <!--Browser does not support <video> tag -->
                Not Supported
            </video>
        </div>
    </div>
</div>

<!-- <div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Cover Image 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        <div class="form-group">
            <img class="common-banner_image img-fluid" src="{{url($teacher['banner_image'])}}" alt="Cover Image">
        </div>
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input previewable-image @error('profile_image*') is-invalid @enderror" id="inputGroupBannerImage" name="banner_image" data-target="#upload-banner-preview">
                    <label class="custom-file-label" for="inputGroupBannerImage" aria-describedby="inputGroupBannerImage">Choose file</label>
                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <img class="common-banner_image img-fluid" id="upload-banner-preview" src="{{url($teacher['banner_image'])}}" alt="Banner Image">
        </div>
    </div>
</div> -->

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Languages 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['languages']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['name'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Please choose your languages*</a>
        @endforelse
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <select name="teacher_profile_languages[]" class="js-example-tags form-control @error('teacher_profile_languages.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="teacher_profile_languages">
                @forelse ($languages['data'] as $language)
                    <option value="{{ $language['name'] }}">{{ $language['name'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('teacher_profile_languages.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title">Hobbies 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['hobbies']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['title'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Please provide your hobbies</a>
        @endforelse
    </div>
    <div class="crud-section payment-card-form d-none">
        <div class="form-group">
            <select name="teacher_profile_hobbies[]" class="js-example-tags @error('teacher_profile_hobbies.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="teacher_profile_hobbies">
                @forelse ($hobbies['data'] as $hobby)
                    <option value="{{ $hobby['title'] }}">{{ $hobby['title'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('teacher_profile_hobbies.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>


<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Skills 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['skills']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['title'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Please choose some skills*</a>
        @endforelse
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <select name="skills[]" class="js-example-tags form-control @error('skills.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="skills">
                @forelse ($skills['data'] as $skill)
                    <option value="{{ $skill['title'] }}">{{ $skill['title'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('skills.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">Categories 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['categories']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['name'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Please choose some categories*</a>
        @endforelse
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <select name="teacher_profile_categories[]" class="js-example-tags form-control @error('teacher_profile_categories.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="teacher_profile_categories">
                @forelse ($categories['data'] as $category)
                    <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('teacher_profile_categories.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title">Accomplishments 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['accomplishments']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['title'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Please provide your accomplishments</a>
        @endforelse
    </div>
    <div class="crud-section payment-card-form d-none">
        <div class="form-group">
            <select name="teacher_profile_accomplishments[]" class="js-example-tags @error('teacher_profile_accomplishments.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="teacher_profile_accomplishments">
                @forelse ($accomplishments['data'] as $accomplishment)
                    <option value="{{ $accomplishment['title'] }}">{{ $accomplishment['title'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('teacher_profile_accomplishments.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title">Transformtions Offered 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-banner-content">
        @forelse ($teacher['transformations']['data'] as $item)
            <a href="#0" class="button mr-1">{{ $item['title'] }}</a>
        @empty
            <a href="#0" class="button mr-1">Add transformations</a>
        @endforelse
    </div>
    <div class="crud-section payment-card-form d-none">
        <div class="form-group">
            <select name="teacher_profile_transformations[]" class="js-example-tags @error('teacher_profile_transformations.*') is-invalid @enderror" multiple="multiple" style="width: 100%" id="teacher_profile_transformations">
                @forelse ($transformations['data'] as $transformation)
                    <option value="{{ $transformation['title'] }}">{{ $transformation['title'] }}</option>
                @empty
                    
                @endforelse
            </select>
            @error('teacher_profile_transformations.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        Short Intro
        <button type="submit" class="btn btn-success toggle-success float-right mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="form-group">
        <textarea name="description" id="description" rows="15">{{ $teacher['description']['description'] }}</textarea>
    </div>
</div>

<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title">Certifications 
        <button type="button" class="btn btn-primary toggle-section float-right"><i class="fas fa-pen"></i></button>
        <button type="submit" class="btn btn-success toggle-success float-right d-none mr-2"><i class="far fa-check-circle"></i></button>
    </h5>
    <div class="readonly-section details-photos owl-carousel">
     @forelse ($certification['data'] as $cert)
        <div class="thumb">
             <a href="{{url($cert['certificate'])}}" >
                
                <img src="{{url($cert['certificate'])}}" alt="certificate">
            </a>
        </div>
     @empty
     No Certificates Uploaded
     @endforelse
    </div>
    <div class="payment-card-form crud-section d-none">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control @error('certificate_img.*') is-invalid @enderror" id="cert_images-add" name="certificate_img[]" multiple>
                    <label class="custom-file-label" for="inputGroupCertificateImage" aria-describedby="inputGroupCertificateImage">Choose file</label>
                    @error('certificate_img.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group" id="cert_images">
          {{--  @forelse ($certification['data'] as $cert)
             <img class="certificate_img" src="{{url($cert['certificate'])}}" alt="Certificate Image">
             @empty
             @endforelse --}}
        </div>
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
    var selected_visibility = @json(Arr::pull($teacher, 'visibility.visibility_type'));
    var selected_gender = @json(Arr::pull($teacher, 'gender.gender'));
    var selected_travel_willingness = @json(Arr::pull($teacher, 'extras.travel_willingness'));
    var selected_languages = @json(Arr::pull($teacher, 'languages.data'));
    var selected_categories = @json(Arr::pull($teacher, 'categories.data'));
    var selected_skills = @json(Arr::pull($teacher, 'skills.data'));
    var selected_accomplishments = @json(Arr::pull($teacher, 'accomplishments.data'));
    var selected_transformations = @json(Arr::pull($teacher, 'transformations.data'));
    var selected_hobbies = @json(Arr::pull($teacher, 'hobbies.data'));
    $(document).ready(function() {
        // Replace the <textarea id="description"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );

        //setting up the selected visibility by teacher
        var teacher_profile_visibility = $('#teacher_profile_visibility').select2({
            placeholder: 'Select an option'
        });
        teacher_profile_visibility.val(selected_visibility);
        teacher_profile_visibility.trigger('change');

         //setting up the selected gender by teacher
        var teacher_profile_gender = $('#teacher_profile_gender').select2({
            placeholder: 'Select an option'
        });
        teacher_profile_gender.val(selected_gender);
        teacher_profile_gender.trigger('change');

        //setting up the selected visibility by teacher
        var teacher_travel_willingness = $('#teacher_travel_willingness').select2({
            placeholder: 'Select an option'
        });
        teacher_travel_willingness.val(selected_travel_willingness);
        teacher_travel_willingness.trigger('change');

        //setting up the selected categories by teacher
        var teacher_profile_categories = $("#teacher_profile_categories").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_categories = [];
        for (x = 0; x < selected_categories.length; x++) {
            plucked_categories.push(selected_categories[x]['name']);
        }
        teacher_profile_categories.val(plucked_categories);
        teacher_profile_categories.trigger('change');

        //setting up the selected laguages by teacher
        var teacher_profile_languages = $("#teacher_profile_languages").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_languages = [];
        for (x = 0; x < selected_languages.length; x++) {
            plucked_languages.push(selected_languages[x]['name']);
        }
        teacher_profile_languages.val(plucked_languages);
        teacher_profile_languages.trigger('change');

        //setting up the selected accomplishments by teacher
        var teacher_profile_accomplishments = $("#teacher_profile_accomplishments").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_accomplishments = [];
        for (x = 0; x < selected_accomplishments.length; x++) {
            plucked_accomplishments.push(selected_accomplishments[x]['title']);
        }
        teacher_profile_accomplishments.val(plucked_accomplishments);
        teacher_profile_accomplishments.trigger('change');

        //setting up the selected transformations by teacher
        var teacher_profile_transformations = $("#teacher_profile_transformations").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_transformations = [];
        for (x = 0; x < selected_transformations.length; x++) {
            plucked_transformations.push(selected_transformations[x]['title']);
        }
        teacher_profile_transformations.val(plucked_transformations);
        teacher_profile_transformations.trigger('change');

        //setting up the selected hobbies by teacher
        var teacher_profile_hobbies = $("#teacher_profile_hobbies").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_hobbies = [];
        for (x = 0; x < selected_hobbies.length; x++) {
            plucked_hobbies.push(selected_hobbies[x]['title']);
        }
        teacher_profile_hobbies.val(plucked_hobbies);
        teacher_profile_hobbies.trigger('change');

        //setting up the selected skills by teacher
        var skills = $("#skills").select2({
            placeholder: 'Select an option',
            tags: true
        });
        plucked_skills = [];
        for (x = 0; x < selected_skills.length; x++) {
            plucked_skills.push(selected_skills[x]['title']);
        }
        skills.val(plucked_skills);
        skills.trigger('change');

    });

    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr({
                        src: event.target.result,
                        class : "certificate_img",
                        alt: "Certificate Image"
                    }).appendTo(placeToInsertImagePreview);

                }
                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#cert_images-add').on('change', function() {
        imagesPreview(this, '#cert_images');
    });

});
</script>
@endpush