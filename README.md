<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

*Para instalar la aplicación necesitamos instalar el instalador de paquetes de laravel: En este caso es composer. Lo puedes descargar 
desde esta dirección https://getcomposer.org/. la instalación es sencillo basta con darle siguiente a todos los campos que aparezcan.

*Despues de instalar composer reiniciamos el pc y verificamos las variables de entorno del sistema y verificamos que ya este activo el path de composer.
*Luego nos dirigimos donde se encuentra la raíz de nuestro proyecto y vamos a instalar el proyecto de la siguiente manera:

vamos a ejecutar los siguientes comandos:
composer global require laravel/installer//Este comando instala todas las dependencias que tengamos de laravel

*Borramos cache para que no tengamos problemas con nuestra aplicación con el comando 
php artisan optimize

*Verificamos el .env de nuestra aplicación y creamos una base de datos, dependiendo del nombre que creemos y los usuarios, los modificamos en el archivo .env
![image](https://user-images.githubusercontent.com/37082950/149654092-7e6fd2fe-26b6-40cf-9635-04d211bc33ad.png)

realizamos las migraciones para que se nos restaure nuestra base de datos con el comando:
php artisan migrate

por ultimo verificamos que las rutas de nuestra aplicación se encuentren bien con el comando:
php artisan r:l

y por fin vamos a lanzar nuestra aplicación con php artisan serve:

php artisan serve

Asi se ve nuestra aplicación:

![image](https://user-images.githubusercontent.com/37082950/149654176-08fa438f-03c5-4a82-848f-b3677dad3b0c.png)

![image](https://user-images.githubusercontent.com/37082950/149654186-8ed4fd18-bb7f-42d1-bfc9-cf5140e4fdec.png)

![image](https://user-images.githubusercontent.com/37082950/149654196-8aa6e87c-bb94-424f-90d2-371420003568.png)

y realizamos algunas pruebas a nuestra apí rest con postman:

![image](https://user-images.githubusercontent.com/37082950/149654208-739a6b5f-82d9-4772-bcea-fab910ed6e93.png)

![image](https://user-images.githubusercontent.com/37082950/149654215-805f7202-3dae-4dd8-8ac4-6538d4674c3c.png)

Feliz noche





The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
