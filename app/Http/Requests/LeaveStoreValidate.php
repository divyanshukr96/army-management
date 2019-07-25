<?php

namespace App\Http\Requests;

use App\Enums\LeaveType;
use App\Rules\NoOfLeave;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed from
 * @property mixed army
 */
class LeaveStoreValidate extends FormRequest
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
            'from' => 'required|date|unique:leaves,from,NULL,id,to,' . $this->to . ',army_id,' . $this->army->id,
            'to' => ['required', 'date', 'after:from', 'unique:leaves,to,NULL,id,from,' . $this->from . ',army_id,' . $this->army->id, new NoOfLeave($this)],
            'type' => ['required', new EnumValue(LeaveType::class)],
        ];
    }

    public function messages()
    {
        return [
            'from.unique' => 'The leave has already been taken for these dates.',
            'to.unique' => 'The leave has already been taken for these days.',
            'to.after' => 'The date must be after leave from date.',
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'leave type',
            'from' => 'leave from date',
            'to' => 'leave to date',
        ];
    }
}
