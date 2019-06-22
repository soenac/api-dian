<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// UBL 2.1
Route::prefix('/ubl2.1')->group(function() {
    // Configuration
    Route::prefix('/config')->group(function() {
        Route::post('/{nit}/{dv?}', 'Api\ConfigurationController@store');
    });
});

Route::middleware('auth:api')->group(function() {
    // UBL 2.1
    Route::prefix('/ubl2.1')->group(function() {
        // Configuration
        Route::prefix('/config')->group(function() {
            Route::put('/software', 'Api\ConfigurationController@storeSoftware');
            Route::put('/certificate', 'Api\ConfigurationController@storeCertificate');
            Route::put('/resolution', 'Api\ConfigurationController@storeResolution');
            Route::post('/document', 'Api\ConfigurationController@storeDocument');
        });
        
        // Invoice
        Route::prefix('/invoice')->group(function() {
            Route::post('/{testSetId}', 'Api\InvoiceController@testSetStore');
            Route::post('/', 'Api\InvoiceController@store');
        });
        
        // Status
        Route::prefix('/status')->group(function() {
            Route::post('/zip/{trackId}', 'Api\StateController@zip');
            Route::post('/document/{trackId}', 'Api\StateController@document');
        });
    });
});
