<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ConfigurationRequest;

/**
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     securityScheme="api_token",
 *     name="Authorization"
 * ),
 * @OA\OpenApi(
 *     @OA\Server(
 *         url="http://127.0.0.1:8000",
 *         description="Server"
 *     ),
 *     @OA\Info(
 *         version="0.1",
 *         title="API Facturación Electronica Validación Previa DIAN",
 *         description="Documentación API Facturación Electronica Validación Previa DIAN."
 *     )
 * ),
 * @OA\Tag(
 *     name="Configuración",
 *     description="Configuración inicial del API."
 * ),
 */
class ConfigurationController extends Controller
{
    // Bearer nwflpzMsyCiYI6pca5jIj6Zh4jsoMwFkUArT55IvfYGFHOcef5oyzfAxq3YwXvGaaWOHS8aa2hVjaf0i
    /**
     * @OA\Post(
     *    tags={"Configuración"},
     *    path="/api/v2.1/config/company/{nit}/{dv}",
     *    summary="Datos de la empresa, resolucion, certificado dígita, etc.",
     *    security={{"api_token":{}}},
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *                @OA\Property(
     *                    property="type_document_identification_id",
     *                    description="Tipo de identificación del documento",
     *                    type="integer"
     *                ),
     *                @OA\Property(
     *                    property="country_id",
     *                    description="Código del pais",
     *                    type="integer"
     *                ),
     *                @OA\Property(
     *                    property="type_organization_id",
     *                    description="Tipo de organización",
     *                    type="integer"
     *                ),
     *                @OA\Property(
     *                    property="razon_social",
     *                    description="Razón social",
     *                    type="integer"
     *                ),
     *                @OA\Property(
     *                    property="municipality_id",
     *                    description="Código del municipio",
     *                    type="integer"
     *                ),
     *                @OA\Property(
     *                    property="direccion",
     *                    description="Dirección",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="phone",
     *                    description="Teléfono",
     *                    type="string"
     *                )
     *            )
     *        )
     *    ),
     *    @OA\Parameter(
     *         name="nit",
     *         description="Número de Identificación Tributaria RUT",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *    ),
     *    @OA\Parameter(
     *         name="dv",
     *         description="Dígito de verificación RUT",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *    ),
     *    @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    ),
     *    @OA\Response(
     *        response=422,
     *        description="Unprocessable Entity",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    ),
     *    @OA\Response(
     *        response=400,
     *        description="Bad Request",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    ),
     *    @OA\Response(
     *        response=401,
     *        description="Unauthorized",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    ),
     *    @OA\Response(
     *        response=404,
     *        description="Not Found",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    ),
     *    @OA\Response(
     *        response=500,
     *        description="Internal Server Error",
     *        @OA\JsonContent(
     *            type="array",
     *            @OA\Items()
     *        ),
     *    )
     * )
     */
    public function index(ConfigurationRequest $request) {
        return $request;
    }
}
