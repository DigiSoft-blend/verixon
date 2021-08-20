
<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

return [
    'TestClass' => \App\userClasses\TestClass::class,
    'Request' => App\userClasses\UserRequest::class,
    'Route' => App\router\Route::class,
    'Verixon' =>  App\controllers\Verixon::class,
    'todo'=> App\controllers\todo::class,
    'hashcontroller' => App\controllers\hashcontroller::class,
    'migrate' => App\controllers\migrate::class,
    'userAuth'=> App\controllers\userAuth::class,
    'Ref' => App\controllers\Ref::class,
    'Verixon' => App\controllers\Verixon::class,
    'Controller' => App\controllers\Controller::class,
    'helloworld' => App\controllers\HelloWorld::class,
    'Product' => App\controllers\ProductDashboard::class,
    'Pro' =>  App\Entities\Product::class,
    'UserAuthController' => App\controllers\AuthController::class,
    'EmailController' => App\controllers\EmailController::class,
    'UploadController' => App\controllers\UploadController::class
];
