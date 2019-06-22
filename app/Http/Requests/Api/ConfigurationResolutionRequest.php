<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationResolutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'type_document_id' => 'required|exists:type_documents,id',
            'prefix' => 'nullable|string|max:4',
            'resolution' => 'nullable|required_if:type_document_id,=,1|integer',
            'resolution_date' => 'nullable|required_if:type_document_id,=,1|date_format:Y-m-d',
            'technical_key' => 'nullable|required_if:type_document_id,=,1|string',
            'from' => 'required|integer',
            'to' => 'required|integer|min:'.((int) ($this->from + 1)),
            'date_from' => 'nullable|required_if:type_document_id,=,1|date_format:Y-m-d',
            'date_to' => 'nullable|required_if:type_document_id,=,1|date_format:Y-m-d|after:date_from',
        ];
    }
}
