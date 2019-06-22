<?php

namespace App\Http\Controllers\Api;

use App\{
    User,
    Company,
    TaxTotal,
    InvoiceLine,
    PaymentForm,
    TypeDocument,
    PaymentMethod,
    AllowanceCharge,
    LegalMonetaryTotal
};
use Stenfrank\UBL21dian\XAdESDIAN;
use Illuminate\Http\Request;
use App\Traits\DocumentTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InvoiceRequest;
use Stenfrank\UBL21dian\Templates\SOAP\{
    SendBillAsync,
    SendTestSetAsync
};

class InvoiceController extends Controller
{
    use DocumentTrait;
    
    /**
     * Payment form default
     * @var array
     */
    private $paymentFormDefault = [
        'payment_form_id' => 1,
        'payment_method_id' => 10
    ];
    
    /**
     * Store
     * @param  \App\Http\Requests\Api\InvoiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request) {
        // User
        $user = auth()->user();
        
        // User company
        $company = $user->company;
        
        // Type document
        $typeDocument = TypeDocument::findOrFail($request->type_document_id);
        
        // Customer
        $customerAll = collect($request->customer);
        $customer = new User($customerAll->toArray());
        
        // Customer company
        $customer->company = new Company($customerAll->toArray());
        
        // Resolution
        $request->resolution->number = $request->number;
        $resolution = $request->resolution;
        
        // Payment form default
        $paymentFormAll = (object) array_merge($this->paymentFormDefault, $request->payment_form ?? []);
        $paymentForm = PaymentForm::findOrFail($paymentFormAll->payment_form_id);
        $paymentForm->payment_method_code = PaymentMethod::findOrFail($paymentFormAll->payment_method_id)->code;
        $paymentForm->payment_due_date = $paymentFormAll->payment_due_date ?? null;
        $paymentForm->duration_measure = $paymentFormAll->duration_measure ?? null;
        
        // Allowance charges
        $allowanceCharges = collect();
        foreach ($request->allowance_charges ?? [] as $allowanceCharge) $allowanceCharges->push(new AllowanceCharge($allowanceCharge));
        
        // Tax totals
        $taxTotals = collect();
        foreach ($request->tax_totals ?? [] as $taxTotal) $taxTotals->push(new TaxTotal($taxTotal));
        
        // Legal monetary totals
        $legalMonetaryTotal = new LegalMonetaryTotal($request->legal_monetary_totals);
        
        // Invoice lines
        $invoiceLines = collect();
        foreach ($request->invoice_lines as $invoiceLine) $invoiceLines->push(new InvoiceLine($invoiceLine));
        
        // Create XML
        $invoice = $this->createXML(compact('user', 'company', 'customer', 'taxTotals', 'resolution', 'paymentForm', 'typeDocument', 'invoiceLines', 'allowanceCharges', 'legalMonetaryTotal'));
        
        // Signature XML
        $xadesDIAN = new XAdESDIAN($company->certificate->path, $company->certificate->password);
        $xadesDIAN->softwareID = $company->software->identifier;
        $xadesDIAN->pin = $company->software->pin;
        $xadesDIAN->technicalKey = $resolution->technical_key;
        
        $sendBillAsync = new SendBillAsync($company->certificate->path, $company->certificate->password);
        $sendBillAsync->fileName = "{$resolution->next_consecutive}.xml";
        $sendBillAsync->contentFile = $this->zipBase64($resolution, $xadesDIAN->sign($invoice));
        
        return [
            'message' => "{$typeDocument->name} #{$resolution->next_consecutive} generada con éxito",
            'ResponseDian' => $sendBillAsync->signToSend()->getResponseToObject(),
            'ZipBase64Bytes' => base64_encode($this->getZIP($resolution))
        ];
    }
    
    /**
     * Test set store
     * @param  \App\Http\Requests\Api\InvoiceRequest $request
     * @param  string         $testSetId
     * @return \Illuminate\Http\Response
     */
    public function testSetStore(InvoiceRequest $request, $testSetId) {
        // User
        $user = auth()->user();
        
        // User company
        $company = $user->company;
        
        // Type document
        $typeDocument = TypeDocument::findOrFail($request->type_document_id);
        
        // Customer
        $customerAll = collect($request->customer);
        $customer = new User($customerAll->toArray());
        
        // Customer company
        $customer->company = new Company($customerAll->toArray());
        
        // Resolution
        $request->resolution->number = $request->number;
        $resolution = $request->resolution;
        
        // Payment form default
        $paymentFormAll = (object) array_merge($this->paymentFormDefault, $request->payment_form ?? []);
        $paymentForm = PaymentForm::findOrFail($paymentFormAll->payment_form_id);
        $paymentForm->payment_method_code = PaymentMethod::findOrFail($paymentFormAll->payment_method_id)->code;
        $paymentForm->payment_due_date = $paymentFormAll->payment_due_date ?? null;
        $paymentForm->duration_measure = $paymentFormAll->duration_measure ?? null;
        
        // Allowance charges
        $allowanceCharges = collect();
        foreach ($request->allowance_charges ?? [] as $allowanceCharge) $allowanceCharges->push(new AllowanceCharge($allowanceCharge));
        
        // Tax totals
        $taxTotals = collect();
        foreach ($request->tax_totals ?? [] as $taxTotal) $taxTotals->push(new TaxTotal($taxTotal));
        
        // Legal monetary totals
        $legalMonetaryTotal = new LegalMonetaryTotal($request->legal_monetary_totals);
        
        // Invoice lines
        $invoiceLines = collect();
        foreach ($request->invoice_lines as $invoiceLine) $invoiceLines->push(new InvoiceLine($invoiceLine));
        
        // Create XML
        $invoice = $this->createXML(compact('user', 'company', 'customer', 'taxTotals', 'resolution', 'paymentForm', 'typeDocument', 'invoiceLines', 'allowanceCharges', 'legalMonetaryTotal'));
        
        // Signature XML
        $xadesDIAN = new XAdESDIAN($company->certificate->path, $company->certificate->password);
        $xadesDIAN->softwareID = $company->software->identifier;
        $xadesDIAN->pin = $company->software->pin;
        $xadesDIAN->technicalKey = $resolution->technical_key;
        
        $sendTestSetAsync = new SendTestSetAsync($company->certificate->path, $company->certificate->password);
        $sendTestSetAsync->fileName = "{$resolution->next_consecutive}.xml";
        $sendTestSetAsync->contentFile = $this->zipBase64($resolution, $xadesDIAN->sign($invoice));
        $sendTestSetAsync->testSetId = $testSetId;
        
        return [
            'message' => "{$typeDocument->name} #{$resolution->next_consecutive} generada con éxito",
            'ResponseDian' => $sendTestSetAsync->signToSend()->getResponseToObject(),
            'ZipBase64Bytes' => base64_encode($this->getZIP($resolution))
        ];
    }
}
