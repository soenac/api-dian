<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stenfrank\UBL21dian\Templates\SOAP\{
    GetStatus,
    GetStatusZip
};

class StateController extends Controller
{
    public function zip($trackId) {
        // User
        $user = auth()->user();
        
        $getStatusZip = new GetStatusZip($user->company->certificate->path, $user->company->certificate->password);
        $getStatusZip->trackId = $trackId;
        
        return [
            'message' => "Consulta generada con éxito",
            'ResponseDian' => $getStatusZip->signToSend()->getResponseToObject()
        ];
    }
    
    public function document($trackId) {
        // User
        $user = auth()->user();
        
        $getStatus = new GetStatus($user->company->certificate->path, $user->company->certificate->password);
        $getStatus->trackId = $trackId;
        
        return [
            'message' => "Consulta generada con éxito",
            'ResponseDian' => $getStatus->signToSend()->getResponseToObject()
        ];
    }
}
