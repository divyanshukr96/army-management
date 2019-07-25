<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreValidate extends FormRequest
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
            'name' => 'required|string',
            'grade' => 'required|string',
            'from' => 'required|date',  // |before_or_equal:today
            'to' => 'required|date|after:from',
            'loc' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'from' => 'course start date',
            'to' => 'course end date',
        ];
    }
}
