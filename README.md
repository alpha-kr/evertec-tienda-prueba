# evertec-tienda-prueba
pruba tecnica empresa evertec, se desarrollo una SPA  que se integra con la pasarela de pagos place to pay utilizando las siguientes tenologias, Laravel, vue 3, intertial, voyager y php unit.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Variables de entorno

 ```php
 #Payment variebles
PAYMENT_LOGIN=6dd490faf9cb87a9862245da41170ff2
PAYMENT_TRANKEY=024h1IlD
PAYMENT_URL=https://dev.placetopay.com/redirection
PAYMENT_REST_TIME_OUT=45
PAYMENT_REST_CONNECT_OUT=30
 
 ```

## Configuracion

En el Archivo payment.php se encuentras las siguientes variables de configuracion 
## Instalacion
- composer install, cp .env.example .env .
- Intallar voyager:php artisan voyager:install.
- crear usuario administrador php artisan voyager:admin admin@admin.com --create .
- contraseña:admin123456 .
- Correr seeders.

 
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

