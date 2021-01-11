@extends('student-profile-settings.settings-wrapper')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('settings-content')
<form action="{{ route('student.profile.qaUpdate') }}" class="payment-card-form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
<div class="checkout-widget checkout-contact common-design-form  parent-wrapper">
    <h5 class="title width-100">
        Q/A Settings
    </h5>
    <br>

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
</div>
</form>
@endsection

@push('scripts')
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
        CKEDITOR.replace( 'ans_1' );
        CKEDITOR.replace( 'ans_2' );
        CKEDITOR.replace( 'ans_3' );
        CKEDITOR.replace( 'ans_4' );
        CKEDITOR.replace( 'ans_5' );
        CKEDITOR.replace( 'ans_6' );
        CKEDITOR.replace( 'ans_7' );
        CKEDITOR.replace( 'ans_8' );
        CKEDITOR.replace( 'ans_9' );

    });
</script>
@endpush