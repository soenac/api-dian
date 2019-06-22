@foreach ($invoiceLines as $key => $invoiceLine)
    <cac:InvoiceLine>
        <cbc:ID>{{($key + 1)}}</cbc:ID>
        <cbc:InvoicedQuantity unitCode="{{$invoiceLine->unit_measure->code}}">{{number_format($invoiceLine->invoiced_quantity, 6, '.', '')}}</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="{{$company->type_currency->code}}">{{number_format($invoiceLine->line_extension_amount, 2, '.', '')}}</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>{{$invoiceLine->free_of_charge_indicator}}</cbc:FreeOfChargeIndicator>
        @if ($invoiceLine->free_of_charge_indicator === 'true')
            <cac:PricingReference>
                <cac:AlternativeConditionPrice>
                    <cbc:PriceAmount currencyID="{{$company->type_currency->code}}">{{number_format($invoiceLine->price_amount, 2, '.', '')}}</cbc:PriceAmount>
                    <cbc:PriceTypeCode>{{$invoiceLine->reference_price->code}}</cbc:PriceTypeCode>
                </cac:AlternativeConditionPrice>
            </cac:PricingReference>
        @endif
        {{-- AllowanceCharges line  --}}
        @include('xml._allowance_charges', ['allowanceCharges' => $invoiceLine->allowance_charges])
        @include('xml._tax_totals', ['taxTotals' => $invoiceLine->tax_totals])
        <cac:Item>
            <cbc:Description>{{$invoiceLine->description}}</cbc:Description>
            {{-- <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification> --}}
            <cac:StandardItemIdentification>
                <cbc:ID schemeID="{{$invoiceLine->type_item_identification->code}}" schemeName="EAN13" schemeAgencyID="{{$invoiceLine->type_item_identification->code_agency}}">{{$invoiceLine->code}}</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="{{$company->type_currency->code}}">{{number_format(($invoiceLine->free_of_charge_indicator === 'true') ? 0 : $invoiceLine->price_amount, 2, '.', '')}}</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="{{$invoiceLine->unit_measure->code}}">{{number_format($invoiceLine->base_quantity, 6, '.', '')}}</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
@endforeach
