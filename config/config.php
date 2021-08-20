<?php

 /**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */


 return (object) [
  
    'DB_CREDENTIALS' => [
      'driver' => "pdo_mysql",
      'host' => 'localhost',
      'dbname' => 'verixon',
      'user' => 'root',
      'password' => '',
    ],


    /*   CHANGE TO 'production' IF DUE FOR HOSTING ELSE KEEP ON 'local' TO HAVE ACCESS TO VERIXONS WEB INTERFACE    */

    'APP_STAGE' => [
      'app_stage' => 'local'
    ],

    
    'APP_URLS' => [
        'baseUrl' => '/'
    ],

   'NAMES'=> [
         'SiteName'=> 'verixon.com',
         'AppName'=> 'Verixon',
         'Version' => 'Build v1.0',
         'Author' => 'Silas Udofia',
         'App_key' => '$2y$09$84HBB15/sQ0jlrB7TojeNededcoNb4dfN2q7EuIOCbtDRzy/nvRoK',
         'Unique_Id' => 'SilasUdofia@Verixon.com'
   ]
   
 ];


