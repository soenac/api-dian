<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<Invoice
    xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2"
    xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2"
    xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2"
    xmlns:sts="urn:dian:gov:co:facturaelectronica:Structures-2-1"
    xmlns:xades="http://uri.etsi.org/01903/v1.3.2#"
    xmlns:xades141="http://uri.etsi.org/01903/v1.4.1#"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2     http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd">
    {{-- UBLExtensions --}}
    @include('xml._ubl_extensions')
    <cbc:UBLVersionID>UBL 2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>{{$company->type_operation->code}}</cbc:CustomizationID>
    <cbc:ProfileID>DIAN 2.1</cbc:ProfileID>
    <cbc:ProfileExecutionID>{{$company->type_environment->code}}</cbc:ProfileExecutionID>
    <cbc:ID>{{$resolution->next_consecutive}}</cbc:ID>
    <cbc:UUID schemeID="{{$company->type_environment->code}}" schemeName="{{$typeDocument->cufe_algorithm}}"/>
    <cbc:IssueDate>{{Carbon\Carbon::now()->format('Y-m-d')}}</cbc:IssueDate>
    <cbc:IssueTime>{{Carbon\Carbon::now()->format('H:i:s')}}-05:00</cbc:IssueTime>
    {{-- <cbc:DueDate>2019-04-04</cbc:DueDate> --}}
    <cbc:InvoiceTypeCode>{{$typeDocument->code}}</cbc:InvoiceTypeCode>
    {{-- <cbc:Note>SETP9900000082019-06-1212:53:36-05:001720000.00010.00020.00030.002023060.009012101133901210113dd85db55545bd6566f36b0fd3be9fd8555c36e2</cbc:Note> --}}
    {{-- <cbc:TaxPointDate>2019-04-30</cbc:TaxPointDate> --}}
    <cbc:DocumentCurrencyCode>{{$company->type_currency->code}}</cbc:DocumentCurrencyCode>
    <cbc:LineCountNumeric>{{$invoiceLines->count()}}</cbc:LineCountNumeric>
    {{-- <cac:OrderReference>
        <cbc:ID>546326432432</cbc:ID>
    </cac:OrderReference> --}}
    {{-- <cac:DespatchDocumentReference>
        <cbc:ID>DA53452416721</cbc:ID>
    </cac:DespatchDocumentReference> --}}
    {{-- <cac:ReceiptDocumentReference>
        <cbc:ID>GR23847134</cbc:ID>
    </cac:ReceiptDocumentReference> --}}
    {{-- <cac:AdditionalDocumentReference>
        <cbc:ID>GT191231912</cbc:ID>
        <cbc:DocumentTypeCode>99</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference> --}}
    {{-- AccountingSupplierParty --}}
    @include('xml._accounting', ['node' => 'AccountingSupplierParty', 'supplier' => true])
    {{-- AccountingCustomerParty --}}
    @include('xml._accounting', ['node' => 'AccountingCustomerParty', 'user' => $customer])
    {{-- <cac:TaxRepresentativeParty>
        <cac:PartyIdentification>
            <cbc:ID schemeAgencyID="195" schemeAgencyName="CO, DIAN (Dirección de Impuestos y Aduanas Nacionales)" schemeName="13">123456789</cbc:ID>
        </cac:PartyIdentification>
        <cac:PartyName>
            <cbc:Name>Persona autorizada para descargar</cbc:Name>
        </cac:PartyName>
    </cac:TaxRepresentativeParty> --}}
    {{-- <cac:Delivery>
        <cbc:ActualDeliveryDate>2019-02-15</cbc:ActualDeliveryDate>
        <cbc:ActualDeliveryTime>19:30:00</cbc:ActualDeliveryTime>
        <cac:DeliveryAddress>
            <cbc:ID>11001</cbc:ID>
            <cbc:CityName>BOGOTA</cbc:CityName>
            <cbc:CountrySubentity>Districto Capital</cbc:CountrySubentity>
            <cbc:CountrySubentityCode>11</cbc:CountrySubentityCode>
            <cac:AddressLine>
                <cbc:Line>CR 9 A N0 99 - 07 OF 802</cbc:Line>
            </cac:AddressLine>
            <cac:Country>
                <cbc:IdentificationCode>CO</cbc:IdentificationCode>
                <cbc:Name languageID="es">Colombia</cbc:Name>
            </cac:Country>
        </cac:DeliveryAddress>
        <cac:DeliveryParty>
            <cac:PartyName>
                <cbc:Name>Empresa de transporte</cbc:Name>
            </cac:PartyName>
            <cac:PhysicalLocation>
                <cac:Address>
                    <cbc:ID>11001</cbc:ID>
                    <cbc:CityName>PEREIRA</cbc:CityName>
                    <cbc:CountrySubentity>Districto Capital</cbc:CountrySubentity>
                    <cbc:CountrySubentityCode>91</cbc:CountrySubentityCode>
                    <cac:AddressLine>
                        <cbc:Line>CARRERA 8 No 20-14/40</cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>CO</cbc:IdentificationCode>
                        <cbc:Name languageID="es">Colombia</cbc:Name>
                    </cac:Country>
                </cac:Address>
            </cac:PhysicalLocation>
            <cac:PartyTaxScheme>
                <cbc:RegistrationName>Empresa de transporte</cbc:RegistrationName>
                <cbc:CompanyID schemeAgencyID="195" schemeAgencyName="CO, DIAN (Dirección de Impuestos y Aduanas Nacionales)" schemeID="1" schemeName="31">981223983</cbc:CompanyID>
                <cbc:TaxLevelCode listName="05">O-99</cbc:TaxLevelCode>
                <cac:TaxScheme>
                    <cbc:ID>01</cbc:ID>
                    <cbc:Name>IVA</cbc:Name>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:PartyLegalEntity>
                <cac:CorporateRegistrationScheme>
                    <cbc:Name>54321</cbc:Name>
                </cac:CorporateRegistrationScheme>
            </cac:PartyLegalEntity>
        </cac:DeliveryParty>
    </cac:Delivery> --}}
    {{-- PaymentMeans --}}
    @include('xml._payment_means')
    {{-- PaymentTerms --}}
    @include('xml._payment_terms')
    {{-- AllowanceCharges --}}
    @include('xml._allowance_charges')
    {{-- TaxTotals --}}
    @include('xml._tax_totals')
    {{-- LegalMonetaryTotal --}}
    @include('xml._legal_monetary_total')
    {{-- InvoiceLines --}}
    @include('xml._invoice_lines')
    {{-- <cac:InvoiceLine>
        <cbc:ID>1</cbc:ID>
        <cbc:InvoicedQuantity unitCode="EA">1.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">250000.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>false</cbc:FreeOfChargeIndicator>
        <cac:AllowanceCharge>
            <cbc:ID>1</cbc:ID>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReason>Discount</cbc:AllowanceChargeReason>
            <cbc:MultiplierFactorNumeric>25.00</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID="COP">50000.00</cbc:Amount>
            <cbc:BaseAmount currencyID="COP">300000.00</cbc:BaseAmount>
        </cac:AllowanceCharge>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="COP">47500.00</cbc:TaxAmount>
            <cbc:TaxEvidenceIndicator>false</cbc:TaxEvidenceIndicator>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="COP">250000.00</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="COP">47500.00</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>19.00</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>01</cbc:ID>
                        <cbc:Name>IVA</cbc:Name>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>Base para TV</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeAgencyName="195">6543542313534</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">300000.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="EA">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
    <cac:InvoiceLine>
        <cbc:ID>2</cbc:ID>
        <cbc:InvoicedQuantity unitCode="EA">1.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">0.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>true</cbc:FreeOfChargeIndicator>
        <cac:PricingReference>
            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID="COP">100000.00</cbc:PriceAmount>
                <cbc:PriceTypeCode>03</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
        </cac:PricingReference>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="COP">19000.00</cbc:TaxAmount>
            <cbc:TaxEvidenceIndicator>false</cbc:TaxEvidenceIndicator>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="COP">100000.00</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="COP">19000.00</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>19.00</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>01</cbc:ID>
                        <cbc:Name>IVA</cbc:Name>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>Antena (regalo)</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeID="999" schemeName="EAN13">3543542234414</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">0.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="EA">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
    <cac:InvoiceLine>
        <cbc:ID>3</cbc:ID>
        <cbc:InvoicedQuantity unitCode="EA">1.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">1410000.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>false</cbc:FreeOfChargeIndicator>
        <cac:AllowanceCharge>
            <cbc:ID>1</cbc:ID>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReason>Cargo</cbc:AllowanceChargeReason>
            <cbc:MultiplierFactorNumeric>10.00</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID="COP">10000.00</cbc:Amount>
        </cac:AllowanceCharge>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="COP">267900.00</cbc:TaxAmount>
            <cbc:TaxEvidenceIndicator>false</cbc:TaxEvidenceIndicator>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="COP">1410000.00</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="COP">267900.00</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>19.00</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>01</cbc:ID>
                        <cbc:Name>IVA</cbc:Name>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>TV</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeID="999" schemeName="EAN13">12435423151234</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">1400000.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="EA">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
    <cac:InvoiceLine>
        <cbc:ID>4</cbc:ID>
        <cbc:InvoicedQuantity unitCode="EA">1.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">20000.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>false</cbc:FreeOfChargeIndicator>
        <cac:Item>
            <cbc:Description>Servicio (excluido)</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeAgencyName="195" schemeName="EAN13">6543542313534</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">20000.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="NIU">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
    <cac:InvoiceLine>
        <cbc:ID>5</cbc:ID>
        <cbc:InvoicedQuantity unitCode="EA">1.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">40000.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>false</cbc:FreeOfChargeIndicator>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="COP">7600.00</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="COP">40000.00</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="COP">7600.00</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>19.00</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>01</cbc:ID>
                        <cbc:Name>IVA</cbc:Name>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>Acarreo</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeAgencyName="195" schemeName="EAN13">6543542313534</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">40000.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="NIU">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
    <cac:InvoiceLine>
        <cbc:ID>6</cbc:ID>
        <cbc:InvoicedQuantity unitCode="NIU">2.000000</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="COP">0.00</cbc:LineExtensionAmount>
        <cbc:FreeOfChargeIndicator>true</cbc:FreeOfChargeIndicator>
        <cac:PricingReference>
            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID="COP">200.00</cbc:PriceAmount>
                <cbc:PriceTypeCode>03</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
        </cac:PricingReference>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="COP">60.00</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID="COP">60.00</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode="NIU">1.000000</cbc:BaseUnitMeasure>
                <cbc:PerUnitAmount currencyID="COP">30.00</cbc:PerUnitAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>22</cbc:ID>
                        <cbc:Name>Impuesto sobre las bolsas</cbc:Name>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>Bolsas</cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>AOHV84-225</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:StandardItemIdentification>
                <cbc:ID schemeAgencyName="195" schemeID="001" schemeName="UNSPSC">18937100-7</cbc:ID>
            </cac:StandardItemIdentification>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="COP">0.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="EA">1.000000</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine> --}}
</Invoice>