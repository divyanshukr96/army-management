<?php

namespace App\Http\Requests;

use App\Enums\OtherLeaveType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class OtherLeaveStoreValidate extends FormRequest
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
            'from' => 'required|date',
            'to' => 'required|date|after:from',
            'type' => ['required', new EnumValue(OtherLeaveType::class)],
            'description' => 'nullable|string',
            'loc' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'from' => 'from date',
            'to' => 'to date',
            'type' => 'duties type',
            'loc' => 'location'
        ];
    }
}
