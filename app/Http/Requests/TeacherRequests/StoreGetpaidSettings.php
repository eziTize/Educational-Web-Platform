<?php

namespace App\Http\Requests\TeacherRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreGetpaidSettings extends FormRequest
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
            'ac_holder' => 'required|max:255',
            'ac_no' => ['required','string','min:8','max:255'],
            'tax_no' => ['sometimes','nullable','string','min:8','max:255'],
            'rnib' => ['required','string','min:8',],
            'ac_type' => ['required'],
            'country' => ['required','string','max:255',],
            'city' => ['required','string','max:255',],
            'postcode' => ['required','string','max:255',],
            'st_addr' => ['required','max:255',]
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
            'ac_holder.required' => 'Please enter a valid Account Holder',
            'ac_no.required' => 'Please enter a valid Account Number',
            'tax_no.sometimes' => 'Please enter a valid Tax ID/No.',
            'rnib.required' => 'Please enter a valid Iban or Routing Number',
            'ac_type.required' => 'Please select a valid Account Type',
            'country.required' => 'Please enter a valid Country',
            'city.required' => 'Please select a valid City',
            'postcode.required' => 'Please select a valid Postal Code',
        ];
    }
}
