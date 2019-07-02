<?php

namespace App\Http\Requests\Api;

use App\Rules\ResolutionSetting;
use Illuminate\Foundation\Http\FormRequest;

class CreditNoteRequest extends FormRequest
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
        $this->resolution = auth()->user()->company->resolutions->where('type_document_id', $this->type_document_id)->first();

        return [
            // Document
            'type_document_id' => [
                'required',
                'in:4',
                'exists:type_documents,id',
                new ResolutionSetting(),
            ],

            // Consecutive
            'number' => 'required|integer|between:'.optional($this->resolution)->from.','.optional($this->resolution)->to,

            // Billing Reference
            'billing_reference' => 'required|array',
            'billing_reference.number' => 'required|string',
            'billing_reference.uuid' => 'required|string|size:96',
            'billing_reference.issue_date' => 'required|date_format:Y-m-d',

            // Customer
            'customer' => 'required|array',
            'customer.identification_number' => 'required|numeric|digits_between:1,15',
            'customer.dv' => 'nullable|numeric|digits:1',
            'customer.type_document_identification_id' => 'nullable|exists:type_document_identifications,id',
            'customer.type_organization_id' => 'nullable|exists:type_organizations,id',
            'customer.language_id' => 'nullable|exists:languages,id',
            'customer.country_id' => 'nullable|exists:countries,id',
            'customer.municipality_id' => 'nullable|exists:municipalities,id',
            'customer.type_regime_id' => 'nullable|exists:type_regimes,id',
            'customer.tax_id' => 'nullable|exists:taxes,id',
            'customer.type_liability_id' => 'nullable|exists:type_liabilities,id',
            'customer.name' => 'required|string',
            'customer.phone' => 'required|numeric|digits_between:7,10',
            'customer.address' => 'required|string',
            'customer.email' => 'required|string|email',
            'customer.merchant_registration' => 'required|string',

            // Payment form
            'payment_form' => 'nullable|array',
            'payment_form.payment_form_id' => 'nullable|exists:payment_forms,id',
            'payment_form.payment_method_id' => 'nullable|exists:payment_methods,id',
            'payment_form.payment_due_date' => 'nullable|required_if:payment_form.payment_form_id,=,2|date_format:Y-m-d',
            'payment_form.duration_measure' => 'nullable|required_if:payment_form.payment_form_id,=,2|numeric|digits_between:1,3',

            // Allowance charges
            'allowance_charges' => 'nullable|array',
            'allowance_charges.*.charge_indicator' => 'nullable|required_with:allowance_charges|boolean',
            'allowance_charges.*.discount_id' => 'nullable|required_if:allowance_charges.*.charge_indicator,false|exists:discounts,id',
            'allowance_charges.*.allowance_charge_reason' => 'nullable|required_with:allowance_charges|string',
            'allowance_charges.*.amount' => 'nullable|required_with:allowance_charges|numeric',
            'allowance_charges.*.base_amount' => 'nullable|required_with:allowance_charges|numeric',

            // Tax totals
            'tax_totals' => 'nullable|array',
            'tax_totals.*.tax_id' => 'nullable|required_with:allowance_charges|exists:taxes,id',
            'tax_totals.*.percent' => 'nullable|required_unless:tax_totals.*.tax_id,10|numeric',
            'tax_totals.*.tax_amount' => 'nullable|required_with:allowance_charges|numeric',
            'tax_totals.*.taxable_amount' => 'nullable|required_with:allowance_charges|numeric',
            'tax_totals.*.unit_measure_id' => 'nullable|required_if:tax_totals.*.tax_id,10|exists:unit_measures,id',
            'tax_totals.*.per_unit_amount' => 'nullable|required_if:tax_totals.*.tax_id,10|numeric',
            'tax_totals.*.base_unit_measure' => 'nullable|required_if:tax_totals.*.tax_id,10|numeric',

            // Legal monetary totals
            'legal_monetary_totals' => 'required|array',
            'legal_monetary_totals.line_extension_amount' => 'required|numeric',
            'legal_monetary_totals.tax_exclusive_amount' => 'required|numeric',
            'legal_monetary_totals.tax_inclusive_amount' => 'required|numeric',
            'legal_monetary_totals.allowance_total_amount' => 'required|numeric',
            'legal_monetary_totals.charge_total_amount' => 'required|numeric',
            'legal_monetary_totals.payable_amount' => 'required|numeric',

            // Credit note lines
            'credit_note_lines' => 'required|array',
            'credit_note_lines.*.unit_measure_id' => 'required|exists:unit_measures,id',
            'credit_note_lines.*.invoiced_quantity' => 'required|numeric',
            'credit_note_lines.*.line_extension_amount' => 'required|numeric',
            'credit_note_lines.*.free_of_charge_indicator' => 'required|boolean',
            'credit_note_lines.*.reference_price_id' => 'nullable|required_if:credit_note_lines.*.free_of_charge_indicator,true|exists:reference_prices,id',
            'credit_note_lines.*.allowance_charges' => 'nullable|array',
            'credit_note_lines.*.allowance_charges.*.charge_indicator' => 'nullable|required_with:credit_note_lines.*.allowance_charges|boolean',
            'credit_note_lines.*.allowance_charges.*.allowance_charge_reason' => 'nullable|required_with:credit_note_lines.*.allowance_charges|string',
            'credit_note_lines.*.allowance_charges.*.amount' => 'nullable|required_with:credit_note_lines.*.allowance_charges|numeric',
            'credit_note_lines.*.allowance_charges.*.base_amount' => 'nullable|required_if:credit_note_lines.*.allowance_charges.*.charge_indicator,false|numeric',
            'credit_note_lines.*.allowance_charges.*.multiplier_factor_numeric' => 'nullable|required_if:credit_note_lines.*.allowance_charges.*.charge_indicator,true|numeric',
            'credit_note_lines.*.tax_totals' => 'nullable|array',
            'credit_note_lines.*.tax_totals.*.tax_id' => 'nullable|required_with:credit_note_lines.*.tax_totals|exists:taxes,id',
            'credit_note_lines.*.tax_totals.*.tax_amount' => 'nullable|required_with:credit_note_lines.*.tax_totals|numeric',
            'credit_note_lines.*.tax_totals.*.taxable_amount' => 'nullable|required_with:credit_note_lines.*.tax_totals|numeric',
            'credit_note_lines.*.tax_totals.*.percent' => 'nullable|required_unless:credit_note_lines.*.tax_totals.*.tax_id,10|numeric',
            'credit_note_lines.*.tax_totals.*.unit_measure_id' => 'nullable|required_if:credit_note_lines.*.tax_totals.*.tax_id,10|exists:unit_measures,id',
            'credit_note_lines.*.tax_totals.*.per_unit_amount' => 'nullable|required_if:credit_note_lines.*.tax_totals.*.tax_id,10|numeric',
            'credit_note_lines.*.tax_totals.*.base_unit_measure' => 'nullable|required_if:credit_note_lines.*.tax_totals.*.tax_id,10|numeric',
            'credit_note_lines.*.description' => 'required|string',
            'credit_note_lines.*.code' => 'required|string',
            'credit_note_lines.*.type_item_identification_id' => 'required|exists:type_item_identifications,id',
            'credit_note_lines.*.price_amount' => 'required|numeric',
            'credit_note_lines.*.base_quantity' => 'required|numeric',
        ];
    }
}
