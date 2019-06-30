<cac:BillingReference>
    <cac:InvoiceDocumentReference>
        <cbc:ID>{{$billingReference->number}}</cbc:ID>
        <cbc:UUID schemeName="{{$billingReference->scheme_name}}">{{$billingReference->uuid}}</cbc:UUID>
        <cbc:IssueDate>{{$billingReference->issue_date}}</cbc:IssueDate>
    </cac:InvoiceDocumentReference>
</cac:BillingReference>
