@foreach ($allowanceCharges as $key => $allowanceCharge)
    <cac:AllowanceCharge>
        <cbc:ID>{{($key + 1)}}</cbc:ID>
        <cbc:ChargeIndicator>{{$allowanceCharge->charge_indicator}}</cbc:ChargeIndicator>
        @if (($allowanceCharge->charge_indicator === 'false') && ($allowanceCharge->discount))
            <cbc:AllowanceChargeReasonCode>{{$allowanceCharge->discount->code}}</cbc:AllowanceChargeReasonCode>
        @endif
        <cbc:AllowanceChargeReason>{{$allowanceCharge->allowance_charge_reason}}</cbc:AllowanceChargeReason>
        <cbc:MultiplierFactorNumeric>{{$allowanceCharge->multiplier_factor_numeric}}</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID="{{$company->type_currency->code}}">{{number_format($allowanceCharge->amount, 2, '.', '')}}</cbc:Amount>
        @if ($allowanceCharge->base_amount)
            <cbc:BaseAmount currencyID="{{$company->type_currency->code}}">{{number_format($allowanceCharge->base_amount, 2, '.', '')}}</cbc:BaseAmount>
        @endif
    </cac:AllowanceCharge>
@endforeach
