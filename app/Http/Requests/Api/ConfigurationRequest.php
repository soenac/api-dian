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
     * Get data to be validated from the request. From Route URL
     *
     * @return array
     */
    protected function validationData() {
        if (method_exists($this->route(), 'parameters')) {
            $this->request->add($this->route()->parameters());
            $this->query->add($this->route()->parameters());
            
            return array_merge($this->route()->parameters(), $this->all());
        }
        
        return $this->all();
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nit' => 'required|numeric|digits_between:1,15|unique:companies,identification_number',
            'dv' => 'required|numeric|digits:1',
            'language_id' => 'nullable|exists:languages,id',
            'tax_id' => 'nullable|exists:taxes,id',
            'type_environment_id' => 'nullable|exists:type_environments,id',
            'type_operation_id' => 'nullable|exists:type_operations,id',
            'type_document_identification_id' => 'required|exists:type_document_identifications,id',
            'country_id' => 'nullable|exists:countries,id',
            'type_currency_id' => 'nullable|exists:type_currencies,id',
            'type_organization_id' => 'required|exists:type_organizations,id',
            'type_regime_id' => 'required|exists:type_regimes,id',
            'type_liability_id' => 'required|exists:type_liabilities,id',
            'business_name' => 'required|string',
            'municipality_id' => 'required|exists:municipalities,id',
            'merchant_registration' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|digits_between:7,10',
            'email' => 'required|string|email|unique:users,email'
        ];
    }
}
