<?php

namespace App\Traits;

use Storage;
use Exception;
use ZipArchive;
use App\Company;
use DOMDocument;
use App\Resolution;
use App\TypeDocument;
use InvalidArgumentException;
use Stenfrank\UBL21dian\Sign;

/**
 * Document trait.
 */
trait DocumentTrait
{
    /**
     * PPP.
     *
     * @var string
     */
    public $ppp = '000';

    /**
     * Payment form default.
     *
     * @var array
     */
    private $paymentFormDefault = [
        'payment_form_id' => 1,
        'payment_method_id' => 10,
    ];

    /**
     * Create xml.
     *
     * @param array $data
     *
     * @return DOMDocument
     */
    protected function createXML(array $data)
    {
        try {
            $DOMDocumentXML = new DOMDocument();
            $DOMDocumentXML->preserveWhiteSpace = false;
            $DOMDocumentXML->formatOutput = true;
            $DOMDocumentXML->loadXML(view("xml.{$data['typeDocument']['code']}", $data)->render());

            return $DOMDocumentXML;
        } catch (InvalidArgumentException $e) {
            throw new Exception("The API does not support the type of document '{$data['typeDocument']['name']}' Error: {$e->getMessage()}");
        } catch (Exception $e) {
            throw new Exception("Error: {$e->getMessage()}");
        }
    }

    /**
     * Zip base64.
     *
     * @param \App\Company              $company
     * @param \App\Resolution           $resolution
     * @param \Stenfrank\UBL21dian\Sign $sign
     *
     * @return string
     */
    protected function zipBase64(Company $company, Resolution $resolution, Sign $sign)
    {
        $dir = "zip/{$resolution->company_id}";
        $nameXML = $this->getFileName($company, $resolution);
        $nameZip = $this->getFileName($company, $resolution, 6, '.zip');

        $this->pathZIP = "app/zip/{$resolution->company_id}/{$nameZip}";

        Storage::put("xml/{$resolution->company_id}/{$nameXML}", $sign->xml);

        if (!Storage::has($dir)) {
            Storage::makeDirectory($dir);
        }

        $zip = new ZipArchive();
        $zip->open(storage_path($this->pathZIP), ZipArchive::CREATE);
        $zip->addFile(storage_path("app/xml/{$resolution->company_id}/{$nameXML}"), $nameXML);
        $zip->close();

        return $this->ZipBase64Bytes = base64_encode(file_get_contents(storage_path($this->pathZIP)));
    }

    /**
     * Get file name.
     *
     * @param \App\Company    $company
     * @param \App\Resolution $resolution
     *
     * @return string
     */
    protected function getFileName(Company $company, Resolution $resolution, $typeDocumentID = null, $extension = '.xml')
    {
        $date = now();
        $prefix = (is_null($typeDocumentID)) ? $resolution->type_document->prefix : TypeDocument::findOrFail($typeDocumentID)->prefix;

        $send = $company->send()->firstOrCreate([
            'year' => $date->format('y'),
            'type_document_id' => $typeDocumentID ?? $resolution->type_document_id,
        ]);

        $name = "{$prefix}{$this->stuffedString($company->identification_number)}{$this->ppp}{$date->format('y')}{$this->stuffedString($send->next_consecutive ?? 1, 8)}{$extension}";

        $send->increment('next_consecutive');

        return $name;
    }

    /**
     * Stuffed string.
     *
     * @param string $string
     * @param int    $length
     * @param int    $padString
     * @param int    $padType
     *
     * @return string
     */
    protected function stuffedString($string, $length = 10, $padString = 0, $padType = STR_PAD_LEFT)
    {
        return str_pad($string, $length, $padString, $padType);
    }

    /**
     * Get ZIP.
     *
     * @return string
     */
    protected function getZIP()
    {
        return $this->ZipBase64Bytes;
    }
}
