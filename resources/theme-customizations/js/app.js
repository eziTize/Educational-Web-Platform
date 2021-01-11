try {
    require('password-strength-meter');
} catch (e) {}

function preview_image(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(target).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$(document).ready(function(){
   $('.toggle-section').on('click',function(){
       var toggler = $(this);
       toggler.closest('.parent-wrapper').find('.readonly-section').toggleClass('d-none');
       toggler.closest('.parent-wrapper').find('.crud-section').toggleClass('d-none');
       toggler.closest('.parent-wrapper').find('.toggle-success').toggleClass('d-none');
   });
   $('.previewable-image').on('change',function(){
       var target = $(this).attr('data-target');
       preview_image(this,target);
   })
})