<?php

namespace App\Http\Requests;

use App\Enums\BloodGroupType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Rules\PhoneNumber;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class PersonalDetailValidate extends FormRequest
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
            'name' => "required|regex:/^[.\'\-a-zA-Z ]+$/|max:150",
            'email' => 'required|email|unique:personal_details',
            'mobile' => ['required', new PhoneNumber],
            'dob' => 'required|date|date_format:d/m/Y|before: -16 years',
            'blood_group' => ['required', new EnumValue(BloodGroupType::class)],
            'religion' => ['required', new EnumValue(ReligionType::class)],
            'caste' => "required|regex:/^[.\'\-a-zA-Z ]+$/",
            'marital_status' => ['required', new EnumValue(MaritalStatusType::class)],
            'mother_tongue' => 'required|alpha',
            'medical' => 'required|string',
            'education' => 'required|string',
            'nrs' => 'required|string',
            'image' => 'required|image|max:2000',
            'regd_no' => 'required|string',
            'id_card_no' => 'required|string',
            'rank' => 'required|string',
            'doe' => 'required|date|date_format:d/m/Y',

        ];
    }

    public function messages()
    {
        return [
            'name.regex' => "The name contains ony alphabet.",
            'caste.regex' => "The :attribute may contains ony alphabet.",
            'dob.before' => "The age must be min of 16 year old."
        ];
    }

    public function attributes()
    {
        return [
            'dob' => 'date of birth',
            'doe' => 'date of enrollment',
            'nrs' => 'Nearest Railway Station',
        ];
    }
}
