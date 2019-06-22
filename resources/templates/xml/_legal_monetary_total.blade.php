<cac:LegalMonetaryTotal>
    <cbc:LineExtensionAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->line_extension_amount, 2, '.', '')}}</cbc:LineExtensionAmount>
    <cbc:TaxExclusiveAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->tax_exclusive_amount, 2, '.', '')}}</cbc:TaxExclusiveAmount>
    <cbc:TaxInclusiveAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->tax_inclusive_amount, 2, '.', '')}}</cbc:TaxInclusiveAmount>
    @if ($legalMonetaryTotal->allowance_total_amount)
        <cbc:AllowanceTotalAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->allowance_total_amount, 2, '.', '')}}</cbc:AllowanceTotalAmount>
    @endif
    @if ($legalMonetaryTotal->charge_total_amount)
        <cbc:ChargeTotalAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->charge_total_amount, 2, '.', '')}}</cbc:ChargeTotalAmount>
    @endif
    @if ($legalMonetaryTotal->pre_paid_amount)
        <cbc:PrePaidAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->pre_paid_amount, 2, '.', '')}}</cbc:PrePaidAmount>
    @endif
    <cbc:PayableAmount currencyID="{{$company->type_currency->code}}">{{number_format($legalMonetaryTotal->payable_amount, 2, '.', '')}}</cbc:PayableAmount>
</cac:LegalMonetaryTotal>
