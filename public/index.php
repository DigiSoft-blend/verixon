<?php


 require_once __DIR__.'/../vendor/autoload.php';

 $configcon = include __DIR__.'/../config/configcon.php';

 use App\bootstrap\app;
 
  if( _APPNAME === 'Verixon' &&  _AUTHOR === 'Silas Udofia'){
    $verixon = new app();
  }else{
    http_response_code('505');
  }

