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

Route::middleware('auth:api')->group(function() {
    // UBL 2.1
    Route::prefix('/v2.1')->group(function() {
        // Configuration
        Route::prefix('/config')->group(function() {
            Route::post('/{nit}/{dv?}', 'Api\ConfigurationController@store');
            Route::put('/software', 'Api\ConfigurationController@storeSoftware');
            Route::put('/certificate', 'Api\ConfigurationController@storeCertificate');
            Route::put('/resolution', 'Api\ConfigurationController@storeResolution');
        });
    });
});
