<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmyUserCreateValidation extends FormRequest
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
            'email' => 'required|exists:armies|unique:users|min:6',
            'username' => 'required|exists:armies,regd_no|unique:users|min:6',
            'password' => 'required|min:6,max:20'
        ];
    }
}
