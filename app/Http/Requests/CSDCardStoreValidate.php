<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CSDCardStoreValidate extends FormRequest
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
//            'liquor' => 'nullable|regex:/^[0-9](?!.*--)(?!.*- -)(?!.*  )[ 0-9-]*[0-9]$/',
//            'grocery' => 'nullable|regex:/^[0-9](?!.*--)(?!.*- -)(?!.*  )[ 0-9-]*[0-9]$/',
            'liquor' => 'nullable|alpha_num',
            'grocery' => 'nullable|alpha_num',
        ];
    }

    public function messages()
    {
        return [
            'liquor.regex' => 'The :attribute may only contain numbers, dashes and blank space.',
            'grocery.regex' => 'The :attribute may only contain numbers, dashes and blank space.',
        ];
    }

}
