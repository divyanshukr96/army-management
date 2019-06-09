<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceStoreValidate extends FormRequest
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
            'policy_no' => 'required|string|unique:insurances|max:50',
            'policy_name' => 'nullable|string|max:150',
        ];
    }

    public function messages()
    {
        return [
            'policy_no.unique' => 'The :attribute has already been added.'
        ];
    }
}
