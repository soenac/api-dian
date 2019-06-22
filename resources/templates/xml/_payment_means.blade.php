<cac:PaymentMeans>
    <cbc:ID>{{$paymentForm->code}}</cbc:ID>
    <cbc:PaymentMeansCode>{{$paymentForm->payment_method_code}}</cbc:PaymentMeansCode>
    @if ($paymentForm->code == '2')
        <cbc:PaymentDueDate>{{$paymentForm->payment_due_date}}</cbc:PaymentDueDate>
    @endif
    <cbc:PaymentID>{{$paymentForm->payment_id}}</cbc:PaymentID>
</cac:PaymentMeans>
