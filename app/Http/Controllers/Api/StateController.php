<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Stenfrank\UBL21dian\Templates\SOAP\GetStatus;
use Stenfrank\UBL21dian\Templates\SOAP\GetStatusZip;

class StateController extends Controller
{
    /**
     * Zip.
     *
     * @param string $trackId
     *
     * @return array
     */
    public function zip($trackId)
    {
        // User
        $user = auth()->user();

        $getStatusZip = new GetStatusZip($user->company->certificate->path, $user->company->certificate->password);
        $getStatusZip->trackId = $trackId;

        return [
            'message' => 'Consulta generada con éxito',
            'ResponseDian' => $getStatusZip->signToSend()->getResponseToObject(),
        ];
    }

    /**
     * Document.
     *
     * @param string $trackId
     *
     * @return array
     */
    public function document($trackId)
    {
        // User
        $user = auth()->user();

        $getStatus = new GetStatus($user->company->certificate->path, $user->company->certificate->password);
        $getStatus->trackId = $trackId;

        return [
            'message' => 'Consulta generada con éxito',
            'ResponseDian' => $getStatus->signToSend()->getResponseToObject(),
        ];
    }
}
