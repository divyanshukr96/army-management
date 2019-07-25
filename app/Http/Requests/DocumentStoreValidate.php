<?php

namespace App\Http\Requests;

use App\Enums\DocumentType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreValidate extends FormRequest
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
            'document_no' => 'required|string|max:16',
            'image' => 'required|image|max:2100',
            'type' => ['required', new EnumValue(DocumentType::class), 'unique:documents,type,NULL,id,army_id,' . $this->army->id],
        ];
    }

    public function messages()
    {
        return [
            'type.unique' => 'This document has already been uploaded.'
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'document type'
        ];
    }
}
