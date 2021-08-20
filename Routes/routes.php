<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */


/* VERIXONS DEFAULT REOUTES DEPENDS ON THESE AUTOLOADED CLASSES */ 

use App\router\Route;
use App\container\ContainerResolver;


Route::get('/', function(){ ContainerResolver::get('Verixon' ,'index');});
Route::get('/login', function(){ ContainerResolver::get('Verixon', 'login');});
Route::get('/register', function(){ ContainerResolver::get('Verixon', 'register');});
Route::get('/gettingStarted', function(){ ContainerResolver::get('Verixon', 'gettingStarted');});
Route::get('/send-a-mail', function(){ ContainerResolver::get('Verixon', 'sendMail');});
Route::get('/file', function(){ ContainerResolver::get('Verixon', 'fileUpload');});




Route::get('/select/name/cost/id', function(){  ContainerResolver::get('Product', 'selectProduct');} , 'name/cost/id');
Route::get('/delete/id', function(){ ContainerResolver::get('Product', 'deleteProduct');}, 'id');
Route::get('/registerUser', function(){ ContainerResolver::get('UserAuthController', 'registerUser');});
Route::get('/loginUser', function(){ ContainerResolver::get('UserAuthController', 'login');});
Route::get('/logoutUser', function(){ ContainerResolver::get('UserAuthController', 'logout');});
Route::get('/deleteUser', function(){ ContainerResolver::get('UserAuthController', 'deleteUser');});
Route::get('/sendEmail', function(){ ContainerResolver::get('EmailController', 'Email');});
Route::get('/upload', function(){ ContainerResolver::get('UploadController', 'uploadFile');});
Route::get('/deleteFile', function(){ ContainerResolver::get('UploadController', 'deleteFile');});
Route::get('/Test', function(){ ContainerResolver::get('TestClass','printMessage', true)->printMessage();});


/**
 * UserDB Routes
 */

// Route::get('/all', function(){ ContainerResolver::get('Ref', 'showAllUser');});
// Route::get('/insert', function(){ ContainerResolver::get('Ref', 'insertUser');});
// Route::get('/select', function(){ ContainerResolver::get('Ref', 'select');}); 
// Route::get('/update', function(){ ContainerResolver::get('Ref', 'updateUser');});
// Route::get('/delete', function(){ ContainerResolver::get('Ref', 'deleteUser');}); 
// Route::get('/exp/id', function(){ ContainerResolver::get('Ref', 'stringExplode');});

/**
 * ProductDB Routes
 */

// Route::get('/dashboard', function(){ ContainerResolver::get('Product', 'showAllProducts');}); 
// Route::get('/insertProduct', function(){ ContainerResolver::get('Product', 'insertProduct');});
// Route::get('/selectProduct', function(){ ContainerResolver::get('Product', 'select');}); 
// Route::get('/updateProduct', function(){ ContainerResolver::get('Product', 'updateProduct');});
// Route::get('/deleteProduct', function(){ ContainerResolver::get('Product', 'deleteProduct');});
