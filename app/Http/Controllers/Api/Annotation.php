<?php

/**
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     securityScheme="api_token",
 *     name="Authorization"
 * ),
 * @OA\OpenApi(
 *     @OA\Server(
 *         url=APP_URL,
 *         description="Server"
 *     ),
 *     @OA\Info(
 *         version=APP_VERSION,
 *         title="API Facturación Electronica Validación Previa DIAN",
 *         description="Documentación API Facturación Electronica Validación Previa DIAN, [Listados](/listings)."
 *     )
 * ),
 * @OA\Tag(
 *     name="Configuración",
 *     description="Configuración inicial del API."
 * ),
 * * @OA\Tag(
 *     name="Facturas",
 *     description="Envio de facturas."
 * ),
 * @OA\Tag(
 *     name="Estados",
 *     description="Validación de estado de envios o documentos."
 * ),
 */

// Bearer nwflpzMsyCiYI6pca5jIj6Zh4jsoMwFkUArT55IvfYGFHOcef5oyzfAxq3YwXvGaaWOHS8aa2hVjaf0i
// ConfigurationController@store
/**
 * @OA\Post(
 *    tags={"Configuración"},
 *    path="/api/ubl2.1/config/{nit}/{dv}",
 *    summary="Datos de la empresa",
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la creación de la empresa.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                  "type_document_identification_id",
 *                  "type_organization_id",
 *                  "type_regime_id",
 *                  "type_liability_id",
 *                  "business_name",
 *                  "merchant_registration",
 *                  "municipality_id",
 *                  "address",
 *                  "phone",
 *                  "email",
 *                },
 *                 @OA\Property(
 *                    property="language_id",
 *                    description="Código del idioma",
 *                    type="integer",
 *                    default=79
 *                ),
 *                 @OA\Property(
 *                    property="tax_id",
 *                    description="Código del impuesto (Grupo de informaciones legales del emisor)",
 *                    type="integer",
 *                    default=1
 *                ),
 *                @OA\Property(
 *                    property="type_environment_id",
 *                    description="Código del ambiente",
 *                    type="integer",
 *                    default=2
 *                ),
 *                @OA\Property(
 *                    property="type_operation_id",
 *                    description="Código del tipo de operación",
 *                    type="integer",
 *                    default=1
 *                ),
 *                @OA\Property(
 *                    property="type_document_identification_id",
 *                    description="Código del tipo identificación de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="country_id",
 *                    description="Código del pais",
 *                    type="integer",
 *                    default=46,
 *                ),
 *                @OA\Property(
 *                    property="type_currency_id",
 *                    description="Código del tipo moneda por defecto",
 *                    type="integer",
 *                    default="35"
 *                ),
 *                @OA\Property(
 *                    property="type_organization_id",
 *                    description="Código del tipo organización",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="type_regime_id",
 *                    description="Código del tipo regimen",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="type_liability_id",
 *                    description="Código del tipo responsabilidad",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="business_name",
 *                    description="Razón social",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="merchant_registration",
 *                    description="Matrícula mercantil",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="municipality_id",
 *                    description="Código del municipio",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="address",
 *                    description="Dirección",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="phone",
 *                    description="Teléfono",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="email",
 *                    description="Correo electrónico",
 *                    type="string",
 *                    format="email"
 *                ),
 *                example={
 *                    "type_document_identification_id": 6,
 *                    "type_organization_id": 1,
 *                    "type_regime_id": 2,
 *                    "type_liability_id": 19,
 *                    "business_name": "EMPRESA DE PRUEBAS",
 *                    "merchant_registration": "1234567-12",
 *                    "municipality_id": 1006,
 *                    "address": "CALLE 1 1C 1",
 *                    "phone": 3216547,
 *                    "email": "test@test.test",
 *                }
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
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// ConfigurationController@storeSoftware
/**
 * @OA\Put(
 *    tags={"Configuración"},
 *    path="/api/ubl2.1/config/software",
 *    summary="Datos del software",
 *    security={{"api_token":{}}},
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la configuración del software.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                  "id",
 *                  "pin"
 *                },
 *                @OA\Property(
 *                    property="id",
 *                    description="Id del software",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="pin",
 *                    description="Pin del software",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="url",
 *                    description="URL del software",
 *                    type="string",
 *                    default="https://vpfe-hab.dian.gov.co/WcfDianCustomerServices.svc"
 *                ),
 *                example={
 *                    "id": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
 *                    "pin": 12345
 *                }
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// ConfigurationController@storeCertificate
/**
 * @OA\Put(
 *    tags={"Configuración"},
 *    path="/api/ubl2.1/config/certificate",
 *    summary="Datos del certificado",
 *    security={{"api_token":{}}},
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la configuración del certificado.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                  "certificate",
 *                  "password"
 *                },
 *                @OA\Property(
 *                    property="certificate",
 *                    description="Certificado (.p12) en base64",
 *                    type="string",
 *                    format="byte"
 *                ),
 *                @OA\Property(
 *                    property="password",
 *                    description="Password del certificado",
 *                    type="string"
 *                ),
 *                example={
 *                    "certificate": "base64",
 *                    "password": "123456"
 *                }
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// ConfigurationController@storeResolution
/**
 * @OA\Put(
 *    tags={"Configuración"},
 *    path="/api/ubl2.1/config/resolution",
 *    summary="Datos de la resolución",
 *    security={{"api_token":{}}},
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la configuración de la resolución.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                    "type_document_id",
 *                    "from",
 *                    "to"
 *                },
 *                @OA\Property(
 *                    property="type_document_id",
 *                    description="Código de tipo de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="prefix",
 *                    description="Prefijo",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="resolution",
 *                    description="Resolución",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="resolution_date",
 *                    description="Fecha de resolución",
 *                    type="string",
 *                    format="date"
 *                ),
 *                @OA\Property(
 *                    property="technical_key",
 *                    description="Llave técnica",
 *                    type="string"
 *                ),
 *                @OA\Property(
 *                    property="from",
 *                    description="Desde",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="to",
 *                    description="Hasta",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="generated_to_date",
 *                    description="Generados hasta la fecha",
 *                    type="integer",
 *                    default=0
 *                ),
 *                @OA\Property(
 *                    property="date_from",
 *                    description="Fecha desde",
 *                    type="string",
 *                    format="date"
 *                ),
 *                @OA\Property(
 *                    property="date_to",
 *                    description="Fecha hasta",
 *                    type="string",
 *                    format="date"
 *                ),
 *                example={
 *                    "type_document_id": 4,
 *                    "from": 0,
 *                    "to": 0
 *                }
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// InvoiceController@store
/**
 * @OA\Post(
 *    tags={"Facturas"},
 *    path="/api/ubl2.1/invoice/{testSetId}",
 *    summary="Envio de Factura de Venta Nacional (Set de pruebas)",
 *    security={{"api_token":{}}},
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la configuración de la resolución.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                    "number",
 *                    "type_document_id",
 *                    "customer",
 *                    "legal_monetary_totals",
 *                    "invoice_lines"
 *                },
 *                @OA\Property(
 *                    property="number",
 *                    description="Número de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="type_document_id",
 *                    description="Código de tipo de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="customer",
 *                    description="Datos del cliente",
 *                    type="object",
 *                    required={
 *                        "identification_number",
 *                        "name",
 *                        "phone",
 *                        "address",
 *                        "email",
 *                        "merchant_registration"
 *                    },
 *                    @OA\Property(
 *                        property="identification_number",
 *                        description="Número de identificación",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="dv",
 *                        description="Dígito de verificación",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_document_identification_id",
 *                        description="Código de documento de identidad",
 *                        default=3,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_organization_id",
 *                        description="Código de tipo de organización",
 *                        default=2,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="language_id",
 *                        description="Código de idioma",
 *                        default=79,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="country_id",
 *                        description="Código de pais",
 *                        default=46,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="municipality_id",
 *                        description="Código de municipio",
 *                        default=1006,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_regime_id",
 *                        description="Código de régimen",
 *                        default=1,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_id",
 *                        description="Código de impuesto (Identificador del tributo del adquirente)",
 *                        default=1,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_liability_id",
 *                        description="Código de responsabilidad",
 *                        default=22,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="name",
 *                        description="Nombre o razon social del empresa",
 *                        type="string"
 *                    ),
 *                    @OA\Property(
 *                        property="phone",
 *                        description="Teléfono",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="address",
 *                        description="Dirección",
 *                        type="string"
 *                    ),
 *                    @OA\Property(
 *                        property="email",
 *                        description="Correo electrónico",
 *                        type="string",
 *                        format="email"
 *                    ),
 *                    @OA\Property(
 *                        property="merchant_registration",
 *                        description="Registro mercantil",
 *                        type="string"
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="payment_form",
 *                    description="Forma de pago",
 *                    type="object",
 *                    @OA\Property(
 *                        property="payment_form_id",
 *                        description="Código de forma de pago",
 *                        type="integer",
 *                        default=1
 *                    ),
 *                    @OA\Property(
 *                        property="payment_method_id",
 *                        description="Código del método de pago",
 *                        type="integer",
 *                        default=10
 *                    ),
 *                    @OA\Property(
 *                        property="payment_due_date",
 *                        description="Fecha de vencimiento del pago",
 *                        type="string",
 *                        format="date"
 *                    ),
 *                    @OA\Property(
 *                        property="duration_measure",
 *                        description="Medida de duración en dias",
 *                        type="integer"
 *                    )
 *                ),
 *                @OA\Property(
 *                    property="allowance_charges",
 *                    description="Cargos o descuentos",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "charge_indicator",
 *                            "allowance_charge_reason",
 *                            "amount",
 *                            "base_amount"
 *                        },
 *                        @OA\Property(
 *                            property="charge_indicator",
 *                            description="Cargo o descuento",
 *                            type="boolean"
 *                        ),
 *                        @OA\Property(
 *                            property="discount_id",
 *                            description="Código de descuento",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="allowance_charge_reason",
 *                            description="Razón del cargo o descuento",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="amount",
 *                            description="Cantidad",
 *                            type="number",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="base_amount",
 *                            description="Cantidad base",
 *                            type="number",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="tax_totals",
 *                    description="Totales impuestos",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "tax_id",
 *                            "tax_amount",
 *                            "taxable_amount"
 *                        },
 *                        @OA\Property(
 *                            property="tax_id",
 *                            description="Código impuesto",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="percent",
 *                            description="Porcentaje",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="tax_amount",
 *                            description="Importe del impuesto",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="taxable_amount",
 *                            description="Base imponible",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="unit_measure_id",
 *                            description="Código de unidad de medida",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="per_unit_amount",
 *                            description="Por unidad de cantidad",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                         @OA\Property(
 *                            property="base_unit_measure",
 *                            description="Medida unidad base",
 *                            type="integer",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="legal_monetary_totals",
 *                    description="Totales monetarios legales",
 *                    type="object",
 *                    required={
 *                        "line_extension_amount",
 *                        "tax_exclusive_amount",
 *                        "tax_inclusive_amount",
 *                        "allowance_total_amount",
 *                        "charge_total_amount",
 *                        "payable_amount"
 *                    },
 *                    @OA\Property(
 *                        property="line_extension_amount",
 *                        description="Cantidad de extensión de línea",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_exclusive_amount",
 *                        description="Cantidad exclusiva de impuestos",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_inclusive_amount",
 *                        description="Cantidad de impuestos incluidos",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="allowance_total_amount",
 *                        description="Cantidad total de la asignación",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="charge_total_amount",
 *                        description="Cantidad del importe total",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="payable_amount",
 *                        description="Cantidad a pagar",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="invoice_lines",
 *                    description="Líneas de factura",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "unit_measure_id",
 *                            "invoiced_quantity",
 *                            "line_extension_amount",
 *                            "free_of_charge_indicator",
 *                            "description",
 *                            "code",
 *                            "type_item_identification_id",
 *                            "price_amount",
 *                            "base_quantity"
 *                        },
 *                        @OA\Property(
 *                            property="unit_measure_id",
 *                            description="Código de unidad de medida",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="invoiced_quantity",
 *                            description="Cantidad facturada",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="line_extension_amount",
 *                            description="Cantidad de extensión de línea",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="free_of_charge_indicator",
 *                            description="Indicador de libre carga",
 *                            type="boolean"
 *                        ),
 *                        @OA\Property(
 *                            property="reference_price_id",
 *                            description="Código de referencia precios",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="allowance_charges",
 *                            description="Cargos o descuentos",
 *                            type="array",
 *                            @OA\Items(
 *                                required={
 *                                    "charge_indicator",
 *                                    "allowance_charge_reason",
 *                                    "amount"
 *                                },
 *                                @OA\Property(
 *                                    property="charge_indicator",
 *                                    description="Cargo o descuento",
 *                                    type="boolean"
 *                                ),
 *                                @OA\Property(
 *                                    property="allowance_charge_reason",
 *                                    description="Razón del cargo o descuento",
 *                                    type="string"
 *                                ),
 *                                @OA\Property(
 *                                    property="amount",
 *                                    description="Cantidad",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="base_amount",
 *                                    description="Cantidad base",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="multiplier_factor_numeric",
 *                                    description="Factor multiplicador numérico",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                            )
 *                        ),
 *                        @OA\Property(
 *                            property="tax_totals",
 *                            description="Totales de impuestos",
 *                            type="array",
 *                            @OA\Items(
 *                                required={
 *                                    "tax_id",
 *                                    "tax_amount",
 *                                    "taxable_amount"
 *                                },
 *                                @OA\Property(
 *                                    property="tax_id",
 *                                    description="Código de impuesto",
 *                                    type="integer"
 *                                ),
 *                                @OA\Property(
 *                                    property="tax_amount",
 *                                    description="Importe del impuesto",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="taxable_amount",
 *                                    description="Base imponible",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="percent",
 *                                    description="Porcentaje",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="unit_measure_id",
 *                                    description="Código de unidad de medida",
 *                                    type="integer"
 *                                ),
 *                                @OA\Property(
 *                                    property="per_unit_amount",
 *                                    description="Por unidad de cantidad",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="base_unit_measure",
 *                                    description="Medida unidad base",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                            )
 *                        ),
 *                        @OA\Property(
 *                            property="description",
 *                            description="Descripción",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="code",
 *                            description="Código interno",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="type_item_identification_id",
 *                            description="Código de identificación del artículo",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="price_amount",
 *                            description="Importe del precio",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="base_quantity",
 *                            description="Cantidad base",
 *                            type="integer",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                example={
 *                    "number": 0,
 *                    "type_document_id": 1,
 *                    "customer": {
 *                        "identification_number": 1234567890,
 *                        "name": "Customer Test",
 *                        "phone": 1234567,
 *                        "address": "CALLE 0 0C 0",
 *                        "email": "test@test.com",
 *                        "merchant_registration": "No tiene"
 *                    },
 *                    "legal_monetary_totals": {
 *                        "line_extension_amount": "0.00",
 *                        "tax_exclusive_amount": "0.00",
 *                        "tax_inclusive_amount": "0.00",
 *                        "allowance_total_amount": "0.00",
 *                        "charge_total_amount": "0.00",
 *                        "payable_amount": "0.00"
 *                    },
 *                    "invoice_lines": {
 *                        {
 *                            "unit_measure_id": 642,
 *                            "invoiced_quantity": "1.000000",
 *                            "line_extension_amount": "0.00",
 *                            "free_of_charge_indicator": false,
 *                            "allowance_charges": {{
 *                                "charge_indicator": false,
 *                                "allowance_charge_reason": "Discount",
 *                                "amount": "0.00",
 *                                "base_amount": "0.00"
 *                            }},
 *                            "tax_totals": {{
 *                                "tax_id": 1,
 *                                "tax_amount": "0.00",
 *                                "taxable_amount": "0.00",
 *                                "percent": "19.00"
 *                            }},
 *                           "description": "XXXXXXXXXXX",
 *                           "code": "1234567890",
 *                           "type_item_identification_id": 3,
 *                           "price_amount": "0.00",
 *                           "base_quantity": "1.000000"
 *                        }
 *                    }
 *                }
 *            )
 *        )
 *    ),
 *    @OA\Parameter(
 *         name="testSetId",
 *         description="Test set ID",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="string"
 *         ),
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// InvoiceController@store
/**
 * @OA\Post(
 *    tags={"Facturas"},
 *    path="/api/ubl2.1/invoice",
 *    summary="Envio de Factura de Venta Nacional",
 *    security={{"api_token":{}}},
 *    @OA\RequestBody(
 *        required=true,
 *        description="Objeto para la configuración de la resolución.",
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *                required={
 *                    "number",
 *                    "type_document_id",
 *                    "customer",
 *                    "legal_monetary_totals",
 *                    "invoice_lines"
 *                },
 *                @OA\Property(
 *                    property="number",
 *                    description="Número de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="type_document_id",
 *                    description="Código de tipo de documento",
 *                    type="integer"
 *                ),
 *                @OA\Property(
 *                    property="customer",
 *                    description="Datos del cliente",
 *                    type="object",
 *                    required={
 *                        "identification_number",
 *                        "name",
 *                        "phone",
 *                        "address",
 *                        "email",
 *                        "merchant_registration"
 *                    },
 *                    @OA\Property(
 *                        property="identification_number",
 *                        description="Número de identificación",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="dv",
 *                        description="Dígito de verificación",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_document_identification_id",
 *                        description="Código de documento de identidad",
 *                        default=3,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_organization_id",
 *                        description="Código de tipo de organización",
 *                        default=2,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="language_id",
 *                        description="Código de idioma",
 *                        default=79,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="country_id",
 *                        description="Código de pais",
 *                        default=46,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="municipality_id",
 *                        description="Código de municipio",
 *                        default=1006,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_regime_id",
 *                        description="Código de régimen",
 *                        default=1,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_id",
 *                        description="Código de impuesto (Identificador del tributo del adquirente)",
 *                        default=1,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="type_liability_id",
 *                        description="Código de responsabilidad",
 *                        default=22,
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="name",
 *                        description="Nombre o razon social del empresa",
 *                        type="string"
 *                    ),
 *                    @OA\Property(
 *                        property="phone",
 *                        description="Teléfono",
 *                        type="integer"
 *                    ),
 *                    @OA\Property(
 *                        property="address",
 *                        description="Dirección",
 *                        type="string"
 *                    ),
 *                    @OA\Property(
 *                        property="email",
 *                        description="Correo electrónico",
 *                        type="string",
 *                        format="email"
 *                    ),
 *                    @OA\Property(
 *                        property="merchant_registration",
 *                        description="Registro mercantil",
 *                        type="string"
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="payment_form",
 *                    description="Forma de pago",
 *                    type="object",
 *                    @OA\Property(
 *                        property="payment_form_id",
 *                        description="Código de forma de pago",
 *                        type="integer",
 *                        default=1
 *                    ),
 *                    @OA\Property(
 *                        property="payment_method_id",
 *                        description="Código del método de pago",
 *                        type="integer",
 *                        default=10
 *                    ),
 *                    @OA\Property(
 *                        property="payment_due_date",
 *                        description="Fecha de vencimiento del pago",
 *                        type="string",
 *                        format="date"
 *                    ),
 *                    @OA\Property(
 *                        property="duration_measure",
 *                        description="Medida de duración en dias",
 *                        type="integer"
 *                    )
 *                ),
 *                @OA\Property(
 *                    property="allowance_charges",
 *                    description="Cargos o descuentos",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "charge_indicator",
 *                            "allowance_charge_reason",
 *                            "amount",
 *                            "base_amount"
 *                        },
 *                        @OA\Property(
 *                            property="charge_indicator",
 *                            description="Cargo o descuento",
 *                            type="boolean"
 *                        ),
 *                        @OA\Property(
 *                            property="discount_id",
 *                            description="Código de descuento",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="allowance_charge_reason",
 *                            description="Razón del cargo o descuento",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="amount",
 *                            description="Cantidad",
 *                            type="number",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="base_amount",
 *                            description="Cantidad base",
 *                            type="number",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="tax_totals",
 *                    description="Totales impuestos",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "tax_id",
 *                            "tax_amount",
 *                            "taxable_amount"
 *                        },
 *                        @OA\Property(
 *                            property="tax_id",
 *                            description="Código impuesto",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="percent",
 *                            description="Porcentaje",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="tax_amount",
 *                            description="Importe del impuesto",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="taxable_amount",
 *                            description="Base imponible",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="unit_measure_id",
 *                            description="Código de unidad de medida",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="per_unit_amount",
 *                            description="Por unidad de cantidad",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                         @OA\Property(
 *                            property="base_unit_measure",
 *                            description="Medida unidad base",
 *                            type="integer",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="legal_monetary_totals",
 *                    description="Totales monetarios legales",
 *                    type="object",
 *                    required={
 *                        "line_extension_amount",
 *                        "tax_exclusive_amount",
 *                        "tax_inclusive_amount",
 *                        "allowance_total_amount",
 *                        "charge_total_amount",
 *                        "payable_amount"
 *                    },
 *                    @OA\Property(
 *                        property="line_extension_amount",
 *                        description="Cantidad de extensión de línea",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_exclusive_amount",
 *                        description="Cantidad exclusiva de impuestos",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="tax_inclusive_amount",
 *                        description="Cantidad de impuestos incluidos",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="allowance_total_amount",
 *                        description="Cantidad total de la asignación",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="charge_total_amount",
 *                        description="Cantidad del importe total",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                    @OA\Property(
 *                        property="payable_amount",
 *                        description="Cantidad a pagar",
 *                        type="integer",
 *                        format="double"
 *                    ),
 *                ),
 *                @OA\Property(
 *                    property="invoice_lines",
 *                    description="Líneas de factura",
 *                    type="array",
 *                    @OA\Items(
 *                        required={
 *                            "unit_measure_id",
 *                            "invoiced_quantity",
 *                            "line_extension_amount",
 *                            "free_of_charge_indicator",
 *                            "description",
 *                            "code",
 *                            "type_item_identification_id",
 *                            "price_amount",
 *                            "base_quantity"
 *                        },
 *                        @OA\Property(
 *                            property="unit_measure_id",
 *                            description="Código de unidad de medida",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="invoiced_quantity",
 *                            description="Cantidad facturada",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="line_extension_amount",
 *                            description="Cantidad de extensión de línea",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="free_of_charge_indicator",
 *                            description="Indicador de libre carga",
 *                            type="boolean"
 *                        ),
 *                        @OA\Property(
 *                            property="reference_price_id",
 *                            description="Código de referencia precios",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="allowance_charges",
 *                            description="Cargos o descuentos",
 *                            type="array",
 *                            @OA\Items(
 *                                required={
 *                                    "charge_indicator",
 *                                    "allowance_charge_reason",
 *                                    "amount"
 *                                },
 *                                @OA\Property(
 *                                    property="charge_indicator",
 *                                    description="Cargo o descuento",
 *                                    type="boolean"
 *                                ),
 *                                @OA\Property(
 *                                    property="allowance_charge_reason",
 *                                    description="Razón del cargo o descuento",
 *                                    type="string"
 *                                ),
 *                                @OA\Property(
 *                                    property="amount",
 *                                    description="Cantidad",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="base_amount",
 *                                    description="Cantidad base",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="multiplier_factor_numeric",
 *                                    description="Factor multiplicador numérico",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                            )
 *                        ),
 *                        @OA\Property(
 *                            property="tax_totals",
 *                            description="Totales de impuestos",
 *                            type="array",
 *                            @OA\Items(
 *                                required={
 *                                    "tax_id",
 *                                    "tax_amount",
 *                                    "taxable_amount"
 *                                },
 *                                @OA\Property(
 *                                    property="tax_id",
 *                                    description="Código de impuesto",
 *                                    type="integer"
 *                                ),
 *                                @OA\Property(
 *                                    property="tax_amount",
 *                                    description="Importe del impuesto",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="taxable_amount",
 *                                    description="Base imponible",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="percent",
 *                                    description="Porcentaje",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="unit_measure_id",
 *                                    description="Código de unidad de medida",
 *                                    type="integer"
 *                                ),
 *                                @OA\Property(
 *                                    property="per_unit_amount",
 *                                    description="Por unidad de cantidad",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                                @OA\Property(
 *                                    property="base_unit_measure",
 *                                    description="Medida unidad base",
 *                                    type="integer",
 *                                    format="double"
 *                                ),
 *                            )
 *                        ),
 *                        @OA\Property(
 *                            property="description",
 *                            description="Descripción",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="code",
 *                            description="Código interno",
 *                            type="string"
 *                        ),
 *                        @OA\Property(
 *                            property="type_item_identification_id",
 *                            description="Código de identificación del artículo",
 *                            type="integer"
 *                        ),
 *                        @OA\Property(
 *                            property="price_amount",
 *                            description="Importe del precio",
 *                            type="integer",
 *                            format="double"
 *                        ),
 *                        @OA\Property(
 *                            property="base_quantity",
 *                            description="Cantidad base",
 *                            type="integer",
 *                            format="double"
 *                        )
 *                    ),
 *                ),
 *                example={
 *                    "number": 0,
 *                    "type_document_id": 1,
 *                    "customer": {
 *                        "identification_number": 1234567890,
 *                        "name": "Customer Test",
 *                        "phone": 1234567,
 *                        "address": "CALLE 0 0C 0",
 *                        "email": "test@test.com",
 *                        "merchant_registration": "No tiene"
 *                    },
 *                    "legal_monetary_totals": {
 *                        "line_extension_amount": "0.00",
 *                        "tax_exclusive_amount": "0.00",
 *                        "tax_inclusive_amount": "0.00",
 *                        "allowance_total_amount": "0.00",
 *                        "charge_total_amount": "0.00",
 *                        "payable_amount": "0.00"
 *                    },
 *                    "invoice_lines": {
 *                        {
 *                            "unit_measure_id": 642,
 *                            "invoiced_quantity": "1.000000",
 *                            "line_extension_amount": "0.00",
 *                            "free_of_charge_indicator": false,
 *                            "allowance_charges": {{
 *                                "charge_indicator": false,
 *                                "allowance_charge_reason": "Discount",
 *                                "amount": "0.00",
 *                                "base_amount": "0.00"
 *                            }},
 *                            "tax_totals": {{
 *                                "tax_id": 1,
 *                                "tax_amount": "0.00",
 *                                "taxable_amount": "0.00",
 *                                "percent": "19.00"
 *                            }},
 *                           "description": "XXXXXXXXXXX",
 *                           "code": "1234567890",
 *                           "type_item_identification_id": 3,
 *                           "price_amount": "0.00",
 *                           "base_quantity": "1.000000"
 *                        }
 *                    }
 *                }
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// ConfigurationController@store
/**
 * @OA\Post(
 *    tags={"Estados"},
 *    path="/api/ubl2.1/status/zip/{trackId}",
 *    summary="Consulta del estado del ZIP",
 *    security={{"api_token":{}}},
 *    @OA\Parameter(
 *         name="trackId",
 *         description="Track ID",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="string"
 *         ),
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */

// Bearer JaCAEKN68CavCZg2nP9wU7KNil4NatyU8khzWoc0eb2THZBpKU50S28QnkTkspkmySe1nuByh1zPZVtf
// ConfigurationController@store
/**
 * @OA\Post(
 *    tags={"Estados"},
 *    path="/api/ubl2.1/status/document/{trackId}",
 *    summary="Consulta de estado del documento",
 *    security={{"api_token":{}}},
 *    @OA\Parameter(
 *         name="trackId",
 *         description="Track ID",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="string"
 *         ),
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=422,
 *        description="Unprocessable Entity",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            type="object",
 *            @OA\Items()
 *        ),
 *    )
 * )
 */
