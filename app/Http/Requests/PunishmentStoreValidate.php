<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PunishmentStoreValidate extends FormRequest
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
            'place' => 'required|string|',
            'offence_date' => 'required|date|before_or_equal:today|before_or_equal:order_date',
            'rank' => 'required|string|max:150',
            'offence' => 'required|string|',
            'witness' => 'required|string|',
            'punishment' => 'required|string|',
            'order_date' => 'required|date|after_or_equal:offence_date|before_or_equal:today',
            'by_whom' => 'required|string|',
            'remark' => 'nullable|string|'
        ];
    }
}
