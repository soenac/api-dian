<?php

namespace App\Traits;

use App\Resolution;
use Storage,
    Exception,
    ZipArchive,
    DOMDocument,
    InvalidArgumentException;
use Stenfrank\UBL21dian\XAdESDIAN;

/**
 * Document trait
 */
trait DocumentTrait
{
    /**
     * Create xml
     * @param  array  $data
     * @return DOMDocument
     */
    protected function createXML(array $data) {
        try {
            $DOMDocumentXML = new DOMDocument;
            $DOMDocumentXML->preserveWhiteSpace = false;
            $DOMDocumentXML->formatOutput = true;
            $DOMDocumentXML->loadXML(view("xml.{$data['typeDocument']['code']}", $data)->render());
            
            return $DOMDocumentXML;
        }
        catch (InvalidArgumentException $e) {
            throw new Exception("The API does not support the type of document '{$data['typeDocument']['name']}' Error: {$e->getMessage()}");
        }
        catch (Exception $e) {
            throw new Exception("Error: {$e->getMessage()}");
        }
    }
    
    /**
     * Zip base64
     * @param  \App\Resolution $resolution
     * @param  Stenfrank\UBL21dian\XAdESDIAN  $xadesDIAN
     * @return string
     */
    protected function zipBase64(Resolution $resolution, XAdESDIAN $xadesDIAN) {
        Storage::put("xml/{$resolution->company_id}/{$resolution->next_consecutive}.xml", $xadesDIAN->xml);
        
        if (!Storage::has("zip/{$resolution->company_id}")) Storage::makeDirectory("zip/{$resolution->company_id}");
        
        $zip = new ZipArchive();
        $zip->open(storage_path("app/zip/{$resolution->company_id}/{$resolution->next_consecutive}.zip"), ZipArchive::CREATE);
        $zip->addFile(storage_path("app/xml/{$resolution->company_id}/{$resolution->next_consecutive}.xml"), "{$resolution->next_consecutive}.xml");
        $zip->close();
        
        return base64_encode(file_get_contents(storage_path("app/zip/{$resolution->company_id}/{$resolution->next_consecutive}.zip")));
    }
    
    /**
     * Get ZIP
     * @param  Resolution $resolution
     * @return string
     */
    protected function getZIP(Resolution $resolution) {
        return Storage::get("zip/{$resolution->company_id}/{$resolution->next_consecutive}.zip");
    }
}
