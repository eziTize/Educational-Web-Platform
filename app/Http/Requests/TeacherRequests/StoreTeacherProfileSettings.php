<?php

namespace App\Http\Requests\TeacherRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherProfileSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {

    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_profile_visibility' => ['required',
            function ($attribute, $value, $fail) {
                if ($value != '0' && $value != '1') {
                    $fail('Selected profile attribute is invalid.');
                }
            }],
            'teacher_travel_willingness' => ['required',
            function ($attribute, $value, $fail) {
                if ($value != '0' && $value != '1') {
                    $fail('Selected profile attribute is invalid.');
                }
            }],
            'teacher_average_price'=> 'required|integer|min:1|max:10000',
            'teacher_profile_categories.*' => ['required','max:100'],
            'teacher_profile_accomplishments.*' => ['required','max:100'],
            'profile_image' => ['sometimes','file','image'],
            'profile_video' => ['sometimes','file','mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'banner_image' => ['sometimes','file','image'],
            'certificate_img.*' => ['sometimes','file','image'],
        ];
    }


     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'teacher_average_price' => 'Please specify a valid hourly rate',
            'teacher_profile_visibility' => 'Please specify a valid visibility',
            'teacher_profile_categories.*' => 'Each category must be a valid word & should not exceed 100 character',
            'teacher_profile_accomplishments.*' => 'Each accomplishment must be a valid word & should not exceed 100 character',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
       
    }
}
