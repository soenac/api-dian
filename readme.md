<p align="center">
    <img src="https://soenac.com/wp-content/uploads/2019/06/logo-soenac.png">
</p>

## Acerca SOENAC S.A.S

SOENAC es un equipo de profesionales diseñado para atender cada una de sus necesidades y transformarlas en soluciones de acuerdo a la idea de negocio:

##### Software
- [Facturación electrónica.](https://soenac.com/servicio-y-productos/)
- [Implementación de factura electrónica.](https://soenac.com/servicio-y-productos/)
- [Administración de servidores.](https://soenac.com/servicio-y-productos/)
- [Mantenimiento y soporte.](https://soenac.com/servicio-y-productos/)

##### Asesoría Contable y Fiscal
- [Revisoria Fiscal.](https://soenac.com/servicio-y-productos/)
- [Implementación de NIIF.](https://soenac.com/servicio-y-productos/)
- [Auditoría de Sistemas y contable.](https://soenac.com/servicio-y-productos/)
- [Asesoria contable.](https://soenac.com/servicio-y-productos/)

## Acerca del API

Desarrollada de forma que pueda integrarse con cualquier lenguaje de programación, documentada con [Swagger UI](https://swagger.io/tools/swagger-ui/).

##### Configuraciones
- Empresa (Configuración de la empresa a facturar).
- Software (Configuración del software en habilitación o producción).
- Certificado (Configuración del certificado digital .p12).
- Resoluciones (Configuración de resoluciones).

##### Documentos soportados
- Factura de Venta Nacional (Habilitación).
- Factura de Venta Nacional (Producción).

##### Consultas
- Estado del ZIP (ALL).
- Estado del documentos (ALL).

##### Documentación oficial
[https://api.soenac.com/api/ubl2.1/documentation](https://api.soenac.com/api/ubl2.1/documentation)

##### Parametros IDS
[https://api.soenac.com/listings](https://api.soenac.com/listings)

## Instalación

##### Instalación con [composer](http://getcomposer.org).

```sh
composer create-project --prefer-dist soenac/api-dian:1.0-beta
```

Permisos de directorio

```sh
chmod -Rv 777 storage bootstrap
```

Configure el archivo .env (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME y DB_PASSWORD).

Ejecute las migraciones y los sembradoras.

```php
php artisan migrate --seed
```

Servidor de desarrollo local.

```php
php artisan serve
```

Acceda a la url [http://localhost:8000](http://localhost:8000).

##### [Docker](https://www.docker.com/).

```sh
composer create-project --prefer-dist soenac/api-dian:1.0-beta
```

Permisos de directorio

```sh
chmod -Rv 777 storage bootstrap
```

Ejecutar docker-composer

```sh
docker-compose up -d
```

Ejecute las migraciones y los sembradoras.

```php
docker exec -ti api-dian_php_1 php artisan migrate --seed
```

Acceda a la url [http://localhost:8000](http://localhost:8000).

## Soporte

Si tienes dudas sobre el API o requieres soporte, puedes escribirnos un correo electrónico a Frank Aguirre a través de [faguirre@soenac.com](mailto:faguirre@soenac.com) o nos puedes escribir a nuestra pagina de Facebook [https://www.facebook.com/soenacinfo](https://www.facebook.com/soenacinfo).

## Vulnerabilidades de seguridad

Si descubres una vulnerabilidad de seguridad dentro del API, enviamos un correo electrónico a Frank Aguirre a través de [faguirre@soenac.com](mailto:faguirre@soenac.com). Todas las vulnerabilidades de seguridad serán tratadas con prontitud.

## Licencia

El marco del API es un software de código abierto con [licencia MIT](https://opensource.org/licenses/MIT).

## Donación
Si este proyecto te ayuda a reducir el tiempo de tu desarrollo, puedes regalarnos una taza de café :smiley:.

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/stenfrank/1?locale.x=es_XC)
