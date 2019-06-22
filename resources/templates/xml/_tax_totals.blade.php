@foreach ($taxTotals as $key => $taxTotal)
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID="{{$company->type_currency->code}}">{{number_format($taxTotal->tax_amount, 2, '.', '')}}</cbc:TaxAmount>
        {{-- @if (!$taxTotal->is_fixed_value)
            <cbc:TaxEvidenceIndicator>false</cbc:TaxEvidenceIndicator>
        @endif --}}
        <cac:TaxSubtotal>
            @if (!$taxTotal->is_fixed_value)
                <cbc:TaxableAmount currencyID="{{$company->type_currency->code}}">{{number_format($taxTotal->taxable_amount, 2, '.', '')}}</cbc:TaxableAmount>
            @endif
            <cbc:TaxAmount currencyID="{{$company->type_currency->code}}">{{number_format($taxTotal->tax_amount, 2, '.', '')}}</cbc:TaxAmount>
            @if ($taxTotal->is_fixed_value)
                <cbc:BaseUnitMeasure unitCode="{{$taxTotal->unit_measure->code}}">{{number_format($taxTotal->base_unit_measure, 6, '.', '')}}</cbc:BaseUnitMeasure>
                <cbc:PerUnitAmount currencyID="{{$company->type_currency->code}}">{{number_format($taxTotal->per_unit_amount, 2, '.', '')}}</cbc:PerUnitAmount>
            @endif
            <cac:TaxCategory>
                @if (!$taxTotal->is_fixed_value)
                    <cbc:Percent>{{number_format($taxTotal->percent, 2, '.', '')}}</cbc:Percent>
                @endif
                <cac:TaxScheme>
                    <cbc:ID>{{$taxTotal->tax->code}}</cbc:ID>
                    <cbc:Name>{{$taxTotal->tax->name}}</cbc:Name>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
@endforeach
