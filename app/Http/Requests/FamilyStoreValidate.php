<?php

namespace App\Http\Requests;

use App\Enums\BloodGroupType;
use App\Enums\RelationType;
use App\Rules\PhoneNumber;
use App\Rules\Relation;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class FamilyStoreValidate extends FormRequest
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
//            'age' => 'required|numeric|min:1',
            'education' => 'required|string',
            'occupation' => 'required|string',
            'mobile' => ['required', new PhoneNumber],
            'blood_group' => ['required', new EnumValue(BloodGroupType::class)],
            'relation' => ['required', new EnumValue(RelationType::class), new Relation($this)],

            'dob' => 'nullable|required_if:relation,' . RelationType::Children . '|date|before_or_equal:today',
            'dom' => 'nullable|required_if:relation,' . RelationType::Wife . '|date',
            'pan_card' => 'nullable|required_if:relation,' . RelationType::Wife . '|alpha_num',
        ];
        if (request()->method() == 'POST') {
            $rules['certificate'] = 'nullable|required_if:relation,' . RelationType::Wife . ',' . RelationType::Children . '|image|max:2000';
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'name.regex' => "The name contains ony alphabet.",
//            'age.min' => "The :attribute must be greater than or equal to :min.",
            'dob.required_if' => "The :attribute field is required.",
            'dom.required_if' => "The :attribute field is required.",
            'pan_card.required_if' => "The :attribute field is required.",
            'certificate.required_if' => "The :attribute field is required.",
        ];
    }

    public function attributes()
    {
        $cert = RelationType::Wife === $this->get('relation') ? "marriage" : 'birth';
        return [
            'dom' => 'Date of Marriage',
            'dob' => 'Date of Birth',
            'certificate' => "{$cert} certificate"
        ];
    }
}
