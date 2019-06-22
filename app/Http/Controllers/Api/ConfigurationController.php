<?php

namespace App\Http\Controllers\Api;

use DB,
    Storage;
use App\User;
use Exception;
use App\Http\Requests\Api\{
    ConfigurationRequest,
    ConfigurationSoftwareRequest,
    ConfigurationResolutionRequest,
    ConfigurationCertificateRequest
};
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    /**
     * Store
     * @param  \App\Http\Requests\Api\ConfigurationRequest $request
     * @param  int               $nit
     * @param  int               $dv
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationRequest $request, $nit, $dv = null) {
        DB::beginTransaction();
        
        try {
            $password = Str::random(80);
            
            $user = User::create([
                'name' => $request->business_name,
                'email' => $request->email,
                'password' => bcrypt($password)
            ]);
            
            $user->api_token = hash('sha256', $password);
            
            $user->company()->create([
                'user_id' => $user->id,
                'identification_number' => $nit,
                'dv' => $dv,
                'language_id' => $request->language_id ?? 79,
                'tax_id' => $request->tax_id ?? 1,
                'type_environment_id' => $request->type_environment_id ?? 2,
                'type_operation_id' =>  $request->type_operation_id ?? 1,
                'type_document_identification_id' => $request->type_document_identification_id,
                'country_id' => $request->country_id ?? 46,
                'type_currency_id' => $request->type_currency_id ?? 35,
                'type_organization_id' => $request->type_organization_id,
                'type_regime_id' => $request->type_regime_id,
                'type_liability_id' => $request->type_liability_id,
                'municipality_id' => $request->municipality_id,
                'merchant_registration' => $request->merchant_registration,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
            
            $user->save();
            
            DB::commit();
            
            return [
                'message' => 'Empresa creada con éxito',
                'password' => $password,
                'token' => $password,
                'company' => $user->company
            ];
        }
        catch (Exception $e) {
            DB::rollBack();
            
            return response([
                'message' => 'Internal Server Error',
                'payload' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Store software
     * @param  \App\Http\Requests\Api\ConfigurationSoftwareRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeSoftware(ConfigurationSoftwareRequest $request) {
        DB::beginTransaction();
        
        try {
            auth()->user()->company->software()->delete();
            
            $software = auth()->user()->company->software()->create([
                'identifier' => $request->id,
                'pin' => $request->pin,
                'url' => $request->url ?? 'https://vpfe-hab.dian.gov.co/WcfDianCustomerServices.svc'
            ]);
            
            DB::commit();
            
            return [
                'message' => 'Software creado con éxito',
                'software' => $software,
            ];
        }
        catch (Exception $e) {
            DB::rollBack();
            
            return response([
                'message' => 'Internal Server Error',
                'payload' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Store certificate
     * @param  \App\Http\Requests\Api\ConfigurationCertificateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeCertificate(ConfigurationCertificateRequest $request) {
        try {
            if (!base64_decode($request->certificate, true)) throw new Exception('The given data was invalid.');
            if (!openssl_pkcs12_read($certificateBinary = base64_decode($request->certificate), $certificate, $request->password)) throw new Exception('The certificate could not be read.');
        }
        catch(Exception $e) {
            if (($error = openssl_error_string()) == false) {
                return response([
                    'message' => $e->getMessage(),
                    'errors' => [
                        'certificate' => 'The base64 encoding is not valid.',
                    ]
                ], 422);
            }
            
            return response([
                'message' => $e->getMessage(),
                'errors' => [
                    'certificate' => $error,
                    'password' => $error
                ]
            ], 422);
        }
        
        DB::beginTransaction();
        
        try {
            auth()->user()->company->certificate()->delete();
            
            $company = auth()->user()->company;
            $name = "{$company->identification_number}{$company->dv}.p12";
            
            Storage::put("certificates/{$name}", $certificateBinary);
            
            $certificate = auth()->user()->company->certificate()->create([
                'name' => $name,
                'password' => $request->password
            ]);
            
            DB::commit();
            
            return [
                'message' => 'Certificado creado con éxito',
                'certificado' => $certificate,
            ];
        }
        catch (Exception $e) {
            DB::rollBack();
            
            return response([
                'message' => 'Internal Server Error',
                'payload' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Store resolution
     * @param  \App\Http\Requests\Api\ConfigurationResolutionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeResolution(ConfigurationResolutionRequest $request) {
        DB::beginTransaction();
        
        try {
            $resolution = auth()->user()->company->resolutions()->updateOrCreate([
                'type_document_id' => $request->type_document_id
            ], [
                'prefix' => $request->prefix,
                'resolution' => $request->resolution,
                'resolution_date' => $request->resolution_date,
                'technical_key' => $request->technical_key,
                'from' => $request->from,
                'to' => $request->to,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to
            ]);
            
            DB::commit();
            
            return [
                'message' => 'Resolución creada con éxito',
                'resolution' => $resolution,
            ];
        }
        catch (Exception $e) {
            DB::rollBack();
            
            return response([
                'message' => 'Internal Server Error',
                'payload' => $e->getMessage()
            ], 500);
        }
    }
}
