<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountStoreValidate extends FormRequest
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
        $rules = [
            'account_no' => 'required|numeric|digits_between:8,20|unique:accounts,account_no,',
            'branch_name' => 'nullable|string|max:100',
            'ifsc' => 'required|alpha_num'
        ];
        if (request()->method() == 'PUT') {
            $rules['account_no'] = 'required|numeric|digits_between:8,20|unique:accounts,account_no,' . $this->account->id;
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'ifsc' => 'Bank IFSC'
        ];
    }
}
