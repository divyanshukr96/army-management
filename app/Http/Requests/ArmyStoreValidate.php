<?php

namespace App\Http\Requests;

use App\Enums\BloodGroupType;
use App\Enums\MaritalStatusType;
use App\Enums\ReligionType;
use App\Rules\PhoneNumber;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class ArmyStoreValidate extends FormRequest
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
            'name' => "required|regex:/^[.\'\-a-zA-Z ]+$/|max:150",
            'email' => 'required|email|unique:armies',
            'mobile' => ['required', new PhoneNumber],
            'dob' => 'required|date|before: -16 years',
            'blood_group' => ['required', new EnumValue(BloodGroupType::class)],
            'religion' => ['required', new EnumValue(ReligionType::class)],
            'caste' => "required|regex:/^[.\'\-a-zA-Z ]+$/",
            'marital_status' => ['required', new EnumValue(MaritalStatusType::class)],
            'mother_tongue' => 'required|alpha',
            'medical' => 'required|string',
            'education' => 'required|string',
            'nrs' => 'required|string',
            'image' => 'nullable|image|max:2000',
        ];
        $rulesPOST = [
            'regd_no' => 'required|string|unique:armies',
            'id_card_no' => 'required|string',
            'rank' => 'required|string',
            'doe' => 'required|date',
            'company' => 'required|string',  //company name field

            'nok_name' => "required|regex:/^[.\'\-a-zA-Z ]+$/|max:150",
            'nok_relation' => "required|string|max:150",
            'nok_mobile' => ['nullable', new PhoneNumber],

            'state' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'pin_code' => 'required|numeric|digits:6',
            'address' => 'required|string|max:300',
            'image' => 'required|image|max:2000',
        ];

        if (in_array(Str::upper(request()->method()), ["PUT", "PATCH"])) {
            return array_merge($rules, [
                'email' => 'required|email|unique:armies,email,' . $this->army->id,
            ]);
        }

        return array_merge($rules, $rulesPOST);
    }

    public function messages()
    {
        return [
            'name.regex' => "The name contains ony alphabet.",
            'caste.regex' => "The :attribute may contains ony alphabet.",
            'dob.before' => "The age must be minimum of 16 years old."
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
