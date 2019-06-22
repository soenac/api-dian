<sts:InvoiceControl>
    <sts:InvoiceAuthorization>{{$resolution->resolution}}</sts:InvoiceAuthorization>
    <sts:AuthorizationPeriod>
        <cbc:StartDate>{{$resolution->date_from}}</cbc:StartDate>
        <cbc:EndDate>{{$resolution->date_to}}</cbc:EndDate>
    </sts:AuthorizationPeriod>
    <sts:AuthorizedInvoices>
        @if ($resolution->prefix)
            <sts:Prefix>{{$resolution->prefix}}</sts:Prefix>
        @endif
        <sts:From>{{$resolution->from}}</sts:From>
        <sts:To>{{$resolution->to}}</sts:To>
    </sts:AuthorizedInvoices>
</sts:InvoiceControl>
