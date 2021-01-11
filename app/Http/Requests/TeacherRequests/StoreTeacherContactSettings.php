<?php

namespace App\Http\Requests\TeacherRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreTeacherContactSettings extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::id())
            ],
            'contact_number' => ['sometimes','nullable','integer','min:6',],
            'zone_id' => 'required|exists:zone,zone_id',
            'country' => ['sometimes','nullable','max:255'],
            'city' => ['sometimes','nullable','max:255'],
            'address' => ['sometimes','nullable','max:255',]
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
            'name.required' => 'Please enter a valid First Name',
            'last_name.required' => 'Please enter a valid Last Name',
            'email.required' => 'Please enter a valid Email Address',
            'contact_number.sometimes' => 'Please enter a valid Contact Number',
            'zone_id.required' => 'Please select a valid Time Zone',
            'country.sometimes' => 'Please enter a valid Country',
            'city.sometimes' => 'Please enter a valid City',
            'address.sometimes' => 'Please enter a valid Address',
        ];
    }
}
