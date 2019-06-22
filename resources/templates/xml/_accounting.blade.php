<cac:{{$node}}>
    <cbc:AdditionalAccountID>{{$user->company->type_organization->code}}</cbc:AdditionalAccountID>
    <cac:Party>
        <cac:PartyName>
            <cbc:Name>{{$user->name}}</cbc:Name>
        </cac:PartyName>
        {{-- <cac:PartyName>
            <cbc:Name>Establecimiento Principal</cbc:Name>
        </cac:PartyName>
        <cac:PartyName>
            <cbc:Name>FACTURADOR DE EJEMPLO</cbc:Name>
        </cac:PartyName> --}}
        {{-- Optional client --}}
        @isset($supplier)
            <cac:PhysicalLocation>
                <cac:Address>
                    <cbc:ID>{{$user->company->municipality->code}}</cbc:ID>
                    <cbc:CityName>{{$user->company->municipality->name}}</cbc:CityName>
                    <cbc:CountrySubentity>{{$user->company->municipality->department->name}}</cbc:CountrySubentity>
                    <cbc:CountrySubentityCode>{{$user->company->municipality->department->code}}</cbc:CountrySubentityCode>
                    <cac:AddressLine>
                        <cbc:Line>{{$user->company->address}}</cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>{{$user->company->country->code}}</cbc:IdentificationCode>
                        <cbc:Name languageID="{{$user->company->language->code}}">{{$user->company->country->name}}</cbc:Name>
                    </cac:Country>
                </cac:Address>
            </cac:PhysicalLocation>
        @endisset
        <cac:PartyTaxScheme>
            <cbc:RegistrationName>{{$user->name}}</cbc:RegistrationName>
            <cbc:CompanyID schemeAgencyID="195" schemeAgencyName="CO, DIAN (Dirección de Impuestos y Aduanas Nacionales)" @if ($user->company->type_document_identification_id == 6) schemeID="{{$user->company->dv}}" @endif schemeName="{{$user->company->type_document_identification->code}}">{{$user->company->identification_number}}</cbc:CompanyID>
            <cbc:TaxLevelCode listName="{{$user->company->type_regime->code}}">{{$user->company->type_liability->code}}</cbc:TaxLevelCode>
            <cac:RegistrationAddress>
                <cbc:ID>{{$user->company->municipality->code}}</cbc:ID>
                <cbc:CityName>{{$user->company->municipality->name}}</cbc:CityName>
                <cbc:CountrySubentity>{{$user->company->municipality->department->name}}</cbc:CountrySubentity>
                <cbc:CountrySubentityCode>{{$user->company->municipality->department->code}}</cbc:CountrySubentityCode>
                <cac:AddressLine>
                    <cbc:Line>{{$user->company->address}}</cbc:Line>
                </cac:AddressLine>
                <cac:Country>
                    <cbc:IdentificationCode>{{$user->company->country->code}}</cbc:IdentificationCode>
                    <cbc:Name languageID="{{$user->company->language->code}}">{{$user->company->country->name}}</cbc:Name>
                </cac:Country>
            </cac:RegistrationAddress>
            <cac:TaxScheme>
                <cbc:ID>{{$user->company->tax->code}}</cbc:ID>
                <cbc:Name>{{$user->company->tax->name}}</cbc:Name>
            </cac:TaxScheme>
        </cac:PartyTaxScheme>
        <cac:PartyLegalEntity>
            <cbc:RegistrationName>{{$user->name}}</cbc:RegistrationName>
            <cbc:CompanyID schemeAgencyID="195" schemeAgencyName="CO, DIAN (Dirección de Impuestos y Aduanas Nacionales)" @if ($user->company->type_document_identification_id == 6) schemeID="{{$user->company->dv}}" @endif schemeName="{{$user->company->type_document_identification->code}}">{{$user->company->identification_number}}</cbc:CompanyID>
            <cac:CorporateRegistrationScheme>
                @isset($supplier)
                    <cbc:ID>{{$resolution->prefix}}</cbc:ID>
                @endisset
                <cbc:Name>{{$user->company->merchant_registration}}</cbc:Name>
            </cac:CorporateRegistrationScheme>
        </cac:PartyLegalEntity>
        <cac:Contact>
            <cbc:Telephone>{{$user->company->phone}}</cbc:Telephone>
            <cbc:ElectronicMail>{{$user->email}}</cbc:ElectronicMail>
        </cac:Contact>
    </cac:Party>
</cac:{{$node}}>
