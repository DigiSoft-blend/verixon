
<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * add a controller here with a method method or constructor injection
 * 
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

return [
    'TestClass' => \App\userClasses\TestClass::class,
    'Verixon' => App\controllers\Verixon::class,
    'UserAuthController' => App\controllers\AuthController::class,
    'EmailController' => App\controllers\EmailController::class,
    'UploadController' => App\controllers\UploadController::class,
    'CryptoController'=> App\controllers\CryptoController::class
];
