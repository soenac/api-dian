<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
            'type_document_identification_id' => 'required|exists:type_document_identifications,id',
            'country_id' => 'required|exists:countries,id',
            'type_organization_id' => 'required|exists:type_organizations,id',
            'razon_social' => 'required|string',
            'municipality_id' => 'required|exists:municipalities,id',
            'direccion' => 'required|string',
            'phone' => 'required|string'
        ];
    }
}
